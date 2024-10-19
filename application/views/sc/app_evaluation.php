<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<title>Application Evaluation</title>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Application Evaluation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('sc/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Application Evaluation</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Approved Applicants</h3>
            </div>
            <div class="card-body">
                <form id="finalListForm" method="POST" action="<?= site_url('sc/submit_final_list'); ?>">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Shortlist Id</th>
                                    <th>Id Number</th>
                                    <th>Full Name</th>
                                    <th>Scholarship Program</th>
                                    <th>Application Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($shortlist)): ?>
                                    <?php foreach ($shortlist as $entry): ?>
                                        <tr>
                                            <td><?= $entry->shortlist_id; ?></td>
                                            <td><?= $entry->id_number; ?></td>
                                            <td><?= htmlspecialchars($entry->firstname . ' ' . (!empty($entry->middlename) ? $entry->middlename . ' ' : '') . $entry->lastname); ?></td>
                                            <td><?= $entry->scholarship_program; ?></td>
                                            <td><?= $entry->application_type; ?></td>
                                            <td><?= ucfirst($entry->status); ?></td>
                                            <td>
                                                <div class="custom-control custom-checkbox d-inline-block">
                                                    <input type="checkbox" name="final_list[]" value="<?= $entry->shortlist_id; ?>" class="custom-control-input" id="checkbox-<?= $entry->shortlist_id; ?>">
                                                    <label class="custom-control-label" for="checkbox-<?= $entry->shortlist_id; ?>"></label>
                                                </div>
                                                <a href="<?= site_url('sc/view_shortlist_applicant/' . $entry->shortlist_id); ?>" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-primary btn-sm" onclick="editDiscount('<?= $entry->shortlist_id; ?>', '<?= $entry->discount; ?>', '<?= ucfirst($entry->status); ?>')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No shortlisted applicants found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-primary" id="submitFinalListBtn">Submit Final List</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Modal for editing discount -->
<div class="modal fade" id="editDiscountModal" tabindex="-1" role="dialog" aria-labelledby="editDiscountLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editDiscountForm" method="POST" action="<?= site_url('sc/update_discount'); ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDiscountLabel">Edit Discount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="shortlist_id" id="editDiscountShortlistId">

                    <div class="form-group">
                        <label for="editDiscountStatus">Status</label>
                        <input type="text" name="status" id="editDiscountStatus" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="editDiscountValue">Discount</label>
                        <input type="number" name="discount" id="editDiscountValue" class="form-control" min="0" max="100" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function editDiscount(shortlistId, discount, status) {

        document.getElementById('editDiscountShortlistId').value = shortlistId;
        document.getElementById('editDiscountValue').value = discount;
        document.getElementById('editDiscountStatus').value = status; 
        $('#editDiscountModal').modal('show');
    }
</script>
<!-- SweetAlert logic for final list submission -->
<script>
    document.getElementById('submitFinalListBtn').addEventListener('click', function() {
        const checkboxes = document.querySelectorAll('input[name="final_list[]"]:checked');

        if (checkboxes.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No Selection',
                text: 'Please select at least one checkbox before submitting.',
                confirmButtonText: 'OK'
            });
            return false;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to submit the final list?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('finalListForm').submit();
            }
        });
    });
</script>

<?php if ($this->session->flashdata('final_list_success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= $this->session->flashdata('final_list_success'); ?>',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Application Review</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href='<?= base_url('twc/dashboard'); ?>'>Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Applicants</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Applicant No.</th>
                                <th>ID Number</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Scholarship Program</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($applicants)): ?>
                                <?php foreach ($applicants as $applicant): ?>
                                    <tr>
                                        <td><?= $applicant->applicant_no; ?></td>
                                        <td><?= $applicant->id_number; ?></td>
                                        <td><?= $applicant->lastname; ?></td>
                                        <td><?= $applicant->firstname; ?></td>
                                        <td><?= $applicant->scholarship_program; ?></td>
                                        <td class="status-column"><?= $applicant->status; ?></td>
                                        <td>
                                            <a href="<?= site_url('twc/view_applicant/' . $applicant->applicant_no); ?>" class="btn btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="btn btn-primary evaluate-btn" data-id="<?= $applicant->applicant_no; ?>" data-toggle="modal" data-target="#evaluateModal">
                                                <i class="fas fa-pencil-alt"></i> 
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">No applicants found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Evaluate Modal -->
<div class="modal fade" id="evaluateModal" tabindex="-1" role="dialog" aria-labelledby="evaluateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="evaluateModalLabel">Evaluate Applicant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="evaluateForm">
                <div class="modal-body">
                    <input type="hidden" id="applicantNo" name="applicant_no">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="qualified">Qualified</option>
                            <option value="not qualified">Not Qualified</option>
                            <option value="conditional">Conditional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                    <div class="form-group" id="discount-group">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control" id="discount" name="discount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Evaluation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.evaluate-btn').click(function() {
            var applicantNo = $(this).data('id');
            $('#applicantNo').val(applicantNo);
        });

        $('#status').change(function() {
            var status = $(this).val();
            if (status === 'not qualified') {
                $('#discount-group').hide();
                $('#discount').val(''); 
                $('#comment').val(''); 
                $('#comment').closest('.form-group').show(); 
            } else if (status === 'conditional') {
                $('#discount-group').hide();
                $('#discount').val(''); 
                $('#comment').closest('.form-group').show(); 
            } else if (status === 'qualified') {
                $('#discount-group').show();
                $('#comment').closest('.form-group').hide();
                $('#comment').val(''); 
            } else {
                $('#discount-group').show();
                $('#comment').closest('.form-group').show(); 
            }
        });

        $('#evaluateForm').submit(function(e) {
    e.preventDefault();
    
    // Disable the submit button
    $(this).find('button[type="submit"]').prop('disabled', true).text('Submitting...');

    var formData = $(this).serialize();
    $.ajax({
        url: '<?= base_url('twc/evaluate_applicant'); ?>',
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Evaluation Submitted',
                    text: 'The applicant has been evaluated successfully.',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'There was an error submitting the evaluation.',
                });
            }
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An unexpected error occurred. Please try again later.',
            });
        },
        complete: function() {
            $('#evaluateForm').find('button[type="submit"]').prop('disabled', false).text('Submit Evaluation');
        }
    });
});
    });
</script>
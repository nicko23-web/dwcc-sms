<?php $this->load->view('includes/applicant_header'); ?>
<?php $this->load->view('includes/applicant_sidebar'); ?>
<title>My Applications</title>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Applications</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('applicant/dashboard_applicant'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Applicant</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Scholarship Applications</h3>
                </div>
                <div class="card-body">

                <div class="form-group">
                    <select id="filter_academic_year" class="form-control">
                        <option value="" disabled selected>Filter by Academic Year:</option>
                        <option value="">All Academic Years</option>
                        <?php foreach ($academic_filter_years as $year): ?>
                            <option value="<?= $year->academic_year ?>"><?= $year->academic_year ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Add Semester Filter -->
                <div class="form-group">
                    <select id="filter_semester" class="form-control">
                        <option value="" disabled selected>Filter by Semester:</option>
                        <option value="">All Semesters</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                        <option value="Whole Semester">Whole Semester</option>
                    </select>
                </div>
                        <div class="table-responsive">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Applicant No</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Scholarship Program</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($applications as $application): ?>

                                    <tr data-academic-year="<?= htmlspecialchars($application->academic_year); ?>"  data-semester="<?= htmlspecialchars($application->semester); ?>">

                                        <td><?= htmlspecialchars($application->applicant_no); ?></td>
                                        <td><?= htmlspecialchars($application->firstname); ?></td>
                                        <td><?= htmlspecialchars($application->middlename); ?></td>
                                        <td><?= htmlspecialchars($application->lastname); ?></td>
                                        <td><?= htmlspecialchars($application->scholarship_program); ?></td>
                                        
                                        <td><?= htmlspecialchars($application->status); ?></td>
                                        <td>
                                            <a href="<?= site_url('applicant/view_form/' . $application->applicant_no); ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" 
                                                class="btn btn-success btn-sm edit-btn"
                                                data-status="<?= htmlspecialchars($application->status); ?>"
                                                data-url="<?= site_url('applicant/edit_application/' . $application->applicant_no); ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <?php if ($application->status === 'conditional'): ?>
                                                <?php if (!empty($application->comment)): ?>
                                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#commentModal" data-comment="<?= htmlspecialchars($application->comment); ?>">
                                                        <i class="fas fa-comments"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button class="btn btn-secondary btn-sm" disabled>
                                                        No Comment
                                                    </button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- "No Data Found" row -->
                                <tr id="noDataRow" style="display: none;">
                                    <td colspan="7" class="text-center">No data found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">TWC Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="commentModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/applicant_footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $('#commentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var comment = button.data('comment');
        var modal = $(this);
        modal.find('#commentModalBody').text(comment);
    });


    

</script>


<script>
    $(document).ready(function () {
        $('.edit-btn').click(function (e) {
            e.preventDefault();
            var status = $(this).data('status');
            var url = $(this).data('url');
            var startDate = new Date($(this).data('start-date'));
            var endDate = new Date($(this).data('end-date'));
            var today = new Date();

            // Check the status
            if (status === 'qualified' || status === 'not qualified') {
                // Show SweetAlert warning
                Swal.fire({
                    icon: 'warning',
                    title: 'Action Denied',
                    text: 'You are already ' + status + '. You cannot edit this application.',
                    showConfirmButton: true
                });
            } else {
                // Allow the user to proceed to the edit page if the status is not restricted and dates are valid
                window.location.href = url;
            }
        });
    });
</script>
<?php $this->load->view('includes/applicant_header') ?>
<?php $this->load->view('includes/applicant_sidebar') ?>
<title>Edit Information</title>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Account Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('applicant/dashboard_applicant'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </div>
                </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Your Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <form id="editProfileForm" action="<?= site_url('applicant/update_info'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <!-- Form Fields -->
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="id_number">ID Number</label>
                                            <input type="text" class="form-control" id="id_number" name="id_number" value="<?= set_value('id_number', $applicant->id_number); ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= set_value('lastname', $applicant->lastname); ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= set_value('firstname', $applicant->firstname); ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control" id="middlename" name="middlename" value="<?= set_value('middlename', $applicant->middlename); ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthdate">Birthdate</label>
                                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= set_value('birthdate', $applicant->birthdate); ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <input type="text" class="form-control" id="gender" name="gender" value="<?= set_value('gender', $applicant->gender); ?>" disabled>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                
                                        <div class="form-group">
                                            <label for="contact">Contact Number</label>
                                            <input type="number" class="form-control" id="contact" name="contact" value="<?= set_value('contact', $applicant->contact); ?>" pattern="\d{11}" title="Contact number must be exactly 11 digits">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email', $applicant->email); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                                <a href="<?= base_url('applicant/dashboard_applicant'); ?>" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('includes/applicant_footer') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?= $this->session->flashdata('success'); ?>',
            showConfirmButton: false,
            timer: 3000 
        });
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '<?= $this->session->flashdata('error'); ?>',
            showConfirmButton: false,
            timer: 3000 
        });
    <?php endif; ?>
    <?php if ($this->session->flashdata('info')): ?>
        Swal.fire({
            icon: 'info',
            title: 'Info',
            text: '<?= $this->session->flashdata('info'); ?>',
            showConfirmButton: false,
            timer: 3000 
        });
    <?php endif; ?>
});
</script>
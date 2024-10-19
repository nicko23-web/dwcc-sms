<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/manage'); ?>">Users</a></li>
                        <li class="breadcrumb-item active">Add New</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add New User</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo site_url('admin/insert'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_number">ID Number</label>
                                            <input type="text" class="form-control" id="id_number" name="id_number" value="<?php echo set_value('id_number'); ?>">
                                            <?php echo form_error('id_number', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>">
                                            <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthdate">Birthdate</label>
                                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo set_value('birthdate'); ?>">
                                            <?php echo form_error('birthdate', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="male" <?php echo set_select('gender', 'male'); ?>>Male</option>
                                                <option value="female" <?php echo set_select('gender', 'female'); ?>>Female</option>
                                                <option value="other" <?php echo set_select('gender', 'other'); ?>>Other</option>
                                            </select>
                                            <?php echo form_error('gender', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php echo set_value('contact_number'); ?>">
                                            <?php echo form_error('contact_number', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
                                            <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>">
                                            <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_type">User Type</label>
                                            <select class="form-control" id="user_type" name="user_type">
                                                <option value="Admin" <?php echo set_select('user_type', 'Admin'); ?>>Admin</option>
                                                <option value="TWC" <?php echo set_select('user_type', 'TWC'); ?>>Technical Working Committee</option>
                                                <option value="Scholarship Coordinator" <?php echo set_select('user_type', 'Scholarship Coordinator'); ?>>Scholarship Coordinator</option>
                                            </select>
                                            <?php echo form_error('user_type'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="1" <?php echo set_select('status', '1'); ?>>Active</option>
                                                <option value="0" <?php echo set_select('status', '0'); ?>>Inactive</option>
                                            </select>
                                            <?php echo form_error('status'); ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add User</button>
                                <a href="<?php echo site_url('admin/manage'); ?>" class="btn btn-secondary">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('includes/footer') ?>

<script>
     const today = new Date().toISOString().split('T')[0];

// Set the max attribute to today's date
document.getElementById('birthdate').setAttribute('max', today);
</script>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View Application</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('twc/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('twc/shortlist'); ?>">Shortlist</a></li>
                        <li class="breadcrumb-item active">View Application</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Photo Card -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Applicant Photo</h3>
                        </div>
                        <div class="card-body text-center">
                            <?php if ($applicants->applicant_photo): ?>
                                <img src="<?= base_url('uploads/' . $applicants->applicant_photo); ?>" alt="Applicant Photo" class="img-fluid" style="width:300px; height:300px; object-fit:cover; border: 1px solid black;">
                            <?php else: ?>
                                <p>No photo available</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Requirements</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($applicants->requirements): ?>
                                <?php $requirements = explode(',', $applicants->requirements); ?>
                                <?php foreach ($requirements as $requirement): ?>
                                    <?php
                                    $file_path = base_url('uploads/' . trim($requirement));
                                    $file_name = basename(trim($requirement));
                                    $file_extension = pathinfo(trim($requirement), PATHINFO_EXTENSION);
                                    ?>
                                    <?php if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                        <!-- Image File -->
                                        <img src="<?= $file_path; ?>" alt="Requirement Image" class="img-fluid mb-2" style="max-width: 100%; max-height: 200px;">
                                    <?php else: ?>
                                        <!-- Non-Image File -->
                                        <p><a href="<?= $file_path; ?>" target="_blank"><?= htmlspecialchars($file_name); ?></a></p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No requirements files available</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- Personal Details Card -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Personal Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Shortlist Id:</strong> <?= htmlspecialchars($applicants->shortlist_id); ?></p>
                                    <p><strong>Id Number:</strong> <?= htmlspecialchars($applicants->id_number); ?></p>
                                    <p><strong>Last Name:</strong> <?= htmlspecialchars($applicants->lastname); ?></p>
                                    <p><strong>First Name:</strong> <?= htmlspecialchars($applicants->firstname); ?></p>
                                    <p><strong>Middle Name:</strong> <?= htmlspecialchars($applicants->middlename); ?></p>
                                    <p><strong>Birthdate:</strong> <?= htmlspecialchars($applicants->birthdate); ?></p>
                                    <p><strong>Gender:</strong> <?= htmlspecialchars($applicants->gender); ?></p>
                                    <p><strong>Program:</strong> <?= htmlspecialchars($applicants->program); ?></p>
                                    <p><strong>Year Level:</strong> <?= htmlspecialchars($applicants->year); ?></p>
                                    <p><strong>Academic Year:</strong> <?= htmlspecialchars($applicants->academic_year); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Application Type:</strong> <?= htmlspecialchars($applicants->application_type); ?></p>
                                    <p><strong>Semester:</strong> <?= htmlspecialchars($applicants->semester); ?></p>
                                    <p><strong>Scholarship Program:</strong> <?= htmlspecialchars($applicants->scholarship_program); ?></p>
                                    <p><strong>Campus:</strong> <?= htmlspecialchars($applicants->campus); ?></p>
                                    <p><strong>Program Type:</strong> <?= htmlspecialchars($applicants->program_type); ?></p>
                                    <p><strong>Contact:</strong> <?= htmlspecialchars($applicants->contact); ?></p>
                                    <p><strong>Email:</strong> <?= htmlspecialchars($applicants->email); ?></p>
                                    <p><strong>Address:</strong> <?= htmlspecialchars($applicants->address); ?></p>
                                    <p><strong>Applicant Residence:</strong> <?= htmlspecialchars($applicants->applicant_residence); ?></p>
                                </div>
                            </div>
                            <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <a href="<?= site_url('twc/shortlist'); ?>" class="btn btn-secondary">Back to Shortlist</a>
                            </div>
                        </div>
                    </div>
                        </div>
                        
                    </div>
                   
                </div>
    </section>
</div>

<?php $this->load->view('includes/footer'); ?>
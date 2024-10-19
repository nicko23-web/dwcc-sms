<?php $this->load->view('includes/applicant_header'); ?>
<?php $this->load->view('includes/applicant_sidebar'); ?>
<title>View Application</title>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('applicant/dashboard_applicant'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Applicant</li>
                    </ol>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                <img src="<?= base_url('assets/images/logo-preloader.png'); ?>" alt="Logo" class="img-fluid" style="max-width: 250px;">
                    <p class="mb-0 mt-3 font-weight-bold">MY APPLICATION FORM</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Applicant Photo -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <p><strong>Applicant Photo:</strong></p>
                            <img src="<?= base_url('uploads/' . $application->applicant_photo); ?>" alt="Applicant Photo" class="img-fluid mb-2" style="width:350px; height:350px; object-fit:cover; border: 1px solid black;">
                        </div>
                        
                    </div>
                    <!-- Application Details -->
                    <div class="col-md-8">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="applicantNo">Applicant No:</label>
                                    <input type="text" class="form-control" id="applicantNo" value="<?= htmlspecialchars($application->applicant_no); ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="idNumber">ID Number:</label>
                                    <input type="text" class="form-control" id="idNumber" value="<?= htmlspecialchars($application->id_number); ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fullName">Full Name:</label>
                                    <input type="text" class="form-control" id="fullName" value="<?= htmlspecialchars($application->firstname . ' ' . $application->middlename . ' ' . $application->lastname); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-3">
                                    <label for="birthdate">Birthdate:</label>
                                    <input type="text" class="form-control" id="birthdate" value="<?= htmlspecialchars($application->birthdate); ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="gender">Gender:</label>
                                    <input type="text" class="form-control" id="gender" value="<?= htmlspecialchars($application->gender); ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="campus">Campus:</label>
                                    <input type="text" class="form-control" id="campus" value="<?= htmlspecialchars($application->campus); ?>" readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="academic_year">Academic Year</label>
                                    <input type="text" class="form-control" id="academic_year" name="academic_year" value="<?= htmlspecialchars($application->academic_year); ?>" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="semester">Semester</label>
                                    <input type="text" class="form-control" id="semester" value="<?= htmlspecialchars($application->semester); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="program_type">Program Type:</label>
                                    <input type="text" class="form-control" id="program_type" value="<?= htmlspecialchars($application->program_type); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="program">Year:</label>
                                    <input type="text" class="form-control" id="year" value="<?= htmlspecialchars($application->year); ?>" readonly>
                                </div>
                            <div class="form-group col-md-6">
                                    <label for="program">Program:</label>
                                    <input type="text" class="form-control" id="program" value="<?= htmlspecialchars($application->program); ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="scholarshipProgram">Scholarship Program:</label>
                                    <input type="text" class="form-control" id="scholarshipProgram" value="<?= htmlspecialchars($application->scholarship_program); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                          
                          
                               
                                <div class="form-group col-md-4">
                                    <label for="contact">Contact:</label>
                                    <input type="text" class="form-control" id="contact" value="<?= htmlspecialchars($application->contact); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($application->email); ?>" readonly>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="applicationType">Application Type:</label>
                                    <input type="text" class="form-control" id="applicationType" value="<?= htmlspecialchars($application->application_type); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" value="<?= htmlspecialchars($application->address); ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="applicantResidence">Applicant Residence:</label>
                                    <input type="text" class="form-control" id="applicantResidence" value="<?= htmlspecialchars($application->applicant_residence); ?>" readonly>
                                </div>
                            </div>
                            <!-- Uploaded Requirements -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Uploaded Requirements:</strong>
                            </div>
                            <div class="card-body">
                                <?php
                                $requirements = explode(',', $application->requirements);
                                foreach ($requirements as $file_name):
                                    $file_path = base_url('uploads/' . $file_name);
                                    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                                ?>
                                    <div class="mb-2">
                                        <?php if (in_array($file_ext, ['docx','jpg', 'jpeg', 'png', 'gif'])): ?>
                                            <a href="<?= $file_path; ?>" target="_blank" class="btn btn-link"><?= htmlspecialchars($file_name); ?></a>
                                        <?php elseif ($file_ext === 'pdf'): ?>
                                            <a href="<?= $file_path; ?>" target="_blank" class="btn btn-link"><?= htmlspecialchars($file_name); ?></a>
                                        <?php else: ?>
                                            <p>Unsupported file type.</p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                            <div class="form-group mt-2">
                                <a href="<?= site_url('applicant/edit_application/' . $application->applicant_no); ?>" class="btn btn-primary">Edit Application</a>
                                <a href="<?= site_url('applicant/my_application'); ?>" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<?php $this->load->view('includes/applicant_footer'); ?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <section class="content-header">
                    <div class="text-center">
                        <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo" class="img-fluid" style="max-width: 150px;">
                        <h5 class="mt-1 mb-0">Divine Word College of Calapan</h5>
                        <p class="mt-0">Scholarship Management System</p>
                        <p class="mb-0 mt-3 font-weight-bold">APPLICANT FORM</p>
                    </div>
                </section>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Applicant Photo -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <p><strong>Applicant Photo:</strong></p>
                            <img src="<?= base_url('uploads/' . $applicant->applicant_photo); ?>" alt="Applicant Photo" class="img-fluid mb-2" style="width:350px; height:350px; object-fit:cover; border: 1px solid black;">
                        </div>
                    </div>

                    <!-- Application Details -->
                    <div class="col-md-8">
                        <form method="post" action="">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="applicantNo">Applicant No:</label>
                                    <input type="text" class="form-control" id="applicantNo" value="<?= htmlspecialchars($applicant->applicant_no); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="idNumber">ID Number:</label>
                                    <input type="text" class="form-control" id="idNumber" value="<?= htmlspecialchars($applicant->id_number); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="firstName">First Name:</label>
                                    <input type="text" class="form-control" id="firstName" value="<?= htmlspecialchars($applicant->firstname); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="middleName">Middle Name:</label>
                                    <input type="text" class="form-control" id="middleName" value="<?= htmlspecialchars($applicant->middlename); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lastName">Last Name:</label>
                                    <input type="text" class="form-control" id="lastName" value="<?= htmlspecialchars($applicant->lastname); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birthdate">Birthdate:</label>
                                    <input type="text" class="form-control" id="birthdate" value="<?= htmlspecialchars($applicant->birthdate); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="gender">Gender:</label>
                                    <input type="text" class="form-control" id="gender" value="<?= htmlspecialchars($applicant->gender); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="contact">Contact:</label>
                                    <input type="text" class="form-control" id="contact" value="<?= htmlspecialchars($applicant->contact); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($applicant->email); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" value="<?= htmlspecialchars($applicant->address); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="applicationType">Application Type:</label>
                                    <input type="text" class="form-control" id="applicationType" value="<?= htmlspecialchars($applicant->application_type); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="applicantResidence">Applicant Residence:</label>
                                    <input type="text" class="form-control" id="applicantResidence" value="<?= htmlspecialchars($applicant->applicant_residence); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="year">Year Level:</label>
                                    <input type="text" class="form-control" id="year" value="<?= htmlspecialchars($applicant->year); ?>" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="program">Program:</label>
                                    <input type="text" class="form-control" id="program" value="<?= htmlspecialchars($applicant->program); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label for="academic_year">Academic Year</label>
                                    <input type="text" class="form-control" id="academic_year" name="academic_year" value="<?= htmlspecialchars($applicant->academic_year); ?>" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="semester">Semester</label>
                                    <input type="text" class="form-control" id="semester" value="<?= htmlspecialchars($applicant->semester); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="campus">Campus:</label>
                                    <input type="text" class="form-control" id="campus" value="<?= htmlspecialchars($applicant->campus); ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="program_type">Program Type:</label>
                                    <input type="text" class="form-control" id="program_type" value="<?= htmlspecialchars($applicant->program_type); ?>" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="scholarshipProgram">Scholarship Program:</label>
                                    <input type="text" class="form-control" id="scholarshipProgram" value="<?= htmlspecialchars($applicant->scholarship_program); ?>" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                <!-- Uploaded Requirements -->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <strong>Uploaded Requirements:</strong>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $requirements = explode(',', $applicant->requirements);
                                        foreach ($requirements as $file_name):
                                            $file_path = base_url('uploads/' . $file_name);
                                            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                                        ?>
                                            <div class="mb-2">
                                                <a href="<?= $file_path; ?>" target="_blank" class="btn btn-link"><?= htmlspecialchars($file_name); ?></a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                        <a href="<?= site_url('twc/app-review'); ?>" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $this->load->view('includes/footer'); ?>
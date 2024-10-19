<!DOCTYPE html>
<html lang="en">
<!-- sample -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Applicant Registration</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.css">
</head>
<body class="hold-transition register-page">
   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url('assets/') ?>images/logo.svg" alt="sms-logo" style="max-width: 250px;">
      <h5 class="mt-2 mb-0">Divine Word College of Calapan</h5>
      <p>Scholarship Management System</p>
    </div>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card shadow-lg">
          <div class="card-body register-card-body">
            <div class="text-center">
              <img src="<?= base_url('assets/images/logo.svg'); ?>" alt="Logo" class="img-fluid mb-2" style="max-width: 130px;">
              <h5 class="mt-2 mb-0">Divine Word College of Calapan</h5>
              <p>Scholarship Management System</p>
            </div>
            <h6 class="register-box-msg mb-2">Account Registration</h6>
            <!-- Display success or error messages -->
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert text-center alert-success">
                <?= $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert text-center alert-danger">
                <?= $this->session->flashdata('error'); ?>
              </div>
            <?php endif; ?>
            <form action="<?= site_url('applicant/register'); ?>" method="post">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="id_number">ID Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('id_number') ? 'is-invalid' : ''; ?>" id="id_number" name="id_number" placeholder="ID Number" value="<?= set_value('id_number'); ?>">
                    <?= form_error('id_number', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="firstname">First name: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('firstname') ? 'is-invalid' : ''; ?>" id="firstname" name="firstname" placeholder="First Name" value="<?= set_value('firstname'); ?>">
                    <?= form_error('firstname', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="middlename">Middle name: </label>
                    <input type="text" class="form-control <?= form_error('middlename') ? 'is-invalid' : ''; ?>" id="middlename" name="middlename" placeholder="Middle Name" value="<?= set_value('middlename'); ?>">
                    <?= form_error('middlename', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="lastname">Last name: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('lastname') ? 'is-invalid' : ''; ?>" id="lastname" name="lastname" placeholder="Last Name" value="<?= set_value('lastname'); ?>">
                    <?= form_error('lastname', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="birthdate">Birthdate <span class="text-danger">*</span></label>
                    <input type="date" class="form-control <?= form_error('birthdate') ? 'is-invalid' : ''; ?>" id="birthdate" name="birthdate" placeholder="Birthdate" value="<?= set_value('birthdate'); ?>" max="<?= date('Y-m-d'); ?>">
                    <?= form_error('birthdate', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="gender">Gender <span class="text-danger">*</span></label>
                    <div class="d-flex">
                      <div class="form-check form-check-inline mr-3">
                        <input class="form-check-input form-control <?= form_error('gender') ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="male" value="Male" <?= set_radio('gender', 'Male'); ?>>
                        <label class="form-check-label" for="male">
                          Male
                        </label>
                      </div>
                      <div class="form-check form-check-inline mr-3">
                        <input class="form-check-input form-control <?= form_error('gender') ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="female" value="Female" <?= set_radio('gender', 'Female'); ?>>
                        <label class="form-check-label" for="female">
                          Female
                        </label>
                      </div>
                    </div>
                    <?= form_error('gender', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="contact">Contact <span class="text-danger">*</span></label>
                    <input type="number" class="form-control <?= form_error('contact') ? 'is-invalid' : ''; ?>" id="contact" name="contact" placeholder="Contact" value="<?= set_value('contact'); ?>">
                    <?= form_error('contact', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                    <label for="program_type">Program Type <span class="text-danger">*</span></label>
                    <select class="form-control <?= form_error('program_type') ? 'is-invalid' : ''; ?>" id="program_type" name="program_type" onchange="updateYearOptions(); updateProgramOptions();"">
                      <option value="" disabled selected>Select Program Type</option>
                      <option value="College" <?= set_select('program_type', 'College'); ?>>College</option>
                      <option value="Senior High School" <?= set_select('program_type', 'Senior High School'); ?>>Senior High School</option>
                      <option value="Junior High School" <?= set_select('program_type', 'Junior High School'); ?>>Junior High School</option>
                      <option value="Grade School" <?= set_select('program_type', 'Grade School'); ?>>Grade School</option>
                    </select>
                    <?= form_error('program_type', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="year">Year Level <span class="text-danger">*</span></label>
                    <select class="form-control <?= form_error('year') ? 'is-invalid' : ''; ?>" id="year" name="year">
                      <option value="" disabled selected>Select Year Level</option>
                      <option value="5th" <?= set_select('year', '5th'); ?>>5th</option>
                      <option value="4th" <?= set_select('year', '4th'); ?>>4th</option>
                      <option value="3rd" <?= set_select('year', '3rd'); ?>>3rd</option>
                      <option value="2nd" <?= set_select('year', '2nd'); ?>>2nd</option>
                      <option value="1st" <?= set_select('year', '1st'); ?>>1st</option>
                      <option value="Grade 12" <?= set_select('year', 'Grade 12'); ?>>Grade 12</option>
                      <option value="Grade 11" <?= set_select('year', 'Grade 11'); ?>>Grade 11</option>
                      <option value="Grade 10" <?= set_select('year', 'Grade 10'); ?>>Grade 10</option>
                      <option value="Grade 9" <?= set_select('year', 'Grade 9'); ?>>Grade 9</option>
                      <option value="Grade 8" <?= set_select('year', 'Grade 8'); ?>>Grade 8</option>
                      <option value="Grade 7" <?= set_select('year', 'Grade 7'); ?>>Grade 7</option>
                      <option value="Grade 6" <?= set_select('year', 'Grade 6'); ?>>Grade 6</option>
                      <option value="Grade 5" <?= set_select('year', 'Grade 5'); ?>>Grade 5</option>
                      <option value="Grade 4" <?= set_select('year', 'Grade 4'); ?>>Grade 4</option>
                      <option value="Grade 3" <?= set_select('year', 'Grade 3'); ?>>Grade 3</option>
                      <option value="Grade 2" <?= set_select('year', 'Grade 2'); ?>>Grade 2</option>
                      <option value="Grade 1" <?= set_select('year', 'Grade 1'); ?>>Grade 1</option>
                      <option value="Senior Kinder" <?= set_select('year', 'Senior Kinder'); ?>>Senior Kinder</option>
                      <option value="Junior Kinder" <?= set_select('year', 'Junior Kinder'); ?>>Junior Kinder</option>
                      <option value="Special Education" <?= set_select('year', 'Special Education'); ?>>Special Education</option>
                    </select>
                    <?= form_error('year', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="program">Program <span class="text-danger">*</span></label>
                    <select class="form-control <?= form_error('program') ? 'is-invalid' : ''; ?>" id="program" name="program">
                      <option value="" disabled selected>Select Program</option>
                      <option value="Bachelor of Science in Business Administration" <?= set_select('program', 'Bachelor of Science in Business Administration'); ?>>BS in Business Administration</option>
                      <option value="Bachelor of Science in Hospitality Management" <?= set_select('program', 'Bachelor of Science in Hospitality Management'); ?>>BS in Hospitality Management</option>
                      <option value="Bachelor of Science in Tourism Management" <?= set_select('program', 'Bachelor of Science in Tourism Management'); ?>>BS in Tourism Management</option>
                      <option value="Bachelor of Science in Accountancy" <?= set_select('program', 'Bachelor of Science in Accountancy'); ?>>BS in Accountancy</option>
                      <option value="Bachelor of Science in Management Accounting" <?= set_select('program', 'Bachelor of Science in Management Accounting'); ?>>BS in Management Accounting</option>
                      <option value="Bachelor of Science in Criminology" <?= set_select('program', 'Bachelor of Science in Criminology'); ?>>BS in Criminology</option>
                      <option value="Bachelor of Science in Civil Engineering" <?= set_select('program', 'Bachelor of Science in Civil Engineering'); ?>>BS in Civil Engineering</option>
                      <option value="Bachelor of Science in Computer Engineering" <?= set_select('program', 'Bachelor of Science in Computer Engineering'); ?>>BS in Computer Engineering</option>
                      <option value="Bachelor of Science in Electronics Engineering" <?= set_select('program', 'Bachelor of Science in Electronics Engineering'); ?>>BS in Electronics Engineering</option>
                      <option value="Bachelor of Science in Electrical Engineering" <?= set_select('program', 'Bachelor of Science in Electrical Engineering'); ?>>BS in Electrical Engineering</option>
                      <option value="Bachelor of Science in Architecture" <?= set_select('program', 'Bachelor of Science in Architecture'); ?>>BS in Architecture</option>
                      <option value="Bachelor of Science in Fine Arts" <?= set_select('program', 'Bachelor of Science in Fine Arts'); ?>>BS in Fine Arts</option>
                      <option value="Bachelor of Science in Grade School Education" <?= set_select('program', 'Bachelor of Science in Grade School Education'); ?>>BS in Grade School Education</option>
                      <option value="Bachelor of Science in Secondary Education" <?= set_select('program', 'Bachelor of Science in Secondary Education'); ?>>BS in Secondary Education</option>
                      <option value="Bachelor of Science in Physical Education" <?= set_select('program', 'Bachelor of Science in Physical Education'); ?>>BS in Physical Education</option>
                      <option value="Bachelor of Science in Information Technology" <?= set_select('program', 'Bachelor of Science in Information Technology'); ?>>BS in Information Technology</option>
                      <option value="Bachelor of Science in Psychology" <?= set_select('program', 'Bachelor of Science in Psychology'); ?>>BS in Psychology</option>
                      <option value="Bachelor of Arts in Political Science" <?= set_select('program', 'Bachelor of Arts in Political Science'); ?>>BA in Political Science</option>
                      <option value="Bachelor of Arts in Psychology" <?= set_select('program', 'Bachelor of Arts in Psychology'); ?>>BA in Psychology</option>
                      <option value="Science, Technology, Engineering and Mathematics (STEM)" <?= set_select('program', 'Science, Technology, Engineering and Mathematics (STEM)'); ?>>Science, Technology, Engineering and Mathematics (STEM)</option>
                      <option value="Accountancy, Business and Management (ABM)" <?= set_select('program', 'Accountancy, Business and Management (ABM)'); ?>>Accountancy, Business and Management (ABM)</option>
                      <option value="Humanities and Social Sciences (HUMMS)" <?= set_select('program', 'Humanities and Social Sciences (HUMMS)'); ?>>Humanities and Social Sciences (HUMMS)</option>
                      <option value="Technical Vocational Livelihood (TVL)" <?= set_select('program', 'Technical Vocational Livelihood (TVL)'); ?>>Technical Vocational Livelihood (TVL)</option>
                      <option value="Special Science Class" <?= set_select('program', 'Special Science Class'); ?>>Special Science Class</option>
                      <option value="None" <?= set_select('program', 'None'); ?>>None</option>
                    </select>
                    <?= form_error('program', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('address') ? 'is-invalid' : ''; ?>" id="address" name="address" placeholder="Address" value="<?= set_value('address'); ?>">
                    <?= form_error('address', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="applicant_residence">Applicant Residence <span class="text-danger">*</span></label>
                    <select class="form-control <?= form_error('applicant_residence') ? 'is-invalid' : ''; ?>" id="applicant_residence" name="applicant_residence">
                      <option value="" disabled selected>Select Residence</option>
                      <option value="DWCC Dormitory" <?= set_select('applicant_residence', 'DWCC Dormitory'); ?>>DWCC Dormitory</option>
                      <option value="Off-Campus Boarding House" <?= set_select('applicant_residence', 'Off-Campus Boarding House'); ?>>Off-Campus Boarding House</option>
                      <option value="With Relative" <?= set_select('applicant_residence', 'With Relative'); ?>>With Relative</option>
                    </select>
                    <?= form_error('applicant_residence', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                  <a href="<?= site_url('auth/applicant_login'); ?>" class="btn btn-secondary btn-block">Back to Login</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script>
    function updateYearOptions() {
        const programType = document.getElementById('program_type').value;
        const yearSelect = document.getElementById('year');

        // Clear current options
        yearSelect.innerHTML = '<option value="" disabled selected>Select Year Level</option>';

        // Define year options based on program type
        let options = [];
        switch (programType) {
            case 'College':
                options = ['1st', '2nd', '3rd', '4th', '5th'];
                break;
            case 'Senior High School':
                options = ['Grade 12', 'Grade 11'];
                break;
            case 'Junior High School':
                options = ['Grade 10', 'Grade 9', 'Grade 8', 'Grade 7'];
                break;
            case 'Grade School':
                options = ['Grade 6', 'Grade 5', 'Grade 4', 'Grade 3', 'Grade 2', 'Grade 1', 'Senior Kinder', 'Junior Kinder', 'Special Education'];
                break;
            default:
                options = [];
        }

        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.textContent = option;
            yearSelect.appendChild(opt);
        });
    }

    function updateProgramOptions() {
        const programType = document.getElementById('program_type').value;
        const programSelect = document.getElementById('program');

        // Clear current options
        programSelect.innerHTML = '<option value="" disabled selected>Select Program</option>';

        // Define program options based on program type
        let options = [];
        switch (programType) {
            case 'College':
                options = [
                    'Bachelor of Science in Business Administration',
                    'Bachelor of Science in Hospitality Management',
                    'Bachelor of Science in Tourism Management',
                    'Bachelor of Science in Accountancy',
                    'Bachelor of Science in Management Accounting',
                    'Bachelor of Science in Criminology',
                    'Bachelor of Science in Civil Engineering',
                    'Bachelor of Science in Computer Engineering',
                    'Bachelor of Science in Electronics Engineering',
                    'Bachelor of Science in Electrical Engineering',
                    'Bachelor of Science in Architecture',
                    'Bachelor of Science in Fine Arts',
                    'Bachelor of Science in Grade School Education',
                    'Bachelor of Science in Secondary Education',
                    'Bachelor of Science in Physical Education',
                    'Bachelor of Science in Information Technology',
                    'Bachelor of Science in Psychology',
                    'Bachelor of Arts in Political Science',
                    'Bachelor of Arts in Psychology'
                ];
                break;
            case 'Senior High School':
                options = [
                    'Science, Technology, Engineering and Mathematics (STEM)',
                    'Accountancy, Business and Management (ABM)',
                    'Humanities and Social Sciences (HUMMS)',
                    'Technical Vocational Livelihood (TVL)'
                ];
                break;
            case 'Junior High School':
                options = ['Special Science Class', 'None'];
                break;
            case 'Pre-school':
            case 'Grade School':
                options = ['None'];
                break;
            default:
                options = [];
        }

        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.textContent = option;
            programSelect.appendChild(opt);
        });
    }
  </script>


</body>

</html>
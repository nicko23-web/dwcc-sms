<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.css">
</head>

<body class="hold-transition login-page">
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('assets/') ?>images/logo-preloader.png" alt="sms-logo" height="230" width="230">
  </div>
  <div class="login-box shadow-lg">
    <div class="card">
      <div class="card-body register-card-body">
        <div class="text-center">
          <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo" class="img-fluid mb-2" style="max-width: 130px;">
          <h5 class="mt-2 mb-0">Divine Word College of Calapan</h5>
          <p>Scholarship Management System</p>
        </div>
        <h6 class="register-box-msg mb-2">Forgot Password</h6>

        <!-- Display success or error messages -->
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <form id="forgotPasswordForm" action="<?= site_url('auth/applicant_send_verification_code'); ?>" method="post">
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter your email" value="<?= set_value('email'); ?>">
            <?= form_error('email', '<div class="invalid-feedback">', '</div>'); ?>
           
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" id="submitButton" class="btn btn-primary btn-block">Send Verification Code</button>
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

  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

  <script>
    $('#forgotPasswordForm').on('submit', function() {
      $('#submitButton').prop('disabled', true).text('Sending...');
    });
  </script>
</body>

</html>
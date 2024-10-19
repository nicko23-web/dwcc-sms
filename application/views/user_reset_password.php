<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box shadow-lg">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="text-center">
                    <img src="<?= base_url('assets/images/logo.svg'); ?>" alt="Logo" class="img-fluid mb-2" style="max-width: 130px;">
                    <h5 class="mt-2 mb-0">Divine Word College of Calapan</h5>
                    <p>Scholarship Management System</p>
                </div>
                <h6 class="login-box-msg">Reset your password</h6>

                <!-- Display error messages if any -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <form id="resetPasswordForm" action="<?= site_url('auth/user_reset_password'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="New Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" id="submitButton" class="btn btn-primary btn-block">Reset Password</button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <a href="<?= site_url('auth/login'); ?>" class="btn btn-secondary btn-block">Back to Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

    <script>
        $('#resetPasswordForm').on('submit', function() {
            $('#submitButton').prop('disabled', true).text('Resetting...');
        });
    </script>
</body>

</html>
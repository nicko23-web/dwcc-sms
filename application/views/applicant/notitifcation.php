<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications</title>
  <!-- Include necessary stylesheets and scripts -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- Include applicant header -->
    <?php $this->load->view('includes/applicant_header')?>

    <!-- Include applicant sidebar -->
    <?php $this->load->view('includes/applicant_sidebar')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Card for notification -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Notifications</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <?php if (!empty($applicant->comment)) { ?>
                    <div class="alert alert-info">
                      <i class="fas fa-comment mr-2"></i> <?= $applicant->comment ?>
                    </div>
                  <?php } else { ?>
                    <div class="alert alert-warning">
                      <i class="fas fa-exclamation-circle mr-2"></i> No notifications at the moment.
                    </div>
                  <?php } ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Include applicant footer -->
    <?php $this->load->view('includes/applicant_footer')?>

  </div>
  <!-- ./wrapper -->

</body>
</html>

<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/sidebar') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Search Results</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('twc/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Search Results</li>
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
                    <?php 
                    $anyResults = false; 
                    ?>
                    <?php if (!empty($applicants)): ?>
                        <?php $anyResults = true; ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Applicant Results</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Applicant No</th>
                                            <th>ID Number</th>
                                            <th>Full Name</th>
                                            <th>Program</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($applicants as $applicant): ?>
                                            <tr>
                                                <td><?= $applicant->applicant_no ?></td>
                                                <td><?= $applicant->id_number ?></td>
                                                <td><?= $applicant->firstname . ' ' . $applicant->lastname ?></td>
                                                <td><?= $applicant->program ?></td>
                                                <td><?= $applicant->status ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Card for Shortlisted Applicants -->
                    <?php if (!empty($shortlisted_applicants)): ?>
                        <?php $anyResults = true; ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Shortlisted Applicants</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Shortlist ID</th>
                                            <th>Applicant No</th>
                                            <th>ID Number</th>
                                            <th>Full Name</th>
                                            <th>Program</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($shortlisted_applicants as $shortlisted): ?>
                                            <tr>
                                                <td><?= $shortlisted->shortlist_id ?></td>
                                                <td><?= $shortlisted->applicant_no ?></td>
                                                <td><?= $shortlisted->id_number ?></td>
                                                <td><?= $shortlisted->firstname . ' ' . $shortlisted->lastname ?></td>
                                                <td><?= $shortlisted->program ?></td>
                                                <td><?= $shortlisted->status ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- No Results Found Message -->
                    <?php if (!$anyResults): ?>
                        <div>
                            No results found.
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('includes/footer') ?>

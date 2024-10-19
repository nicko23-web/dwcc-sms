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
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>">Home</a></li>
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
                    <?php if (!empty($applicant_results) && empty($user_results)): ?>
                        <!-- Card for Applicant Search Results -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Applicant Results</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Campus</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($applicant_results as $result): ?>
                                            <tr>
                                                <td><?= $result->id_number ?></td>
                                                <td><?= $result->firstname . ' ' . ($result->middlename ? $result->middlename . ' ' : '') . $result->lastname ?></td>
                                                <td><?= $result->email ?></td>
                                                <td><?= $result->campus ?></td>
                                                <td><?= $result->status ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php elseif (empty($applicant_results) && !empty($user_results)): ?>
                        <!-- Card for User Search Results -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Results</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user_results as $user): ?>
                                            <tr>
                                                <td><?= $user->id_number ?></td>
                                                <td><?= $user->name ?></td>
                                                <td><?= $user->email ?></td>
                                                <td><?= $user->usertype ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php elseif (!empty($applicant_results) && !empty($user_results)): ?>
                        <!-- Card for Applicant Search Results -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Applicant Results</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Campus</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($applicant_results as $result): ?>
                                            <tr>
                                                <td><?= $result->id_number ?></td>
                                                <td><?= $result->firstname . ' ' . ($result->middlename ? $result->middlename . ' ' : '') . $result->lastname ?></td>
                                                <td><?= $result->email ?></td>
                                                <td><?= $result->campus ?></td>
                                                <td><?= $result->status ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Card for User Search Results -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <h3 class="card-title">User Results</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user_results as $user): ?>
                                            <tr>
                                                <td><?= $user->id_number ?></td>
                                                <td><?= $user->name ?></td>
                                                <td><?= $user->email ?></td>
                                                <td><?= $user->usertype ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php else: ?>
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

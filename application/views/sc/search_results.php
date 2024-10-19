<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Search Results</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php 
                    // Flag to check if any results are found
                    $anyResults = false; 
                    ?>

                    <?php if (!empty($applicant_results)): ?>
                        <?php $anyResults = true; ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Applicant Results</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($applicant_results as $applicant): ?>
                                            <tr>
                                                <td><?= $applicant->id_number ?></td>
                                                <td><?= $applicant->firstname . ' ' . ($applicant->middlename ? $applicant->middlename . ' ' : '') . $applicant->lastname ?></td>
                                                <td><?= $applicant->email ?></td>
                                                <td><?= $applicant->status ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($shortlist_results)): ?>
                        <?php $anyResults = true; ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Shortlist Results</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Shortlist Id</th>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Scholarship Program</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($shortlist_results as $applicant): ?>
                                            <tr>
                                                <td><?= $applicant->shortlist_id ?></td>
                                                <td><?= $applicant->id_number ?></td>
                                                <td><?= $applicant->firstname . ' ' . ($applicant->middlename ? $applicant->middlename . ' ' : '') . $applicant->lastname ?></td>
                                                <td><?= $applicant->scholarship_program ?></td>
                                                <td><?= $applicant->status ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($final_list_results)): ?>
                        <?php $anyResults = true; ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Final List Results</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Final List Id</th>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Scholarship Program</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($final_list_results as $applicant): ?>
                                            <tr>
                                                <td><?= $applicant->final_list_id ?></td>
                                                <td><?= $applicant->id_number ?></td>
                                                <td><?= $applicant->firstname . ' ' . ($applicant->middlename ? $applicant->middlename . ' ' : '') . $applicant->lastname ?></td>
                                                <td><?= $applicant->scholarship_program ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($school_year_results)): ?>
                        <?php $anyResults = true; ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">School Year Results</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>School Year Id</th>
                                            <th>Academic Year</th>
                                            <th>Semester</th>
                                            <th>Campus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($school_year_results as $school_year): ?>
                                            <tr>
                                                <td><?= $school_year->school_year_id ?></td>
                                                <td><?= $school_year->academic_year ?></td>
                                                <td><?= $school_year->semester ?></td>
                                                <td><?= $school_year->campus ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($requirement_results)): ?>
                        <?php $anyResults = true; ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Requirement Results</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Requirement Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($requirement_results as $requirements): ?>
                                            <tr>
                                                <td><?=  $requirements->id ?></td>
                                                <td><?=  $requirements->requirement_name ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($program_results)): ?>
                        <?php $anyResults = true; ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Scholarship Program Results</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Program Code</th>
                                            <th>Program Name</th>
                                            <th>Campus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($program_results as $program): ?>
                                            <tr>
                                                <td><?= $program->program_code ?></td>
                                                <td><?= $program->scholarship_program ?></td>
                                                <td><?= $program->campus ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

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

<?php $this->load->view('includes/footer'); ?>

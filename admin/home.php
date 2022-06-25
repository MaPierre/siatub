<h1 style="font-size:25px;text-align:center;color:green">Bienvenue au <?php echo $_settings->info('name') ?></h1>
<hr class="border-info">
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 bg-success.bg-gradient">
        <div class="info-box bg-danger shadow ">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-building" aria-hidden="true"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Départements </span>
                <span class="info-box-number text-right">
                    <?php 
                    echo $conn->query("SELECT * FROM `department_list` where status = 1")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-primary bg-gradient shadow">
            <span class="info-box-icon bg-danger bg-gradient elevation-1"><i class='fas fa-scroll fa-spin fa-1x'
                    style='color:green'></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Filières/Options</span>
                <span class="info-box-number text-right">
                    <?php 
                    echo $conn->query("SELECT * FROM `tbl_filieres` where `status` = 1")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-info shadow">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-graduation-cap"
                    aria-hidden="true"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Etudiants vérifiés</span>
                <span class="info-box-number text-right">
                    <?php 
                    echo $conn->query("SELECT * FROM `student_list` where `status` = 1")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-danger bg-gradient shadow">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Etudiants non vérifiés</span>
                <span class="info-box-number text-right">
                    <?php 
                    echo $conn->query("SELECT * FROM `student_list` where `status` = 0")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-secondary shadow">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Archives vérifiées</span>
                <span class="info-box-number text-right">
                    <?php 
                    echo $conn->query("SELECT * FROM `archive_list` where `status` = 1")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-success bg-gradient shadow">
            <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-archive"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Archives non vérifiées</span>
                <span class="info-box-number text-right">
                    <?php 
                    echo $conn->query("SELECT * FROM `archive_list` where `status` = 0")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>

</body>

</html>
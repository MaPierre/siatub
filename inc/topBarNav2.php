<nav class="main-header navbar navbar-expand flex-column navbar-red  border-0 navbar-light text-sm" id='top-Nav'>

    <div class="container">
        <a href="./" class="navbar-brand">
            <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Site Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span><?= $_settings->info('short_name') ?></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="./" class="nav-link <?= isset($page) && $page =='home' ? "active" : "" ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="./?page=projects"
                        class="nav-link <?= isset ($page) && $page =='projects' ? "active" : "" ?>">Projets</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle  <?= isset($page) && $page =='projects_per_department' ? "active" : "" ?>">Par
                        Département</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                        style="left: 0px; right: inherit;">
                        <?php 
                    $departments = $conn->query("SELECT * FROM department_list where status = 1 order by `name` asc");
                    $dI =  $departments->num_rows;
                    while($row = $departments->fetch_assoc()):
                      $dI--;
                  ?>
                        <li>
                            <a href="./?page=projects_per_department&id=<?= $row['id'] ?>"
                                class="dropdown-item"><?= ucwords($row['name']) ?></a>
                            <?php if($dI != 0): ?>
                        <li class="dropdown-divider"></li>
                        <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="nav-link dropdown-toggle  <?= isset($page) && $page =='projects_per_curriculum' ? "active" : "" ?>">Par
                    Filière</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                    style="left: 0px; right: inherit;">
                    <?php 
                    $curriculums = $conn->query("SELECT * FROM tbl_filieres where status = 1 order by `name` asc");
                    $cI =  $curriculums->num_rows;
                    while($row = $curriculums->fetch_assoc()):
                      $cI--;
                  ?>
                    <li>
                        <a href="./?page=projects_per_curriculum&id=<?= $row['id'] ?>"
                            class="dropdown-item"><?= ucwords($row['name']) ?></a>
                        <?php if($cI != 0): ?>
                    <li class="dropdown-divider"></li>
                    <?php endif; ?>
            </li>
            <?php endwhile; ?>
            </ul>
            </li>
            <li class="nav-item">
                <a href="./?page=about" class="nav-link <?= isset($page) && $page =='about' ? "active" : "" ?>">A
                    Propos</a>
            </li>
            <!-- <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
              </li> -->
            <?php if($_settings->userdata('id') > 0): ?>
            <li class="nav-item">
                <a href="./?page=profile"
                    class="nav-link <?= isset($page) && $page =='profile' ? "active" : "" ?>">Profil</a>
            </li>
            <li class="nav-item">
                <a href="./?page=submit-archive"
                    class="nav-link <?= isset($page) && $page =='submit-archive' ? "active" : "" ?>">Soumettre une
                    thèse/article</a>
            </li>
            <?php endif; ?>
            </ul>


        </div>
        <!-- Right navbar links -->
        <div class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <a href="javascript:void(0)" class="text-navy" id="search_icon"><i class="fa fa-search">Recherche</i></a>
            <div class="position-relative">
                <div id="search-field" class="position-absolute">
                    <input type="search" id="search-input" class="form-control rounded-0" required
                        placeholder="Titre,Résumé,membres,département,filière,description..."
                        value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
$(function() {
    $('#search-form').submit(function(e) {
        e.preventDefault()
        if ($('[name="q"]').val().length == 0)
            location.href = './';
        else
            location.href = './?' + $(this).serialize();
    })
    $('#search_icon').click(function() {
        $('#search-field').addClass('show')
        $('#search-input').focus();

    })
    $('#search-input').focusout(function(e) {
        $('#search-field').removeClass('show')
    })
    $('#search-input').keydown(function(e) {
        if (e.which == 13) {
            location.href = "./?page=projects&q=" + encodeURI($(this).val());
        }
    })

})
</script>
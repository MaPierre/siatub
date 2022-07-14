<style>
.img-avatar {
    width: 45px;
    height: 45px;
    object-fit: cover;
    object-position: center center;
    border-radius: 100%;
}
</style>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h2 class="card-title">Thèmes archivées</h2>
    </div>
    <div class="card-body">
        <a href="export.php" class=" btn btn-success">Exporter</a>
        <br>
        <div class="container-fluid">
            <div class="container-fluid">
                <table class="table table-hover table-striped">
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="15%">
                        <col width="20%">
                        <col width="20%">
                        <col width="10%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Publié en</th>
                            <th>Code d'archivage</th>
                            <th>Titre du projet</th>
                            <th>Cote</th>
                            <th>Filière</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						$i = 1;
						$curriculum = $conn->query("SELECT * FROM tbl_filieres where id in (SELECT curriculum_id from `archive_list`)");
						$cur_arr = array_column($curriculum->fetch_all(MYSQLI_ASSOC),'name','id');
						$qry = $conn->query("SELECT * from `archive_list` order by `year` desc, `title` desc ");
						while($row = $qry->fetch_assoc()):
					?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td class=""><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                            <td><?php echo ($row['archive_code']) ?></td>
                            <td><?php echo ucwords($row['title']) ?></td>
                            <td><?php echo $row['cote'] ?></td>
                            <td><?php echo $cur_arr[$row['curriculum_id']] ?></td>
                            <td class="text-center">
                                <?php
                                    switch($row['status']){
                                        case '1':
                                            echo "<span class='badge badge-success badge-pill'>Publié</span>";
                                            break;
                                        case '0':
                                            echo "<span class='badge badge-secondary badge-pill'>Non publié</span>";
                                            break;
                                    }
                                ?>
                            </td>
                            <td align="center">
                                <button type="button"
                                    class="btn btn-flat btn-primary btn-sm dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown">
                                    Action
                                    <span class="sr-only">Basculer vers le menu déroulant</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item"
                                        href="<?= base_url ?>/?page=view_archive&id=<?php echo $row['id'] ?>"
                                        target="_blank"><span
                                            class="fa fa-external-link-alt text-gray"></span>Afficher</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item update_status" href="javascript:void(0)"
                                        data-id="<?php echo $row['id'] ?>"
                                        data-status="<?php echo $row['status'] ?>"><span
                                            class="fa fa-check text-dark"></span> Mettre à jour le statut</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item delete_data" href="javascript:void(0)"
                                        data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span>
                                        Effacer</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.verified').click(function() {
        _conf("Êtes-vous sûr de vérifier cette demande d'inscription ?", "verified", [$(this).attr(
            'data-id')])
    })
    $('.delete_data').click(function() {
        _conf("Êtes-vous sûr de supprimer définitivement ce projet ?", "delete_archive", [$(this).attr(
            'data-id')])
    })
    $('.update_status').click(function() {
        uni_modal("Modifier le statut", "archives/update_status.php?id=" + $(this).attr('data-id') +
            "&status=" + $(this).attr('data-status'))
    })
    $('.table td,.table th').addClass('py-1 px-2 align-middle')
    $('.table').dataTable({
        columnDefs: [{
            orderable: false,
            targets: 5
        }],
    });
})

function delete_archive($id) {
    start_loader();
    $.ajax({
        url: _base_url_ + "classes/Master.php?f=delete_archive",
        method: "POST",
        data: {
            id: $id
        },
        dataType: "json",
        error: err => {
            console.log(err)
            alert_toast("An error occured.", 'error');
            end_loader();
        },
        success: function(resp) {
            if (typeof resp == 'object' && resp.status == 'success') {
                location.reload();
            } else {
                alert_toast("An error occured.", 'error');
                end_loader();
            }
        }
    })
}
</script>
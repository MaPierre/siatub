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
        <h2 class="card-title">Liste des étudiants</h2>
    </div>
    <div class="card-body">
        <a href="etudiants_excel.php" class="btn btn-danger">Exporter la liste</a>
        <br>
        <div class="container-fluid">
            <div class="container-fluid">
                <table class="table table-hover table-bordered">
                    <colgroup>
                        <col width="5%">
                        <col width="10%">
                        <col width="30%">
                        <col width="10%">
                        <col width="20%">
                        <col width="10%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Matricule</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						$i = 1;
						$qry = $conn->query("SELECT *,concat(lastname,' ',firstname) as fullname from `student_list`  order by concat(lastname,' ',firstname) asc ");
						while($row = $qry->fetch_assoc()):
					?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td class="text-center"><img src="<?php echo validate_image($row['avatar']) ?>"
                                    class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar"></td>
                            <td><?php echo ucwords($row['fullname']) ?></td>
                            <td><?php echo ($row['matricule']) ?></td>
                            <td>
                                <p class="m-0 truncate-1"><?php echo $row['email'] ?></p>
                            </td>
                            <td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                <span class="badge badge-pill badge-success">Vérifié</span>
                                <?php else: ?>
                                <span class="badge badge-pill badge-primary">pas Vérifié</span>
                                <?php endif; ?>
                            </td>
                            <td align="center">
                                <button type="button" class="btn btn-flat btn-info btn-sm dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown">
                                    Action
                                    <span class="sr-only">Basculer vers le menu déroulant</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item view_details" href="javascript:void(0)"
                                        data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span>
                                        Afficher</a>
                                    <div class="dropdown-divider"></div>
                                    <?php if($row['status'] != 1): ?>
                                    <a class="dropdown-item verify_user" href="javascript:void(0)"
                                        data-id="<?= $row['id'] ?>" data-name="<?= $row['email'] ?>"><span
                                            class="fa fa-check text-primary"></span> Vérifier</a>
                                    <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                    <a class="dropdown-item delete_data" href="javascript:void(0)"
                                        data-id="<?php echo $row['id'] ?>" data-name="<?= $row['email'] ?>"><span
                                            class="fa fa-trash text-danger"></span> Effacer</a>
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
    $('.delete_data').click(function() {
        _conf("Êtes-vous sûr de vouloir supprimer <b>" + $(this).attr('data-name') +
            "</b> de la liste des étudiants de façon permanente ?", "delete_user", [$(this).attr(
                'data-id')])
    })
    $('.table td,.table th').addClass('py-1 px-2 align-middle')
    $('.verify_user').click(function() {
        _conf("Voulez-vous vérifier le compte  &nbsp;<b>" + $(this).attr('data-name') + "<b/>?",
            "verify_user",
            [$(this).attr('data-id')])
    })
    $('.view_details').click(function() {
        uni_modal('Détails Etudiants', "students/view_details.php?id=" + $(this).attr('data-id'),
            'mid-large')
    })
    $('.table').dataTable();

})

function delete_user($id) {
    start_loader();
    $.ajax({
        url: _base_url_ + "classes/Users.php?f=delete_student",
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

function verify_user($id) {
    start_loader();
    $.ajax({
        url: _base_url_ + "classes/Users.php?f=verify_student",
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
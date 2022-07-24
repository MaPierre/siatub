<html>
<body>
<head>
<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="../../DataTables/datatables.min.js"></script>

</head>

<style>
.img-avatar {
    width: 45px;
    height: 45px;
    object-fit: cover;
    object-position: center center;
    border-radius: 100%;
}
table,
th,
td {
    border: 1px solid SteelBlue;
}
</style>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Liste des Membres</h3>
        
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <table id="membre"class="table table-hover table-striped">
                    <colgroup>
                        <col width="5%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="35%">
                       
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CNI</th>
                            <th>Nom Complet</th>
                            <th>Adresse</th>
                            <th>Organisation/Université</th>
                            <th>Niveau d'étude</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						$i = 1;
						$qry = $conn->query("SELECT * from `membres`");
						while($row = $qry->fetch_assoc()):
						
					?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo ($row['membresIDCNI']) ?></td>
                            <td><?php echo ($row['membresNom']) ?></td>
                            <td><?php echo ($row['membresAdresse']) ?></td>
                            <td><?php echo ($row['membresOrganisation']) ?></td>
                            <td><?php echo ($row['membresNiveau']) ?></td>
                            <td><?php echo ($row['membresTelephone']) ?></td>
                            <td><?php echo ($row['membresEmail']) ?></td>
                            
                            
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready( function () {
    $('#membre').DataTable();
} );

</script>

</html>
</body>
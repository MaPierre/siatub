<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrition pour les membres</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
      body {
        background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
        ;
      }
    </style>
  </head>
  <body>
    <div> <?php
        if (isset($_POST['creermembre'])) {
            $membresIDCNI = htmlspecialchars($_POST['membreID']);
            $membresNom = htmlspecialchars($_POST['membreNomComplet']);
            $membresAdresse = htmlspecialchars($_POST['membreAdresse']);
            $membresOrganisation =htmlspecialchars( $_POST['membreOrganisation']);
            $membresNiveau = htmlspecialchars($_POST['membreNiveau']);
            $membresTelephone  = htmlspecialchars($_POST['membreTel']);
            $membresEmail = $_POST['membreEmail'];
            $membresMotPasse =password_hash( $_POST['mdp'],PASSWORD_DEFAULT);
            echo "Numéro d'identite : ".$membresIDCNI .'
							<br>' ;
            echo "Nom Complet :".$membresNom .'
								<br>';
            echo "Adresse  :".$membresAdresse.'
									<br>';
            echo "Université/organisation :".$membresOrganisation.'
										<br>';
            echo "Niveau d'étude : ".$membresNiveau.'
											<br>';
            echo "Téléphone :" .$membresTelephone .'
												<br>';
            echo "Email : ".$membresEmail  .'
													<br>';
            

$query = "INSERT into `membres` 
(membresIDCNI, membresNom, membresAdresse, 
membresOrganisation, membresNiveau,membresTelephone,
membresEmail, membresMotPasse)
VALUES 
('$membresIDCNI', '$membresNom', '$membresAdresse', 
'$membresOrganisation', '$membresNiveau','$membresTelephone',
 '$membresEmail', '$membresMotPasse')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "
														<div class='form'>
															<h3>Vous etes enregistrés avec succès,aller à la Bibliothèque pour la validation de votre abonnement.</h3>
															<br/>Click here to 
															<a href='login.php'>Login</a>
														</div>";
        }


           
        }
        else{
            
        
        ?> </div>
    <div>
      <form action="" method="POST">
        <div class="container">
          <div class="row">
            <h1>Inscription</h1>
            <p>Remplissez le formulaire avec des données valides</p>
            <div class="col-sm-6">
              <label for="membreID">
                <b>CNI</b>
              </label>
              <input class="form-control" type="text" name="membreID" id="membreID" required>
              <label for="membreNomComplet">
                <b>Votre Nom Complet</b>
              </label>
              <input class="form-control" type="text" name="membreNomComplet" id="MembreNomComplet" required>
              <label for="membreAdresse">
                <b>Votre Adresse</b>
              </label>
              <input class="form-control" type="text" name="membreAdresse" id="membreAdresse" required>
              <label for="membreOrganisation">
                <b>Votre Université/Organisation</b>
              </label>
              <input class="form-control" type="text" name="membreOrganisation" id="membreOrganisation" required>
              <label for="membreNiveau">
                <b>Votre Niveau d'étude</b>
              </label>
              <input class="form-control" type="text" name="membreNiveau" id="membreNiveau" required>
            </div>
            <div class="col-sm-6">
              <label for="membreTel">
                <b>Numéro Téléphone</b>
              </label>
              <input class="form-control" type="tel" name="membreTel" id="membreTel" required>
              <label for="membreEmail">
                <b>Adressse Email</b>
              </label>
              <input class="form-control" type="email" name="membreEmail" id="membreEmail" required>
              <label for="mdp">
                <b>Mot de passe</b>
              </label>
              <input class="form-control" type="password" name="mdp" id="mpd" required>
              <label for="cmdp">
                <b>Confimer Mot de passe</b>
              </label>
              <input class="form-control" type="password" name="cmdp" id="cmpd" required>
              <hr class="mb-3">
              <label for="creermembre">
                <b>Vérifier les infos et valider</b>
              </label>
              <input class="btn btn-primary" type="submit" name="creermembre" value="Valider">
            </div>
          </div>
        </div>
      </form>
    </div> <?php } ?>
    <!--<script src="plugins/jquery/jquery.min.js"></script>-->
    <!-- Bootstrap 4 -->
    <!--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
    <!-- AdminLTE App -->
    <!--<script src="dist/js/adminlte.min.js"></script>-->
    <!-- Select2 -->
    <!--<script src="
																								<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>-->
  </body>
</html>
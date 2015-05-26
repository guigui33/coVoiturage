<div class="jumbotron formRecherche">
         <section>
         <h1>RECHERCHE</h1>
         <p class="lead">Rechercher votre trajet.</p>
            <form method="post" action="index.php?p=resultatRecherche" onSubmit="return verif(this)">
                
                <div class="form-group col-lg-4">   
                    <label for="texte">Départ :</label> 
                    <input value="Toulouse" id= "text" type="text" name="villeDepart" class="form-control" placeholder="Ex: Toulouse,Paris,...">
                </div> 
                <div class="form-group col-lg-4">   
                    <label for="texte">Arrivée :</label> 
                    <input value="Bordeaux" id= "text" type="text" name="villeDestination" class="form-control" placeholder="Ex: Toulouse,Paris,...">
                </div> 
                <div class="form-group col-lg-4">   
                    <label for="texte">Date (jj/mm/aaaa) :</label> 
                    <input type="text" class="form-control" name="date" id ="datepicker" placeholder="Ex: 18/11/2015,...">
                </div> 
                <input class="btn btn-lg btn-success bouton rechercher" type='submit' value='Rechercher !' name='bp_rechercher' />
          </form>
        </section>
 </div>

 
 
      <div class="row marketing">
      <h2><center>Les 10 derniers trajets du site</center></h2>
        <div class="col-lg-6">
 <?php
 
     /* On récupère les derniers trajets de 1 à 5 */
    $reqTrajets="select c.idU, c.prenomU, c.nomU, v1.nomV as villeDepart, v2.nomV as villeArrivee, t.dateT as date, t.heureD as heureDepart, t.heureA as heureArrivee, t.idT as idT from CompteUtilisateur c, trajets t, Villes v1, Villes v2 where c.idU = t.idConducteur and v1.idVille = t.idVilleDepart and v2.idVille = t.idVilleDestination ORDER BY t.dateT LIMIT 0,5";
    
    
				$resTrajets=mysqli_query($conn, $reqTrajets) or die('Erreur select : '.mysqli_error($conn));
				while ($trajet = mysqli_fetch_array($resTrajets)){
                    ?>
					
    		<div class="form-group annonce mesTrajets">
          <h4><?php echo $trajet['villeDepart']." > ".$trajet['villeArrivee']; ?></h4>
          <ul >
            <li class="list-unstyled">Conducteur : <?php echo $trajet['prenomU'] . " " . $trajet['nomU'] . " (" . $trajet['idU'] . ")" ?></li>
            <li class="list-unstyled">Point de Rendez-vous : <?php echo $trajet['villeDepart'] ?></li>
            <li class="list-unstyled">Point d'Arrivée : <?php echo $trajet['villeArrivee'] ?></li>
            <li class="list-unstyled">Date : <?php echo date('d/m/Y', $trajet['date']); ?></li>
            <li class="list-unstyled">Heure de Départ : <?php echo $trajet['heureDepart'] ?> </li>
            <li class="list-unstyled">Heure d'Arrrivée prévue : <?php echo $trajet['heureArrivee'] ?>
          </ul>
            <a class="btn btn-lg btn-success bouton" href="?p=trajetDetails&amp;t=<?=$trajet['idT']?>" role="button">Voir Détails...</a></li>
          </div> 
				<?php
                }
    ?>
 </div>
        <div class="col-lg-6">
 <?php
 
     /* On récupère les derniers trajets de 5 à 10 */
    $reqTrajets="select c.idU, c.prenomU, c.nomU, v1.nomV as villeDepart, v2.nomV as villeArrivee, t.dateT as date, t.heureD as heureDepart, t.heureA as heureArrivee, idT from CompteUtilisateur c, trajets t, Villes v1, Villes v2 where c.idU = t.idConducteur and v1.idVille = t.idVilleDepart and v2.idVille = t.idVilleDestination ORDER BY t.dateT LIMIT 5,5";
    
    
				$resTrajets=mysqli_query($conn, $reqTrajets) or die('Erreur select : '.mysqli_error($conn));
				while ($trajet = mysqli_fetch_array($resTrajets)){
                    ?>
					
    		<div class="form-group annonce mesTrajets">
          <h4><?php echo $trajet['villeDepart']." > ".$trajet['villeArrivee']; ?></h4>
          <ul >
            <li class="list-unstyled">Conducteur : <?php echo $trajet['prenomU'] . " " . $trajet['nomU'] . " (" . $trajet['idU'] . ")" ?></li>
            <li class="list-unstyled">Point de Rendez-vous : <?php echo $trajet['villeDepart'] ?></li>
            <li class="list-unstyled">Point d'Arrivée : <?php echo $trajet['villeArrivee'] ?></li>
            <li class="list-unstyled">Date : <?php echo date('d/m/Y', $trajet['date']); ?></li>
            <li class="list-unstyled">Heure de Départ : <?php echo $trajet['heureDepart'] ?> </li>
            <li class="list-unstyled">Heure d'Arrrivée prévue : <?php echo $trajet['heureArrivee'] ?> 
          </ul>
            <a class="btn btn-lg btn-success bouton" href="?p=trajetDetails&amp;t=<?=$trajet['idT']?>" role="button">Voir Détails...</a></li>
          </div> 
				<?php
                }
    ?>
 </div>
 </div>
 
      </div>
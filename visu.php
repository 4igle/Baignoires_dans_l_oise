<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consultation</title>
    <link rel="stylesheet" href="css/visu.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include('bdd/bdd.php');
        if((empty($_POST['login']))||(empty($_POST['password'])))
          { ?>
            <div id='conteneur'>
              <div class='tt'>
                <h1>Connexion</h1>
              </div>
                <form  action="visu.php" method="post">
                  <div class='tt1'>
                    Login: <input type='text' name="login" required><br>
                  </div>
                  <div class='tt2'>
                    Password: <input type='password' name='password' required><bR>
                  </div>
                  <div class='tt3'>
                    <input type="submit"  value="Se connecter">
                  </div>
                  <?php
                  if(!empty($_GET['error'])){
                    echo "<div class='error'>    Identifiant ou/et mot de passe invalide</div>";
                  }
                  ?>
                </form>
              </div> <?php
          }
          else
          {
            if(($_POST['login']!='tLu5h49SY')||($_POST['password']!='yXx89JF2n'))
            {
              header("Location: visu.php?error=1");
            }
            else
            {
              echo "<div class='general'>";
              echo "<div id='gauche'>";
              echo "<div class='bleu'><h1 class='titre'>Liste des équipes inscrites :</h1></div>";
              $query="SELECT * FROM equipe INNER JOIN chef ON equipe.idequipe=chef.idequipe WHERE equipe.attente=0 ";
              $reponse = $bdd->query($query);
              while ($donnees = $reponse->fetch())
              {
                echo "<div class='equipe'>";
                echo "<table border=1>";
                echo "<tr><th>Nom de l'équipe</th><th>Date d'inscription</th><th>UTC</th></tr>";
                echo "<tr><td>".$donnees['nomequipe']."</td><td>".$donnees['date']."</td><td>";
                if($donnees['utc']==1)
                {
                  echo "<span class='vert'>Oui</span>";
                }
                else
                {
                  echo "<span class='rouge'>Non</span>";
                }
                echo "</td></tr>";
                echo "</table><br>";
                echo "Info du Chef:<br><br><table border=1>";
                echo "<tr><th>Nom</th><th>Prénom</th><th>Age</th><th>Tel</th><th>Mail</th>";
                echo "<tr><td>".$donnees['nom']."</td><td>".$donnees['prenom']."</td><td>".$donnees['age']."</td><td>".$donnees['tel']."</td><td>".$donnees['mail']."</td></tr>";
                echo "</table>";
                $query2="SELECT * FROM membres  WHERE idequipe=:idequipe";
                $reponse2 = $bdd->prepare($query2);
                $reponse2->execute(array(
                          'idequipe' => $donnees['idequipe']
                          ));
                echo "<br>Membres de l'équipe:<br><br><table border=1>";
                echo "<tr><th>Nom</th><th>Prénom</th><th>Age</th></tr>";
                while ($donnees2 = $reponse2->fetch())
                {
                  echo "<tr><td>".$donnees2['nom']."</td><td>".$donnees2['prenom']."</td><td>".$donnees2['age']."</td></tr>";

                }
                echo '</table>';
                echo "</div>";

              }
              echo "</div>";
              echo "<div id='droite'>";
              echo "<div class='bleu'><h1 class='titre'>Liste des équipes inscrites en attente :</h1></div>";
              $query="SELECT * FROM equipe INNER JOIN chef ON equipe.idequipe=chef.idequipe WHERE equipe.attente=1 ";
              $reponse = $bdd->query($query);
              while ($donnees = $reponse->fetch())
              {
                echo "<div class='equipe'>";
                echo "<table border=1>";
                echo "<tr><th>Nom de l'équipe</th><th>Date d'inscription</th><th>UTC</th></tr>";
                echo "<tr><td>".$donnees['nomequipe']."</td><td>".$donnees['date']."</td><td>";
                if($donnees['utc']==1)
                {
                  echo "<span class='vert'>Oui</span>";
                }
                else
                {
                  echo "<span class='rouge'>Non</span>";
                }
                echo "</td></tr>";
                echo "</table><br>";
                echo "Info du Chef:<br><br><table border=1>";
                echo "<tr><th>Nom</th><th>Prénom</th><th>Age</th><th>Tel</th><th>Mail</th>";
                echo "<tr><td>".$donnees['nom']."</td><td>".$donnees['prenom']."</td><td>".$donnees['age']."</td><td>".$donnees['tel']."</td><td>".$donnees['mail']."</td></tr>";
                echo "</table>";
                $query2="SELECT * FROM membres  WHERE idequipe=:idequipe";
                $reponse2 = $bdd->prepare($query2);
                $reponse2->execute(array(
                          'idequipe' => $donnees['idequipe']
                          ));
                echo "<br>Membres de l'équipe:<br><br><table border=1>";
                echo "<tr><th>Nom</th><th>Prénom</th><th>Age</th></tr>";
                while ($donnees2 = $reponse2->fetch())
                {
                  echo "<tr><td>".$donnees2['nom']."</td><td>".$donnees2['prenom']."</td><td>".$donnees2['age']."</td></tr>";
                }
                echo '</table>';
                echo "</div>";
              }
              echo "</div>";
              echo "</div>";
            }
          }
          ?>
  </body>
</html>

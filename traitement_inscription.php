<?php header("X-FRAME-OPTIONS: DENY"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<body>
<?php
    include('bdd/bdd.php');
    date_default_timezone_set('Europe/Paris');
    $date = date('j-m-Y_H\hi\ms\s');
    if(empty($_POST['equipeutc']))
    {
      $equipeutc=0;
    }
    else
    {
      $equipeutc=1;
    }

    $continuer = 0;

    if(empty($_POST['prenom_chef'])||empty($_POST['nom_chef'])||empty($_POST['name']) ||empty($_POST['age_chef'])||empty($_POST['mail'])||empty($_POST['tel'])||empty($_POST['prenom1'])||empty($_POST['age1'])||empty($_POST['nom1']))
    {
        echo "Veuillez entrer tous les champs demandés.";
        echo "<a href='inscription.php'>Revenir à la saisie</a>";
        $continuer=1;
        $e = 1;
    }

    else
    {
      if ((preg_match("#^0[1-9]([-. ]?[0-9]{2}){4}[-. ]{0,}$#", $_POST['tel']))&&(preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$#", $_POST['mail']))&&(preg_match("#^(?:1[01][0-9]|120|1[8-9]|[2-9][0-9])$#",$_POST['age_chef']))&&(preg_match("#^(?:1[01][0-9]|120|1[5-9]|[2-9][0-9])$#",$_POST['age1']))&&(preg_match("#^[a-zA-Z0-9éêèëàâùüûçìîôòÉÊÈËÀÂÙÜÛÇÌÎÔÒ!?. +:;,'*/-]+$#",$_POST['name'])))
      {
          $nom = htmlspecialchars($_POST['nom_chef']);
          $prenom =htmlspecialchars($_POST['prenom_chef']);
          $name=htmlspecialchars($_POST['name']);
          $mail= strtolower(htmlspecialchars($_POST['mail']));
          $tel=$_POST['tel'];

          $nom1 = htmlspecialchars($_POST['nom1']);
          $prenom1 = htmlspecialchars($_POST['prenom1']);
          $age1= $_POST['age1'];
          $age=$_POST['age_chef'];
          $nom = preg_replace("#[./]#", "", $nom);
          $prenom = preg_replace("#[./]#", "", $prenom);
          $nom1 = preg_replace("#[./]#", "", $nom1);
          $prenom1 = preg_replace("#[./]#", "", $prenom1);
          /*echo $prenom;*/
        }
        else
        {
          $continuer=1;
          $e = 2;
        }

        for ($i = 2; $i <= 7; $i++)
        {
          $nomtemp = 'nom' . $i;
          $prenomtemp = 'prenom' . $i;
          $agetemp = 'age' . $i;

          if((!empty($_POST[$agetemp]))&&(!empty($_POST[$nomtemp]))&&(!empty($_POST[$prenomtemp])))
          {
            if(preg_match("#^(?:1[01][0-9]|120|1[5-9]|[2-9][0-9])$#", $_POST[$agetemp]))
            {
              $$nomtemp=htmlspecialchars($_POST[$nomtemp]);
              $$prenomtemp=htmlspecialchars($_POST[$prenomtemp]);
              $$agetemp=$_POST[$agetemp];
            }
            else
            {
              echo "error reg";
              $continuer=1;
              $e = 3;
            }
          }
          else
          {
            if((!empty($_POST[$agetemp]))||(!empty($_POST[$nomtemp]))||(!empty($_POST[$prenomtemp])))
            {
              echo "il manque des champs à $i";
              $continuer=1;
              $e = 4;
            }
            else
            {
              $$nomtemp=NULL;
              $$prenomtemp=NULL;
              $$agetemp=NULL;
            }
          }
        }
      }

/*================================================== TRAITEMENT BDD ==============================================================*/

      if($continuer==0) //vérif si équipe déjà existante
      {
        $query="SELECT * FROM equipe WHERE nomequipe = :name";
        //echo $query;
        $req = $bdd->prepare($query);
        $req->execute(array(
                  'name' => $name
                  ));
        $donnees = $req->fetch();
        if (!empty($donnees))
        {
          echo "equipe deja existante";
          $continuer=1;
          $e = 5;
        }
        $req->closeCursor();
      }


      if($continuer==0) //vérif si chef déjà CHEF dans une autre équipe
      {
        $query="SELECT * FROM chef WHERE nom = :nom AND prenom = :prenom AND tel = :tel";
        //echo $query;
        $req = $bdd->prepare($query);
        $req->execute(array(
                  'nom' => $nom,
                  'prenom' => $prenom,
                  'tel' => $tel
                  ));
        $donnees = $req->fetch();
        if (!empty($donnees))
        {
          echo "deja inscrit";
          $continuer=1;
          $e = 6;
        }
        $req->closeCursor();
      }

      if($continuer==0) //vérif si chef déjà MEMBRE dans une autre équipe
      {
        $query="SELECT * FROM membres WHERE nom = :nom AND prenom = :prenom AND age = :age";
        //echo $query;
        $req = $bdd->prepare($query);
        $req->execute(array(
                  'nom' => $nom,
                  'prenom' => $prenom,
                  'age' => $age
                  ));
        $donnees = $req->fetch();
        if (!empty($donnees))
        {
          echo "deja inscrit";
          $continuer=1;
          $e = 7;
        }
        $req->closeCursor();
      }

      if($continuer==0) //vérif si membres déjà MEMBRE dans une autre équipe
      {
        $query="SELECT * FROM membres WHERE nom = :nom AND prenom = :prenom AND age = :age";
        //echo $query;
        for ($i = 1; $i <= 7; $i++)
        {
          $nomtemp = 'nom' . $i;
          $prenomtemp = 'prenom' . $i;
          $agetemp = 'age' . $i;
          $req = $bdd->prepare($query);
          $req->execute(array(
                    'nom' => $$nomtemp,
                    'prenom' => $$prenomtemp,
                    'age' => $$agetemp
                    ));
          $donnees = $req->fetch();
          if (!empty($donnees))
          {
            echo "membre déjà inscrit";
            $continuer=1;
            $e = 8;
          }
          $req->closeCursor();
        }
      }

      if($continuer==0) //vérif si membres déjà CHEF dans une autre équipe
      {
        $query="SELECT * FROM chef WHERE nom = :nom AND prenom = :prenom AND age = :age";
        //echo $query;
        for ($i = 1; $i <= 7; $i++)
        {
          $nomtemp = 'nom' . $i;
          $prenomtemp = 'prenom' . $i;
          $agetemp = 'age' . $i;
          $req = $bdd->prepare($query);
          $req->execute(array(
                    'nom' => $$nomtemp,
                    'prenom' => $$prenomtemp,
                    'age' => $$agetemp
                    ));
          $donnees = $req->fetch();
          if (!empty($donnees))
          {
            echo "membre déjà inscrit";
            $continuer=1;
            $e = 9;
          }
          $req->closeCursor();
        }
      }

      if($continuer==0) //vérif voir si equipe en attente
      {
        $query="SELECT COUNT(*) AS nbequipe FROM equipe WHERE utc = :utc";
        //echo $query;
        $req = $bdd->prepare($query);
        $req->execute(array(
                  'utc' => $equipeutc
                  ));
        $donnees = $req->fetch();
        if ($donnees['nbequipe'] >= 7)
        {
          $attente = 1;
          $plus = " mais est cependant en attente, nous vous tiendrons informés si une place venait à se libérer.";
        }
        else
        {
          $attente = 0;
          $plus = " et une place vous est pour le moment réservée. Notez toutefois que si un problème devait arriver (désistement de votre équipe, non remise des documents pendant la deuxième phase), nous céderons votre place à une équipe en attente.";
        }
        $req->closeCursor();
      }

      if($continuer==0) //création équipe
      {
        $query="INSERT INTO equipe VALUES(NULL, :nomequipe , :utc, :attente, NOW())";
        //echo $query;
        $req = $bdd->prepare($query);
        $req->execute(array(
                  'nomequipe' => $name,
                  'utc' => $equipeutc,
                  'attente' => $attente
                  ));
        $req->closeCursor();
      }

      if($continuer==0) //recup idequipe
      {
        $query="SELECT idequipe FROM equipe WHERE nomequipe = :name";
        //echo $query;
        $req = $bdd->prepare($query);
        $req->execute(array(
                  'name' => $name
                  ));

        $donnees = $req->fetch();
        $idequipe = $donnees['idequipe'];
        $req->closeCursor();
      }

      if($continuer==0) //insertion chef
      {
        $query="INSERT INTO chef VALUES(NULL, :prenom , :nom, :age, :tel, :mail, :idequipe)";
        //echo $query;
        $req = $bdd->prepare($query);
        $req->execute(array(
                  'prenom' => $prenom,
                  'nom' => $nom,
                  'age' => $age,
                  'tel' => $tel,
                  'mail' => $mail,
                  'idequipe' => $idequipe
                  ));
        $req->closeCursor();
      }

      if($continuer==0) //insertion membres
      {
        $query="INSERT INTO membres VALUES(NULL, :prenom , :nom, :age, :idequipe)";
        //echo $query;
        for ($i = 1; $i <= 7; $i++)
        {
          $nomtemp = 'nom' . $i;
          $prenomtemp = 'prenom' . $i;
          $agetemp = 'age' . $i;
          if(!empty($$prenomtemp) and !empty($$nomtemp) and !empty($$agetemp))
          {
            $req = $bdd->prepare($query);
            $req->execute(array(
                      'prenom' => $$prenomtemp,
                      'nom' => $$nomtemp,
                      'age' => $$agetemp,
                      'idequipe' => $idequipe
                      ));
            $req->closeCursor();
          }
        }
      }

      if($continuer==0)
      {
        $s = "Votre équipe a bien été enregistrée";
        header("Location: inscription.php?message=$s$plus");
      }
      else
      {
        $s = "Veuillez respecter toutes les règles d'inscription pour enregister votre équipe";
        header("Location: inscription.php?erreur=$s");
      }
      ?>
      </body>
</html>

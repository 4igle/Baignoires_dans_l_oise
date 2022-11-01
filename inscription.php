<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Baignoires dans l'Oise</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/input.css">
    <link rel="stylesheet" href="css/phone.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="images/bdlogo.png">
  </head>
  <body>
    <div id="tout">
      <div id='entete'>
        <div id="div_logo_entete">
          <img id="logo_entete" src='images/bdlogo.png'>
        </div>
        <div id='liens'>
          <div class="lien">
            <a id='onglet1'href="index.php#accueil">Accueil</a>
          </div>
          <div class="lien">
            <a id='onglet2' href="index.php#programme">Programme</a>
          </div>
          <div class="lien">
            <a id='onglet3' href="index.php#aftermovie">After-Movie</a>
          </div>
          <div class="lien">
            <a id='onglet4' href="inscription.php">Inscription</a>
          </div>
        </div>
      </div>
      <div id="corps">
        <div id='bulle'>
          <div id="aureole_bulle_1">
            <div id="div_bulle1">
              <img id='bulle1' src='images/img1.jpg'/>
            </div>
          </div>
          <div id="aureole_bulle_2">
            <div id="div_bulle2">
              <img id='bulle2' src='images/img4.jpg'/>
            </div>
          </div>
          <div id="aureole_bulle_3">
            <div id="div_bulle3">
              <img id='bulle3' src='images/img7.jpg'/>
            </div>
          </div>
          <div id="aureole_bulle_4">
            <div id="div_bulle4">
              <img id='bulle4' src='images/photo1.jpg'/>
            </div>
          </div>
        </div>
        <div id="droite">
          <div id="titre_div">
            <h1 id="titre">Les Baignoires dans l'Oise</h1>
          </div>
          <div id='contenu'>
            <div id="formulaire">
              <?php
             		 if (!empty($_GET['message']) and (empty($_GET['erreur'])))
             		 { ?>
             		 <div class="message"><?php echo "<p class='message_p'>" . htmlspecialchars($_GET['message']) . '</p>' ?></div>
             		 <?php }

             		 if (!empty($_GET['erreur']) and (empty($_GET['message'])))
             		 { ?>
             		 <div class="erreur"><?php echo "<p class='erreur_p'>" . htmlspecialchars($_GET['erreur']) . '</p>' ?></div>
             		 <?php }
             ?>
              <span  class='titreonglet'>- Inscription -</span><br>
              <div id="a_lire">
                <h2 class="a_lire">À lire avant l'inscription</h2>
                <p class="a_lire">Salut à toi mon/ma matelot•e. <br><br>
                  Je te demande pas si ça va puisque dans tous les cas je n’entendrai pas ta réponse.
                  Si t’es arrivé•e ici c’est que tu es interessé•e pour participer à la prochaine édition des baignoires dans l’Oise, alors rien que pour ça je te félicite.
                  Ça nous montre que tu as très bon goût et ça pourra t’être utile pour l’événement. <br><br>
                  Même si je suppose que tu t’es renseigné.e sur la course, laisse moi te rappeler en quoi consiste l’événement : <br>
                  -Le 26 septembre toi et ton équipage allez devoir vous battre contre l’Oise et les autres participants sur près d’un kilomètre afin de remporter cette fabuleuse course.<br><br>

                  Tu te dis donc sûrement que tu vas être équipé d’un super bateau. Et bah que nenni !<br><br>

                  L’embarcation doit être fabriquée par toi et ton équipe sur la base d’une ou plusieurs baignoire/s et devra respecter une charte que l’on vous transmettra incessamment sous peu.
                  Alors si t’es motivé•e rassemble ta team (en respectant les conditions qui seront écrites un peu plus bas), fabrique ton embarcation et gagne la course des baignoires dans l’Oise.<br><br>


                  Conditions de participation: </p>
                  <ul class="liste">
                    <li>Chaque membre de l'équipe devra présenter son <span class="souligner">pass sanitaire</span> pour participer à la course.</li>
                    <li>Les teams doivent être composées de <span class="souligner">2 à 8 matelots</span>, chef compris.</li>
                    <li>Les participants doivent être âgés de plus de <span class="souligner">15 ans</span>.</li>
                    <li>Ton chef d’équipe doit être <span class="souligner">majeur</span>.</li>
                    <li>Les participants peuvent être inscrits à <span class="souligner">une seule équipe</span> au maximum.</li>
                    <li>Les participants doivent savoir nager.</li>
                    <li>Pour chacun des participants mineurs, une personne doit se porter garante dans la team.</li>
                    <li>En cas d’équipe mixte (participants UTCéens et extérieurs), le type de team est déterminé en fonction du chef d’équipe. (chef UTCéen, équipe UTCéenne).</li>
                    <li>Si l'inscription ne fonctionne pas, c'est que soit vous n'avez pas respecté une de ces règles, soit le mail / téléphone n'a pas un format valide ou soit que le nom d'équipe est déjà pris.</li>
                  </ul>
                  <p class="a_lire">

                  PS : Il y aura une deuxième phase d’inscription avec des documents à nous envoyer qui se déroulera par mail.
                  Si tu as un quelconque problème n’hésite pas à nous joindre à l’adresse suivante : <span class="souligner">baignoiresdansloise@gmail.com</span>.<br><br>

                  Je te souhaite le meilleur et hâte de te voir le 26 septembre prochain !
                  </p>
              </div>
              <form action="traitement_inscription.php" method="post" enctype="multipart/form-data"><!-- modifie pas l'enctype, y'en a besoin pour la page de traitement -->
                <div class="equipe">
                  <h2 class="equipe">Infos équipe</h2>
                </div>
                <div class="equipe_1">
                  <div class="nom_equipe">
                    <div class="form__group field">
                      <input type="text" class="form__field" placeholder=" " name="name" id='name' required maxlength="50" pattern="^[a-zA-Z0-9éêèëàâùüûçìîôòÉÊÈËÀÂÙÜÛÇÌÎÔÒ!?. +:;,'*/-]+$"/>
                      <label for="name" class="form__label">Nom de l'équipe</label>
                    </div>
                  </div>
                  <div class="equipe_utc">
                    <div class="equipe_utc_2">
                      <p class="equipe_utc_p"><label for="equipe_utc_checkbox">Équipe UTC : </label></p>
                      <label class="checkbox">
                        <input type="checkbox" name='equipeutc' value='true'id="equipe_utc_checkbox"/>
                        <svg viewBox="0 0 21 18">
                          <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                          </symbol>
                            <defs>
                              <mask id="tick">
                                <use class="tick mask" href="#tick-path" />
                              </mask>
                            </defs>
                              <use class="tick" href="#tick-path" stroke="currentColor" />
                              <path fill="white" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                        </svg>
                          <svg class="lines" viewBox="0 0 11 11">
                            <path d="M5.88086 5.89441L9.53504 4.26746" />
                            <path d="M5.5274 8.78838L9.45391 9.55161" />
                            <path d="M3.49371 4.22065L5.55387 0.79198" />
                          </svg>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="chef">
                  <h2 class="chef">Infos chef d'équipe</h2>
                </div>
                <div class="row">
                  <span>
                    <input class="basic-slide" name="prenom_chef" id="prenom_chef" type="text" placeholder="Yves" maxlength="45" required/><label for="prenom_chef">Prénom</label>
                  </span><br>
                  <span>
                    <input class="basic-slide" name="nom_chef" id="nom_chef" type="text" placeholder="Rocher" maxlength="45" required/><label for="nom_chef">Nom</label>
                  </span>
                  <span class="age_case">
                    <input class="age" name="age_chef" id="age_chef" type="number" placeholder="Âge" min="18" max="120" required/>
                  </span>
                </div>
                <div class="contact">
                    <input class="contact" name="mail" type="text" placeholder="E-mail : elon_musk@gmail.com" required pattern="^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$"/>
                    <input class="contact" name="tel" type="text" placeholder="Tel : 06 00 00 00 00" required pattern="^0[1-9]([-. ]?[0-9]{2}){4}$"/>
                </div>
                <div class="membres">
                  <h2 class="membres">Infos membres de l'équipe</h2>
                </div>
                <div class="membres_noms">
                  <div class="row">
                    <span>
                      <input class="basic-slide" name="prenom1" id="prenom1" type="text" placeholder="Yves" maxlength="45" required/><label for="prenom1">Prénom</label>
                    </span><br>
                    <span>
                      <input class="basic-slide" name="nom1" id="nom1" type="text" placeholder="Rocher" maxlength="45" required/><label for="nom1">Nom</label>
                    </span>
                    <span class="age_case">
                      <input class="age" name="age1" id="age1" type="number" placeholder="Âge" min="15" max="120" required/>
                    </span>
                  </div>
                  <div class="row">
                    <span>
                      <input class="basic-slide" name="prenom2" id="prenom2" type="text" placeholder="Yves" maxlength="45" /><label for="prenom2">Prénom</label>
                    </span><br>
                    <span>
                      <input class="basic-slide" name="nom2" id="nom2" type="text" placeholder="Rocher" maxlength="45" /><label for="nom2">Nom</label>
                    </span>
                    <span class="age_case">
                      <input class="age" name="age2" id="age2" type="number" placeholder="Âge" min="15" max="120" />
                    </span>
                  </div>
                  <div class="row">
                    <span>
                      <input class="basic-slide" name="prenom3" id="prenom3" type="text" placeholder="Yves" maxlength="45" /><label for="prenom3">Prénom</label>
                    </span><br>
                    <span>
                      <input class="basic-slide" name="nom3" id="nom3" type="text" placeholder="Rocher" maxlength="45" /><label for="nom3">Nom</label>
                    </span>
                    <span class="age_case">
                      <input class="age" name="age3" id="age3" type="number" placeholder="Âge" min="15" max="120" />
                    </span>
                  </div>
                  <div class="row">
                    <span>
                      <input class="basic-slide" name="prenom4" id="prenom4" type="text" placeholder="Yves" maxlength="45" /><label for="prenom4">Prénom</label>
                    </span><br>
                    <span>
                      <input class="basic-slide" name="nom4" id="nom4" type="text" placeholder="Rocher" maxlength="45" /><label for="nom4">Nom</label>
                    </span>
                    <span class="age_case">
                      <input class="age" name="age4" id="age4" type="number" placeholder="Âge" min="15" max="120"/>
                    </span>
                  </div>
                  <div class="row">
                    <span>
                      <input class="basic-slide" name="prenom5" id="prenom5" type="text" placeholder="Yves" maxlength="45" /><label for="prenom5">Prénom</label>
                    </span><br>
                    <span>
                      <input class="basic-slide" name="nom5" id="nom5" type="text" placeholder="Rocher" maxlength="45" /><label for="nom5">Nom</label>
                    </span>
                    <span class="age_case">
                      <input class="age" name="age5" id="age5" type="number" placeholder="Âge" min="15" max="120"/>
                    </span>
                  </div>
                  <div class="row">
                    <span>
                      <input class="basic-slide" name="prenom6" id="prenom6" type="text" placeholder="Yves" maxlength="45" /><label for="prenom6">Prénom</label>
                    </span><br>
                    <span>
                      <input class="basic-slide" name="nom6" id="nom6" type="text" placeholder="Rocher" maxlength="45" /><label for="nom6">Nom</label>
                    </span>
                    <span class="age_case">
                      <input class="age" name="age6" id="age6" type="number" placeholder="Âge" min="15" max="120" />
                    </span>
                  </div>
                  <div class="row">
                    <span>
                      <input class="basic-slide" name="prenom7" id="prenom7" type="text" placeholder="Yves" maxlength="45" /><label for="prenom7">Prénom</label>
                    </span><br>
                    <span>
                      <input class="basic-slide" name="nom7" id="nom7" type="text" placeholder="Rocher" maxlength="45" /><label for="nom7">Nom</label>
                    </span>
                    <span class="age_case">
                      <input class="age" name="age7" id="age7" type="number" placeholder="Âge" min="15" max="120" />
                    </span>
                  </div>
                </div>
                <div class="bouton">
                  <input type="submit" class="envoyer" value="Valider" name="submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="pied_de_page">
        <img class="image" id='pvdc'src='images/PVDC.jpg'>
        <img class="image" id='ssp'src='images/ssp.jpg'>
        <img class="image" id='oise'src='images/oise.jpg'>
        <img class="image" id='picsart'src='images/picsart.jpg'>
        <img class="image" id='compi'src='images/compiègne.jpg'>
        <img class="image" id='aviron' src='images/aviron.jpg'>
        <img class="image" id='dbs'src='images/dbs.jpg'>
        <img class="image" id='bde'src='images/bde.jpg'>
        <img class="image" id='utc'src='images/utc.jpg'>
      </div>
    </div>
  </body>
</html>

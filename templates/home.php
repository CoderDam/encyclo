<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        />
        <title>Encyclo</title>
        <!-- <link rel="stylesheet" href="css/reset.css"> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <header class="container">

            <!-- TITLE -->
            <h1 id="page-title">
                <span>Web'</span>
                <span>Dev'</span>
                <span>Pedia</span>
            </h1>

            <!-- SEARCH -->
            <div class="input-group search-form">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                <input type="text" class="form-control" placeholder="Concept (POO, Ajax...), outil (Git, Composer...), techno (jQuery...) etc." aria-describedby="basic-addon1">
            </div>
        </header>

        <!-- MAIN -->
        <main class="container">
            <div class="post">
                <h2 class="post-title">Programmation orientée objets</h2>
                <div class="post-core">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="post-links">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="post-tags ">
                                <a href="#">test</a>
                                <a href="#">bidule</a>
                                <a href="#">machin-chose-de-truc</a>
                            </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <h3 class="post-ext-title">Autres références</h3>
                            <ul class="post-ext-links">
                                <li><a href="#">MDN</a></li>
                                <li><a href="#">La-meilleure-page-de-dev</a></li>
                                <li><a href="#">Mon site perso</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- ADD-FORM -->
        <section id="add-block">
            <div id="add-cross"></div>
            <form id="add-form" method="POST">
                <input id="form-title" type="text" name="title" placeholder="Nouvel élément">
                <textarea id="form-core" name="definition" placeholder="Définition"></textarea>
                <input id="form-tags" type="text" name="tags" placeholder="Tags (un-et-demi,deux,trois,etc)">
                <input id="form-link1" type="text" name="link1" placeholder="Lien 1 (nom du lien,http://url.com)">
                <input id="form-link2" type="text" name="link2" placeholder="Lien 2 (nom du lien,http://url.com)">
                <input id="form-link3" type="text" name="link3" placeholder="Lien 3 (nom du lien,http://url.com)">
                <!-- BUTTON -->
                <button type="submit" name="sent" data-toggle="modal" >Ajouter l'entrée à la base</button>
                <!-- data-target="#confirm" -->
            </form>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Confirmation d'ajout</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                          <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Autorisation</label>
                            <div class="col-sm-9" control-label"">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Autorisation">
                            </div>
                          </div>
                        </form>

                        <!-- <div class="captcha">
                            <img src="inc/captcha.php" width="120" height="30" border="1" alt="CAPTCHA">
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                            <input type="text" size="6" maxlength="5" name="captcha" value="">
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alerts -->
        <div class="alert alert-danger hidden" role="alert"></div>
        <div class="alert alert-success hidden" role="alert"></div>

        <!-- SOIT en DL local -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        />
        <title>Web' Dev' Pedia - l'encyclopédie des développeurs web</title>
        <!-- <link rel="stylesheet" href="css/reset.css"> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="css/jquery-ui.min.css"> -->
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
                <input
                    type="text"
                    class="form-control search-field"
                    name="search"
                    placeholder="Concept (POO, Ajax...), outil (Git, Composer...), techno (jQuery...) etc."
                    aria-describedby="basic-addon1"
                />
            </div>
        </header>

        <!-- MAIN -->
        <main id="main" class="container">
            <?= $postDisplay ?>
        </main>

        <!-- ADD-FORM -->
        <section id="add-block">
            <div id="add-cross"></div>
            <form id="add-form" method="POST">
                <input
                    id="form-title"
                    type="text"
                    name="title"
                    placeholder="Nouvel élément"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Pensez à vérifier que l'entrée n'existe pas déjà ;)"
                />
                <textarea
                    id="form-core"
                    name="definition"
                    placeholder="Définition"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="- élément de liste **gras/* __italique/_"
                ></textarea>
                <input
                    id="form-tags"
                    type="text"
                    name="tags"
                    placeholder="Tags (un-et-demi,deux,3.9,etc)"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="sans # et sans espace"
                />
                <input id="form-link1" type="text" name="link1" placeholder="Lien 1 (nom du lien,http://url.com)">
                <input id="form-link2" type="text" name="link2" placeholder="Lien 2 (nom du lien,http://url.com)">
                <input id="form-link3" type="text" name="link3" placeholder="Lien 3 (nom du lien,http://url.com)">
                <!-- BUTTON -->
                <button type="button" name="sent" data-toggle="modal" data-target="#confirm">Ajouter l'entrée à la base</button>
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
                        <form class="form-horizontal confirm-form">
                          <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Autorisation</label>
                            <div class="col-sm-9" control-label"">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Autorisation"
                                />
                            </div>
                          </div>
                          <div class="text-right">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary">Confirmer</button>
                          </div>
                        </form>

                        <!-- <div class="captcha">
                            <img src="inc/captcha.php" width="120" height="30" border="1" alt="CAPTCHA">
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                            <input type="text" size="6" maxlength="5" name="captcha" value="">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Alerts -->
        <div class="alert alert-danger hidden" role="alert"></div>
        <div class="alert alert-info hidden" role="alert"></div>

        <!-- Loading -->
        <div class="loading hidden">
          <div class="cog">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <!-- <script src="js/jquery-ui.min.js"></script> -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>

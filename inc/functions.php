<?php
require_once('inc/config.php');
require_once('inc/data.php');

function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

function sendServerError($message) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die($message);
}

function noPost() {
    return "
    <section class='no-post'>
        <p>Aucune entrée correspondante...</p>
        <p class='sad-smiley'>T_T</p>
    </section>
    ";
}

function getPostHTML($post) {
    $tagsHTML = "";
    if (isset($post['tags'])) {
        foreach($post['tags'] as $tag) {
            $tagsHTML .= "<a href='#' class='tag'>".$tag['name']."</a> ";
        }
    }

    $linksHTML = "";
    if (isset($post['links'])) {
        foreach($post['links'] as $link) {
            $linksHTML .= "<li><a href='".$link['url']."'>".$link['name']."</a></li>";
        }
    }

    return
        "
        <section class='post'>
            <div class='row'>
                <div class='col-xs-10'>
                    <h2 class='post-title'>".$post['post']['title']."</h2>
                </div>
                <div class='col-xs-2 text-right'>
                    <h2>
                        <input type='hidden' value='".$post['post']['id']."'/>
                        <button type='button' class='btn btn-primary edit-post'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                    </h2>
                </div>
            </div>
            <div class='post-core'>
                <p>".$post['post']['core']."</p>
            </div>
            <div class='post-links'>
                <div class='row'>
                    <div class='col-sm-6'>
                        <h3 class='post-tags'>".$tagsHTML."
                        </h3>
                    </div>
                    <div class='col-sm-6 text-right'>
                        <h3 class='post-ext-title'>Autres références</h3>
                        <ul class='post-ext-links'>".$linksHTML."
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <hr />
        ";
}

?>

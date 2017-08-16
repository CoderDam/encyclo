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

function formatTags($tagsString) {
    $tagsString = str_replace('#',',',$tagsString);
    $tags = explode(',',$tagsString);
    foreach ($tags as $tag) {
        if (trim($tag) != '') {
            $fixedTags[] = trim($tag);
        }
    }

    return $fixedTags;
}

function formatDate($date) {
    $objectDate = new DateTime($date);
    return $formatedDate = [
        'date' => date_format($objectDate, 'd/m/Y'),
        'hour' => date_format($objectDate, 'H:i')
    ];
}

function pre($title,$html) {
    echo $title . "<pre>";
    print_r($html);
    echo "</pre>";
}

function formatCore($core) {
    $core = '<p>' . $core . '</p>';

    // 1. remplacer tous les '\n-' par '</li><li>'
    $core = str_replace("\n-","</li><li>",$core);

    // 2. remplacer tous les '\n' par '</p><p>'
    $core = str_replace("\n","</p><p>",$core);

    // 3. remplacer '</li>' de '<p>blafdjhkhdl</li>' par '</p><ul>'
    $pattern1 = '/<p>.[^<*.>]*<\/li>/';
    preg_match($pattern1,$core,$matches1);
    if (isset($matches1[0])) {
        $step3 = $matches1[0];
        $step3 = str_replace("</li>","</p><ul>",$step3);
        $core = preg_replace($pattern1,$step3,$core);
    }


    // 4. remplacer '</p>' de '<li>dmfjhg</p>'  par '</li></ul>'
    $pattern2 = '/<li>.[^<*.>]*<\/p>/';
    preg_match($pattern2,$core,$matches2);
    if (isset($matches2[0])) {
        $step4 = $matches2[0];
        $step4 = str_replace("</p>","</li></ul>",$step4);
        $core = preg_replace($pattern2,$step4,$core);
    }

    // 5. insérer les strong et em
    $beforeReplace = [
        "bold-on" => "**",
        "bold-off" => "/*",
        "italic-on" => "__",
        "italic-off" => "/_",
    ];
    $afterReplace = [
        "bold-on" => "<strong>",
        "bold-off" => "</strong>",
        "italic-on" => "<em>",
        "italic-off" => "</em>",
    ];

    return str_replace($beforeReplace,$afterReplace,$core);
}

function getPostHTML($post) {
    $date = formatDate($post['post']['date']);

    $core = formatCore($post['post']['core']);

    $tagsHTML = "";
    if (isset($post['tags'])) {
        foreach($post['tags'] as $tag) {
            $tagsHTML .= "<a href='#' class='tag'>".$tag['name']."</a> ";
        }
    }

    $linksHTML = "";
    if (isset($post['links']) && !empty($post['links'])) {
        $linksLiHTML = "";
        foreach($post['links'] as $link) {
            $linksLiHTML .= "<li><a href='".$link['url']."'>".$link['name']."</a></li>";
        }
        $linksHTML = "
        <div class='col-sm-6 text-right'>
            <h3 class='post-ext-title'>Liens/références</h3>
            <ul class='post-ext-links'>".$linksLiHTML."
            </ul>
        </div>
        ";
    }

    return
        "
        <section class='post'>
            <div class='row'>
                <div class='col-xs-10'>
                    <h2 class='post-title'><span>".$post['post']['title']."</span> <small><em>ajouté le ".$date['date']." à ".$date['hour']."</em></small></h2>
                </div>
                <div class='col-xs-2 text-right'>
                    <h2>
                        <input type='hidden' value='".$post['post']['id']."'/>
                        <button
                            type='button'
                            class='btn btn-primary edit-post'
                            data-toggle='tooltip'
                            data-placement='top'
                            title='bientôt dispo'
                        >
                            <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                        </button>
                    </h2>
                </div>
            </div>
            <div class='post-core'>".$core."
            </div>
            <div class='post-links'>
                <div class='row'>
                    <div class='col-sm-6'>
                        <h3 class='post-tags'>".$tagsHTML."
                        </h3>
                    </div>"
                    .$linksHTML."
                </div>
            </div>
        </section>
        <hr />
        ";
}

function passwordIsValid($password) {
    return trim($password) == 'oBB-2017';
}

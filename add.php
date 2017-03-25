<?php
require_once('inc/functions.php');

if (!isAjax()) {
    sendServerError("Rien à faire ici");
}

$errors = [];

if (isset($_POST)) {
    // vérif & nettoyage titre
    if (empty($_POST['title'])) {
        $errors[] = 'Titre nécessaire !';
    }
    else {
        $title = filter_var(trim($_POST['title']),FILTER_SANITIZE_STRING);
    }

    // vérif & nettoyage définition
    if (empty($_POST['core'])) {
        $errors[] = 'Définition nécessaire !';
    }
    else {
        $core = filter_var(trim($_POST['core']),FILTER_SANITIZE_STRING);
    }

    // vérif & nettoyage tags
    if (!empty($_POST['tags'])) {
        $tags = explode(',',$_POST['tags']);
        foreach ($tags as $key => $tag) {
            if (trim($tag) != '') {
                $tags[$key] = str_replace('_','-',str_replace(' ','-',filter_var(trim($tag),FILTER_SANITIZE_STRING)));
            }
            else {
                $errors[] = 'Tag(s) invalide(s)';
                break;
            }
        }
    }
    else {
        $tags[] = '--';
    }

    // vérif & nettoyage liens
    // 1
    if (!empty($_POST['link1'])) {
        $link1 = explode(',',$_POST['link1'],2);
        if (trim($link1[0] != '')) {
            $link1[0] = filter_var(trim($link1[0]),FILTER_SANITIZE_STRING);
        }
        else {
            $errors[] = 'Titre du lien 1 invalide';
        }
        if (filter_var(trim($link1[1]),FILTER_VALIDATE_URL)) {
            $link1[1] = filter_var(trim($link1[1]),FILTER_VALIDATE_URL);
        }
        else {
            $errors[] = 'URL du lien 1 invalide';
        }
        $links[] = $link1;
    }
    // 2
    if (!empty($_POST['link2'])) {
        $link2 = explode(',',$_POST['link2'],2);
        if (trim($link2[0] != '')) {
            $link2[0] = filter_var(trim($link2[0]),FILTER_SANITIZE_STRING);
        }
        else {
            $errors[] = 'Titre du lien 2 invalide';
        }
        if (filter_var(trim($link2[1]),FILTER_VALIDATE_URL)) {
            $link2[1] = filter_var(trim($link2[1]),FILTER_SANITIZE_URL);
        }
        else {
            $errors[] = 'URL du lien 2 invalide';
        }
        $links[] = $link2;
    }
    // 3
    if (!empty($_POST['link3'])) {
        $link3 = explode(',',$_POST['link3'],2);
        if (trim($link3[0] != '')) {
            $link3[0] = filter_var(trim($link3[0]),FILTER_SANITIZE_STRING);
        }
        else {
            $errors[] = 'Titre du lien 3 invalide';
        }
        if (filter_var(trim($link3[1]),FILTER_VALIDATE_URL)) {
            $link3[1] = filter_var(trim($link3[1]),FILTER_VALIDATE_URL);
        }
        else {
            $errors[] = 'URL du lien 3 invalide';
        }
        $links[] = $link3;
    }

    if (empty($links)) {
        $links[] = '--';
    }
}

if (!$errors) {
    $postData = [
        "title" => $title,
        "core" => $core,
        "tags" => $tags,
        "links" => $links,
    ];
    if ($res = !addNew($postData)) {
        sendServerError('Problème dans l\'envoi à la base de données');
    }
    else {
        echo $res;
    }
}
else {
    sendServerError(implode('<br />',$errors));
}

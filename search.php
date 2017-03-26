<?php
require_once('inc/functions.php');

if (!isAjax()) {
    sendServerError("Rien à faire ici");
}

if (!empty($_GET['search'])) {
    $search = filter_var(trim($_GET['search']),FILTER_SANITIZE_STRING);

    $posts = getPostsFromTitle($search);

    if ($posts) {
        foreach ($posts as $post) {
            echo getPostHTML($post);
        }
    }
    else {
        echo noPost();
    }
}
else {
    $posts = getAllPosts();
    if (!empty($posts)) {
        foreach ($posts as $post) {
            echo getPostHTML($post);
        }
    }
    else {
        echo noPost();
    }
}

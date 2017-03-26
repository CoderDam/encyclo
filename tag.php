<?php
require_once('inc/functions.php');

if (!isAjax()) {
    sendServerError("Rien à faire ici");
}

if (isset($_GET['tag'])) {
    $tag = trim($_GET['tag']);

    $posts = getPostsFromTag($tag);

    foreach ($posts as $post) {
        echo getPostHTML($post);
    }
}
else {
    echo noPost();
}

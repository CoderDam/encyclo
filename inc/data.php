<?php
function getAllPosts() {
    global $dbConnect;

    $sql = "SELECT * from posts";
    $query = $dbConnect->query($sql);
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

function addNew($postData) {
    global $dbConnect;

    $res = newPost($postData['title'],$postData['core']);
    $postId = $dbConnect->lastInsertId();

    if ($postData['tags'][0] != '--') {
        foreach ($postData['tags'] as $tag) {
            $tagId = newTag($tag);
            associateTag($tagId,$postId);
        }
    }
    // if ($postData['links'][0] != '--') {
    //     foreach ($postData['links'] as $link) {
    //         newTag($link,$postId);
    //     }
    // }

    return $res;
}

function newPost($title,$core) {
    global $dbConnect;

    $sql = "INSERT into posts (title,core) VALUES (:title,:core)";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':title',$title);
    $query->bindValue(':core',$core);
    $res = $query->execute();

    return $res;
}

function newTag($tag) {
    global $dbConnect;

    $sql = "SELECT id FROM tags where name LIKE :tag";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':tag',$tag);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_ASSOC);

    if (!$res) {
        $sql = "INSERT into tags (name) VALUES (:tag)";
        $query = $dbConnect->prepare($sql);
        $query->bindValue(':tag',$tag);
        $query->execute();
        $tagId = $dbConnect->lastInsertId();
    }
    else {
        $tagId = $res['id'];
    }

    return $tagId;
}

function associateTag($tagId,$postId) {
    global $dbConnect;

    $sql = "INSERT into post_tag (tag_id, post_id) VALUES (:tagId, :postId)";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':tagId',$tagId);
    $query->bindValue(':postId',$postId);
    $query->execute();
}

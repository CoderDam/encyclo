<?php
function getAllPosts() {
    global $dbConnect;

    $sql = "SELECT * from posts";
    $query = $dbConnect->query($sql);
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

function addPost($postData) {
    global $dbConnect;

    $sql = "INSERT into posts (title,core) VALUES (:title,:core)";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':title',$postData['title']);
    $query->bindValue(':core',$postData['core']);
    $res = $query->exec();

    return $res;
}

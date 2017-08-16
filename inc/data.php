<?php
/****************************/
/*          SELECT          */
/****************************/
function getAllPosts() {
    global $dbConnect;

    $sql = "SELECT id
            from posts
            order by date desc";
    $query = $dbConnect->query($sql);

    $posts = [];
    while ($postsId = $query->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = getPostFromId($postsId['id']);
    }

    return $posts;
}

function getLastPost() {
    global $dbConnect;

    $sql = "SELECT *
            from posts
            order by date desc
            limit 1";
    $query = $dbConnect->query($sql);
    $resPost = $query->fetch(PDO::FETCH_ASSOC);

    $resTags = getTagsOfPost($resPost['id']);

    $resLinks = getLinksOfPost($resPost['id']);

    return $res = [
        'post' => $resPost,
        'tags' => $resTags,
        'links' => $resLinks,
    ];
}

function getPostsFromTag($tag) {
    global $dbConnect;

    $tagId = getTagId($tag);

    $sql = "SELECT post_id
            from post_tag
            where tag_id = ".$tagId['id'] ."
            order by post_id desc";
    $query = $dbConnect->query($sql);

    $posts = [];
    while($postsId = $query->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = getPostFromId($postsId['post_id']);
    }

    return $posts;
}

function getPostFromId($id) {
    global $dbConnect;

    $sql = "SELECT *
            from posts
            where id = :id
            order by date desc";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $resPost = $query->fetch(PDO::FETCH_ASSOC);

    $resTags = getTagsOfPost($resPost['id']);

    $resLinks = getLinksOfPost($resPost['id']);

    return $res = [
        'post' => $resPost,
        'tags' => $resTags,
        'links' => $resLinks,
    ];
}

function getPostsFromTitle($search) {
    global $dbConnect;

    $sql = "SELECT id
            from posts
            where title like :search
            order by date desc";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':search','%'.$search.'%');
    $query->execute();

    $posts = [];
    while ($postsId = $query->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = getPostFromId($postsId['id']);
    }

    return $posts;
}

function getTagsOfPost($postId) {
    global $dbConnect;

    $sql = "SELECT tags.*
            from tags, post_tag
            where post_tag.post_id = :postId
            and post_tag.tag_id = tags.id
	    order by tags.name asc";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':postId',$postId,PDO::PARAM_INT);
    $query->execute();
    $resTags = $query->fetchAll(PDO::FETCH_ASSOC);

    return $resTags;
}

function getLinksOfPost($postId) {
    global $dbConnect;

    $sql = "SELECT *
            from links
            where post_id = " . $postId;
    $query = $dbConnect->query($sql);
    $resLinks = $query->fetchAll(PDO::FETCH_ASSOC);

    return $resLinks;
}

function getTagId($tag) {
    global $dbConnect;

    $sql = "SELECT tags.id
            from tags
            where tags.name like :tag";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':tag',$tag);
    $query->execute();
    $tagId = $query->fetch(PDO::FETCH_ASSOC);

    return $tagId;
}

/****************************/
/*          INSERT          */
/****************************/
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
    if ($postData['links'][0] != '--') {
        foreach ($postData['links'] as $link) {
            newLink($link,$postId);
        }
    }

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

    $res = getTagId($tag);

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
    $query->bindValue(':postId',$postId,PDO::PARAM_INT);
    $query->execute();
}

function newLink($link,$postId) {
    global $dbConnect;

    $sql = "INSERT into links (name,url,post_id) VALUES (:name,:url,:post_id)";
    $query = $dbConnect->prepare($sql);
    $query->bindValue(':name',$link[0]);
    $query->bindValue(':url',$link[1]);
    $query->bindValue(':post_id',$postId,PDO::PARAM_INT);
    $res = $query->execute();

    return $res;
}

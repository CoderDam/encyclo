<?php
require_once('inc/functions.php');

$lastPost = getLastPost();
// echo "<pre>";
// print_r($lastPost);
// echo "</pre>";

$postDisplay = getPostHTML($lastPost);

// templates
include("templates/home.php");

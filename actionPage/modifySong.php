<?php

require '../vendor/autoload.php';
include '../header.php';
include '../model/Getter.php';
if (isset($_POST['artist'],
    $_POST['title'],
    $_POST['time'],
    $_POST['published_at'])  && isset($_GET['id'])) {


    $song = new Getter;
    $song ->modifySong(
        $_POST['artist'],
        $_POST['title'],
        $_POST['time'],
        $_POST['published_at'],
        $_GET['id']
    );

}


header('location:../listSong.php');
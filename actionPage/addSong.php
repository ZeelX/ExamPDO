<?php
include '../model/Getter.php';


if (isset($_POST['artist'],
    $_POST['title'],
    $_POST['time'],
    $_POST['published_at'])) {



    $newSong = new Getter;
    if(isset($_GET['id'])){
        $newSong->addSong(
            intval($_GET['id']),
            $_POST['title'],
            intval($_POST['time']),
            $_POST['published_at']);

    }else {
        $newSong->addSong(
            intval($_POST['artist']),
            $_POST['title'],
            intval($_POST['time']),
            $_POST['published_at']);
    }
}



header('location:../listSong.php');
<?php

require '../vendor/autoload.php';
include '../header.php';
include '../model/Getter.php';
if ( isset($_POST['name'],$_POST['age']) && isset($_GET['id'])) {



    $movie = new Getter;
    $movie->modifyArtist(
        $_POST['name'],
        $_POST['age'],
        $_GET['id']
    );

}




header('location:../index.php');
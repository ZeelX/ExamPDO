<?php

include 'header.php';
include 'model/Getter.php';
require 'vendor/autoload.php';


if (isset($_GET['id'])) {
    $rows = new Getter();
    $result = $rows->getOneartist($_GET['id']);
    ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $result['name'] ?></h3>
                    <p class="card-text"> Age: <?php echo $result['age'] ?> </p></div>
                <ul class="list-group list-group-flush">
                    <?php
                    $resultSong = $rows->getSongOfArtist($_GET['id']);
                    if (!empty ($resultSong)) {
                        foreach ($resultSong as $song) {
                            ?>
                            <li class="list-group-item  d-flex flex-column justify-content-center align-items-center ">
                                <h5><?php echo $song['title'] ?></h5>
                                <p>durée: <?php echo $song['time'] ?>s ,<br>
                                    date de sorti: <?php echo $song['published_at'] ?></p>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#myDeleteModal<?php echo $song['id'] ?>">
                                    Delete
                                </button>
                                <!--                            //////////////////////////////  MODAL \\\\\\\\\\\\\\\\\\\\\-->
                                <div class="modal" id="myDeleteModal<?php echo $song['id'] ?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="fw-bold modal-title">Are you sure you want to delete this
                                                    movie from
                                                    database ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you really want to delete this song ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Let
                                                    met
                                                    think about it again
                                                </button>
                                                <a class="text-light btn btn-success mx-1"
                                                   href="actionPage/deleteSong.php?id=<?php echo $song['id'] ?>">I'm
                                                    sure,
                                                    let's
                                                    do it !</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    } elseif (empty($resultSong)) {
                        ?>
                        <li class="list-group-item  d-flex flex-column justify-content-center align-items-center ">
                            <p> Cet artiste n'as aucun son dans notre base de donnée, <br>
                                souhaitez-vous en
                                <a style="color:blue; text-underline: blue" data-bs-toggle="modal"
                                   data-bs-target="#formModalAddsong">
                                    ajouter une
                                </a> ? </p>
                            <div class="modal" id="formModalAddsong">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div style="border-radius: 20px!important;" class="modal-content">
                                        <form class="d-flex flex-column align-items-center bg-dark p-5 myShadow"
                                              style="border-radius: 20px; color:white"
                                              action="actionPage/addSong.php?id=<?php echo $_GET['id'] ?>"
                                              method="post">
                                            <?php include 'formulaireSong.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
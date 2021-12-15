<?php

require 'vendor/autoload.php';
include 'header.php';
include 'model/Getter.php';


if (isset($_POST['search'])) {
    $rows = new Getter();
    $result = $rows->getSearchedSong($_POST['search']);

} else {
    $rows = new Getter();
    $result = $rows->getAllSong();
}


?>

<div class="container">
    <div class="d-flex justify-content-center align-items-center mt-5">
           <h3>Liste des Musiques</h3>
    </div>

            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                    Add a Song !
                </button>

                <div class="me-auto">
                    <form class="d-flex flex-row" action="" method="post">
                        <label for="search"></label>
                    <input id="search" name="search" placeholder="Search ... ">
                        <button class="btn btn-light" type="submit"> <i class="fas fa-search"></i> </button>
                    </form>
                </div>

            </div>

            <div class="modal" id="formModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div style="border-radius: 20px!important;" class="modal-content">
                        <form class="d-flex flex-column align-items-center bg-dark p-5 myShadow"
                              style="border-radius: 20px; color:white"
                              action="actionPage/addSong.php" method="post">
                            <?php include 'formulaireSong.php'; ?>
                    </div>
                </div>
            </div>

            <table class="table table-striped border table-hover p-5 myShadow">
                <thead class="p-4">
                <tr>
                    <th> Name</th>
                    <th> Duration (seconde)</th>
                    <th> Artist</th>
                    <th> ____</th>
                </tr>
                </thead>
                <tbody class="p-4">



                <?php foreach ($result as $song) { ?>
                    <tr class="tableLine">
                        <td> <?php echo $song['title'] ?></td>
                        <td> <?php echo $song['time'] ?></td>
                        <td> <?php echo $song['name'] ?></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#myDeleteModal<?php echo $song['id'] ?>">
                                Delete
                            </button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#ModifyModal<?php echo $song['id'] ?>">
                                Modify
                            </button>
                            <!--                            ///////////////////////////////////  modal delete  ///////////////////////////////////-->
                            <div class="modal" id="myDeleteModal<?php echo $song['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="fw-bold modal-title">Are you sure you want to delete this movie
                                                from
                                                database ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you really want to delete this movie ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Let met
                                                think about it again
                                            </button>
                                            <a class="text-light btn btn-success mx-1"
                                               href="actionPage/deleteSong.php?id=<?php echo $song['id'] ?>">I'm sure,
                                                let's
                                                do it !</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                            ///////////////////////////////modal modify/////////////////////////////-->
                            <div class="modal" id="ModifyModal<?php echo $song['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form class="d-flex flex-column align-items-center bg-dark p-5 myShadow"
                                              style="border-radius: 20px; color:white"
                                              action="actionPage/modifyMovie.php?id=<?php echo $song['id'] ?>"
                                              method="post">

                                            <?php include 'formulaireSong.php'; ?>
                                    </div>
                                </div>
                            </div>
                            <!--                            //////////////////////////////////////////////////////////////////////-->
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table
</div>
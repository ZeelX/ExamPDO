<?php

require 'vendor/autoload.php';
include 'header.php';
include 'model/Getter.php';


$rows = new Getter();
$result = $rows->getAllArtist();
?>
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h3> Liste des Artistes !</h3>
        <div class="mt-5">
            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                    Add Artist
                </button>
            </div>
            <div class="modal" id="formModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div style="border-radius: 20px!important;" class="modal-content">
                        <form class="d-flex flex-column align-items-center bg-dark p-5 myShadow"
                              style="border-radius: 20px; color:white"
                              action="actionPage/addArtist.php" method="post">
                            <?php include 'formulaire.php'; ?>
                    </div>
                </div>
            </div>
            <table class="table table-striped border table-hover p-5 myShadow">
                <thead class="p-4">
                <tr>
                    <th> Name</th>
                    <th> ____ </th>
                </tr>
                </thead>
                <tbody class="p-4">
                <?php foreach ($result as $artist) { ?>
                    <tr class="tableLine">
                        <td> <span style="font-size: 20px"><?php echo $artist['name'] ?></span></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#myDeleteModal<?php echo $artist['id'] ?>">
                                Delete
                            </button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#ModifyModal<?php echo $artist['id'] ?>">
                                Modify
                            </button>
                            <a class="btn btn-info" href="artistDetail.php?id=<?php echo $artist['id'] ?>">
                                See Details
                            </a>
                            <!--                            ///////////////////////////////////  modal delete  ///////////////////////////////////-->
                            <div class="modal" id="myDeleteModal<?php echo $artist['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="fw-bold modal-title">Are you sure you want to delete this movie from
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
                                               href="actionPage/deleteArtist.php?id=<?php echo $artist['id'] ?>">I'm sure,
                                                let's
                                                do it !</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                            ///////////////////////////////modal modify/////////////////////////////-->
                            <div class="modal" id="ModifyModal<?php echo $artist['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form class="d-flex flex-column align-items-center bg-dark p-5 myShadow"
                                              style="border-radius: 20px; color:white"
                                              action="actionPage/modifyArtist.php?id=<?php echo $artist['id'] ?>" method="post">
                                            <?php include 'formulaire.php'; ?>
                                    </div>
                                </div>
                            </div>
                            <!--                            //////////////////////////////////////////////////////////////////////-->
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</div>

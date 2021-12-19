<?php
require_once dirname(__DIR__)."/header.php";
?>
<div id="admin-photos" class="admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-title">Les photos</div>
            <div class="col-12">
                <section>
                    <div class="mb-2 d-flex align-items-center justify-content-between">
                        <button class="btn btn-success btn-sm" id="add-photo" onclick="openModal_adminphotos()">Ajouter</button>
                        <input class="form-control form-control-sm" type="text" placeholder="Default input" style="width:200px;">
                    </div>
                    <div id="allphoto" class="mt-3 row">
                        <?php foreach($args["allphoto"] as $photo){ ?>
                            <div class="col-6 col-md-4 col-lg-2 mb-4">
                                <div class="border">
                                    <div class="photo_wrap">
                                        <img src="../public/photos/<?= $photo["name"] ?>" alt="<?= $photo['origin'] ?>" onclick="showPhoto('../public/photos/<?= $photo['name'] ?>',1)">
                                    </div>
                                    <div class="onephoto border-top">
                                        <div data-toggle="tooltip" data-placement="bottom" title="<?= $photo['origin'] ?>">
                                            <?= $photo['origin'] ?>
                                        </div>
                                        <div onclick="deletePhoto(<?= $photo['id'] ?>,event)">
                                            <i class="bi bi-trash-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
                
                <section class="mt-5">
                    <form id="form">
                        
                    </form>
                </section>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="d-none" id="btn-modal-adminphotos" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width:95vw !important;max-width:95vw !important;">
            <div class="modal-content" style="width:95vw !important;max-width:95vw !important;height:95vh;min-height:95vh;overflow:auto">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Ajouter des photos</h5>
                    <button type="button" class="close" id="close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="files" ondragenter="dragenter(event)" ondragleave="dragleave(event)" ondragover="dragover(event)" ondrop="drop(event)">Sélectionner</label>
                        <input type="file" class="d-none" id="files" name="files" onchange="choosePhotos(event.target.files)"  multiple>
                    </div>
                    <div class="mt-2">
                        <button tyoe="button" class="btn btn-primary" onclick="uploadPhotos()">Enregistrer</button>
                    </div>
                    <div id="chosen-photos" class="mt-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
<div>

<?php
require_once dirname(__DIR__)."/footer.php";
?>

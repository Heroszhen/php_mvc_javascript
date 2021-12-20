<?php
require_once dirname(__DIR__)."/header.php";
?>
<div id="admin-articles" class="admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-title">Les articles</div>
            <div class="col-12">
                <section>
                    <div class="mb-2 d-flex align-items-center justify-content-between">
                        <a href="/admin/editer_un_article" class="btn btn-success btn-sm" >Ajouter</a>
                        <div>ddd</div>
                    </div>
                    <div id="allphoto" class="mt-3 row">
                        <!-- <?php foreach($args["allphoto"] as $photo){ ?>
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
                        <?php } ?> -->
                    </div>
                </section>
            </div>
        </div>
    </div>

<div>

<?php
require_once dirname(__DIR__)."/footer.php";
?>

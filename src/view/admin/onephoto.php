<div class="col-6 col-md-4 col-lg-2 mb-4">
    <div class="border">
        <div class="photo_wrap">
            <img src="../public/photos/<?= $args["photo"]["name"] ?>" alt="<?= $args["photo"]['origin'] ?>" onclick="showPhoto('../public/photos/<?= $args['photo']['name'] ?>',1)">
        </div>
        <div class="onephoto border-top">
            <div data-toggle="tooltip" data-placement="bottom" title="<?= $args['photo']['origin'] ?>">
                <?= $args['photo']['origin'] ?>
            </div>
            <div onclick="deletePhoto(<?= $args['photo']['id'] ?>,event)">
                <i class="bi bi-trash-fill"></i>
            </div>
        </div>
    </div>
</div>
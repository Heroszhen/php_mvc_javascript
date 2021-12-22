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
                        <div>filtres</div>
                    </div>
                    <div class="mt-3">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Créé(e)</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($args["allarticle"] as $key=>$one){ ?>
                                    <tr>
                                        <td data-label="Id"><?= $one["id"] ?></td>
                                        <td data-label="Nom"><?= $one["title"] ?></td>
                                        <td data-label="Category"><?= $one["category"] ?></td>
                                        <td data-label="Créé(e)">
                                            <?php
                                                $date = new \DateTime($one["created"]);
                                                echo $date->format('d/m/Y');
                                            ?>
                                        </td>
                                        <td data-label="Actions">
                                            <a class="btn btn-info btn-sm mr-2 modifycategory" href="/admin/editer_un_article/<?= $one['id'] ?>">Modifier</a>
                                            <!-- <button class="btn btn-danger btn-sm"  data-id="<?= $one['id'] ?>"  onclick="deleteCategory(event,<?= $one['id'] ?>)">Supprimer</button> -->
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

<div>

<?php
require_once dirname(__DIR__)."/footer.php";
?>

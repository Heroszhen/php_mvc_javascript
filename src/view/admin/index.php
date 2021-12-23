<?php
require_once dirname(__DIR__)."/header.php";
?>

<div id="admin-index" class="admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-title">Les catégories</div>
            <div class="col-12">
                <section>
                    <div class="mb-2 d-flex align-items-center justify-content-between">
                        <button class="btn btn-success btn-sm" id="add-category">Ajouter</button>
                        <input class="form-control form-control-sm" type="text" placeholder="Default input" style="width:200px;" onkeyup="findCategory(event.target.value)">
                    </div>
                     <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">
                                    <div class="fullwith d-flex align-items-center">
                                        <div class="mr-2">Id</div>
                                        <div class="mr-2 arrow pointer"><i class="bi bi-arrow-up" onclick="sortAllCategorie('id',1)"></i></div>
                                        <div class="arrow pointer"><i class="bi bi-arrow-down" onclick="sortAllCategorie('id',2)"></i></div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="fullwith d-flex align-items-center">
                                        <div class="mr-2">Nom</div>
                                        <div class="mr-2 arrow pointer"><i class="bi bi-arrow-up" onclick="sortAllCategorie('name',1)"></i></div>
                                        <div class="arrow pointer"><i class="bi bi-arrow-down" onclick="sortAllCategorie('name',2)"></i></div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="fullwith d-flex align-items-center">
                                        <div class="mr-2">Crée(e)</div>
                                        <div class="mr-2 arrow pointer"><i class="bi bi-arrow-up" onclick="sortAllCategorie('created',1)"></i></div>
                                        <div class="arrow pointer"><i class="bi bi-arrow-down" onclick="sortAllCategorie('created',2)"></i></div>
                                    </div>
                                </th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($args["allcategory"] as $key=>$one){ ?>
                                <tr>
                                    <td data-label="Id"><?= $one["id"] ?></td>
                                    <td data-label="Nom"><?= $one["name"] ?></td>
                                    <td data-label="Créé(e)">
                                        <?php
                                            $date = new \DateTime($one["created"]);
                                            echo $date->format('d/m/Y');
                                        ?>
                                    </td>
                                    <td data-label="Actions">
                                        <button class="btn btn-info btn-sm mr-2 modifycategory" data-id="<?= $one['id'] ?>">Modifier</button>
                                        <button class="btn btn-danger btn-sm"  data-id="<?= $one['id'] ?>"  onclick="deleteCategory(event,<?= $one['id'] ?>)">Supprimer</button>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="d-none" id="btn-modal" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Modal title</h5>
            <button type="button" class="close" id="close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-add-category">
                <div class="form-group d-none">
                    <input type="text" class="form-control" name="category_id" id="category_id">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="nom">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
<div>

<?php
require_once dirname(__DIR__)."/footer.php";
?>

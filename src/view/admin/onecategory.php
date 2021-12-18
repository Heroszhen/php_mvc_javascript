<tr>
    <td data-label="Id"><?= $args["one"]["id"] ?></td>
    <td data-label="Nom"><?= $args["one"]["name"] ?></td>
    <td data-label="Créé(e)">
        <?php
            $date = new \DateTime($args["one"]["created"]);
            echo $date->format('d/m/Y');
        ?>
    </td>
    <td data-label="Actions">
        <button class="btn btn-info btn-sm mr-2 modifycategory" data-id="<?= $args["one"]['id'] ?>">Modifier</button>
        <button class="btn btn-danger btn-sm"  data-id="<?= $args["one"]['id'] ?>" onclick="deleteCategory(event,<?= $args['one']['id'] ?>)">Supprimer</button>
    </td>
</tr>
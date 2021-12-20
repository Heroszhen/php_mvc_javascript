<?php
require_once dirname(__DIR__)."/header.php";
?>
<div id="admin-articles" class="admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-title">
                Editer un article
                <?php
                    if($args["id"] != null)echo " : N° ".$args["id"];
                ?>
            </div>
            <div class="col-12">
                <section>
                    <form method="POST" action="/admin/editer_un_article<?php if($args["id"] != null)echo "/".$args["id"]; ?>">
                        <div class="fifty">
                            <div class="form-group mb-4">
                                <label for="article_title">Titre</label>
                                <input type="text" class="form-control" id="article_title" name="article_title" value="<?= $args['table']['title'] ?>" required="required">
                            </div>
                            <div class="form-group mb-4">
                                <label for="article_category_id">Catégory</label>
                                <select class="custom-select" name="article_category_id" id="article_category_id"  required="required">
                                    <option value=""></option>
                                    <?php 
                                        foreach($args["allcategory"] as $one){
                                            $option = "<option value='".$one["id"]."'";
                                            if($one["id"] == $args["table"]["category_id"])$option .= " selected='selected'";
                                            $option .= ">".$one["name"]."</option>";
                                            echo $option;
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="article_text">Contenu</label><?= $args['table']['text'] ?>
                            <textarea class="form-control ckeditor" id="article_text" name="article_text" rows="3"  value="<?= $args['table']['text'] ?>" required="required"></textarea>
                        </div>
                        <div>
                        </dvi>
                        <div class="mt-2 text-center">
                            <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                        </div> 
                    </form>
                </section>
            </div>
        </div>
    </div>
<div>

<?php
require_once dirname(__DIR__)."/footer.php";
?>

<script>
</script>
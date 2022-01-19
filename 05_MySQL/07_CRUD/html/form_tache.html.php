<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
        form {
            border: 1px solid #EFEFEF;
            width: 50vw;
            margin: 20vh auto;
            box-shadow: 0 0 15px 2px #CCC;
        }

        form div {
            margin: 2rem
        }
        </style>
    </head>
    <body>
        <form class="form" action="<?php echo $processor ?>" method="post">
            <?php if (isset($tache['id'])) { ?>
                <input type="hidden" name="id" value="<?php echo $tache['id'] ?>">
            <?php } ?>
            <div class="">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" value="<?php echo isset($tache['titre']) ? $tache['titre'] : "" ?>" />
            </div>
            <div class="">
                <label for="description">Description</label>
                <textarea name="description" id="description"><?php echo isset($tache['description']) ? $tache['description'] : "" ?></textarea>
            </div>
            <div class="">
                <label for="categorie">Catégorie</label>
                <select class="" name="categorie" id="categorie">
                    <option value="personnel">Personnel</option>
                    <option value="professionnel">Professionnel</option>
                    <option value="famille">Familial</option>
                    <option value="administratif">Administratif</option>
                </select>
            </div>
            <div class="">
                <label for="urgent-vrai">Urgent</label>
                <input type="radio" name="urgent[]" id="urgent-vrai" value="1" <?php echo (isset($tache['urgent']) && $tache['urgent'] == 1) ? "checked": "" ?> />
                <label for="urgent-faux">Non urgent</label>
                <input type="radio" name="urgent[]" id="urgent-faux" value="0" <?php echo (isset($tache['urgent']) && $tache['urgent'] == 0) ? "checked": "" ?> />
            </div>
            <div class="">
                <select class="" name="responsable">
                    <?php foreach ($personnes as $p) { ?>
                        <option value="<? echo $p['id'] ?>"<?php echo (isset($tache['responsable']) && $tache['responsable'] == $p['id']) ? "selected": "" ?>><?php echo $p['prenom']." ".$p['nom'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <input type="submit" name="enregistrer" value="Entregistrer" />
            </div>
        </form>
    </body>
</html>

<?php

    require '../FonctionPHP/connBDD.php';

    var_dump($_FILES);

    if(!empty($_FILES)) {
        $file_name = $_FILES['fichier']['name'];
        $file_extension = strrchr($file_name,'.');

        $file_temp_name = $_FILES['fichier']['tmp_name'];
        $file_dest = '../Images/'.$file_name;

        $extension_autorisees = array('.png', '.PNG','.jpg', '.JPG');

        if(in_array($file_extension, $extension_autorisees)){
            if(move_uploaded_file($file_temp_name,$file_dest)){
                $requete = $db->prepare('INSERT INTO :p_table.:p_column ');
                echo 'Fichier envoyé avec succès';
            } else {
                echo "Une erreur est survenue lors de l'envoi du fichier";
            }
        } else {
            echo 'Seuls les fichiers images (.jpg et .png) sont autorisés';
        }
    }
?>
<html>
    <body>
        <div class="MenuBarre">
            <form method="post" action="Image.php" enctype="multipart/form-data">
                <p>Déposer une image</p>
                <input type="file" accept="image/png, image/jpg" name="fichier">
                <button type="submit">Déposer</button>
            </form>
        </div>
    </body>
</html>

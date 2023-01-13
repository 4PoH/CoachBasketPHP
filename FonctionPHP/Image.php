<?php

    $reussite = 0;

    if(!empty($_FILES)) {
        $file_name = $_FILES['fichier']['name'];
        $file_extension = strrchr($file_name,'.');

        $file_temp_name = $_FILES['fichier']['tmp_name'];
        $file_dest = '../Images/'.$file_name;

        $extension_autorisees = array('.png', '.PNG','.jpg', '.JPG');

        if((in_array($file_extension, $extension_autorisees)) and (strlen($file_temp_name) < 150) ){
            if(move_uploaded_file($file_temp_name,$file_dest)){
                echo 'Fichier envoyé avec succès';
                $reussite = 1;
            } else {
                echo "Une erreur est survenue lors de l'envoi du fichier";
            }
        } else {
            echo 'Seuls les fichiers images (.jpg et .png) sont autorisés';
        }
    }
?>

<p>Déposer une image (.png / .jpg): </p>
<input type="file" accept="image/png, image/jpg" name="fichier">

    <?php
    for ($i = 0, $l = sizeof($donneeJSON); $l > $i; $i++){ //Mise en forme en fichier JSON afin de f�liciter la r�cup�ration des donn�es
        if($i == 0)
            echo "{</br>".$donneeJSON[0].",</br>";
        elseif($i == $l)
            echo $donneeJSON[$l].'}';
        else
            echo $donneeJSON[$i].",</br>";
    }


    <?php
    echo '<ul id="listeJSON">';
    for ($i = 0, $l = sizeof($donneeJSON); $l > $i; $i++){
            echo '<li>'.$donneeJSON[$i].'</li>';
    }
    echo '</ul>';


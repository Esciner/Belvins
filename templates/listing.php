<h1>Listing</h1>
<ul>
    <?php
    for ($i = 0, $l = sizeof($donneeJSON); $l > $i; $i++){
        echo '<li>';
        print_r($donneeJSON[$i]);
        echo '</li>';
    }
    ?>
</ul>
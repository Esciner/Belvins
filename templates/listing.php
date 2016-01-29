<?php
/*
    echo '<ul id="listeJSON">';
    for ($i = 0, $l = sizeof($donneeJSON); $l > $i; $i++){
            echo '<li>'.$donneeJSON[$i].'</li>';
    }
    echo '</ul>';
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Belvins- JSON BD</title>
</head>
<body>
</body>
<script scr="../js/jquery-1.12.0.js"></script>
<script> // 2ème essai = récup bd dans une var js
    $(function(){
        var json = [
            <?php
            for ($i = 0, $l = sizeof($donneeJSON); $l > $i; $i++){
                if($i != ($l-1))
                    echo $donneeJSON[$i].",";
                else
                    echo $donneeJSON[$i];
            }
            ?>
        ];
        $("body").html(json);
    });


</script>
</html>

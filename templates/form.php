<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Belvin</title>
    <style>
        label, img, textarea {
            display: block;
        }

        input,button, label, img {
            margin: 5px;
        }
        div {
            float: left;
        }

    </style>
</head>
<body>
<div>
    <form id="frmSearchVin">
        <input type="search" id="searchVin" name="searchVin" />
        <button type="button" id="btSearch" name="btSearch" value="Search">Search</button>
    </form>
    <ul id="listeVin">
        <li>Vin 1</li>
        <li>Vin 2</li>
        <li>Vin 3</li>
    </ul>
</div>
<div>
    <!--<form action="<?= $app->urlFor('ajoutWines');  ?>" id="formVin" method="post">--> <!--TODO url PUT-->
        <form action="#" id="formVin"> <!--En attendant URL post fait -->
        <input type="reset" id="btReset" name="btReset" value="New">
        <label for="nameVin">Name:</label>
        <input type="text" id="nameVin" name="name" maxlength="50"/>
        <label for="grapesVin">Grapes:</label>
        <input type="text" id="grapesVin" name="grapes" maxlength="50"/>
        <label for="countryVin">Country:</label>
        <input type="text" id="countryVin" name="country" maxlength="50"/>
        <label for="regionVin">Region:</label>
        <input type="text" id="regionVin" name="region" maxlength="50"/>
        <label for="yearVin">Year:</label>
        <input type="number" id="yearVin" name="year" min="1900" max="2100"/>
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="10" cols="25" maxlength="500"></textarea>
        <button type="submit" id="btSubmit" name="btSubmit">Save</button>
        <button type="button" id="btDelete" name="btDelete">Delete</button>
    </form>
</div>
<script src="../js/jquery-1.12.0.js"></script>
<script>

    $(document).ready(function() {
        //Ajax
        $.ajax("./listing.php",{// Lancement d'Ajax en reliant la source du fichier des données
            success: function(response){
                $("#listeVin").html(response).show();
            }
        });
    });
</script>
</body>
</html>
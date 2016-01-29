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

        ul {
            list-style-type: none;
        }
        li {
            margin: 5px 0;
        }

        body {
            font-family: sans-serif;
        }

        .highlight {
            background-color: #800020;
            color: white;
        }

        #imgVin {
            visibility: hidden;
        }
    </style>
    <script>
        var json;
        json = [{
            "id": "1",
            "name": "CHATEAU DE SAINT COSME",
            "year": "2009",
            "grapes": "Grenache \/ Syrah",
            "country": "France",
            "region": "Southern Rhone \/ Gigondas",
            "description": "The aromas of fruit and spice give one a hint of the light drinkability of this lovely wine, which makes an excellent complement to fish dishes.",
            "picture": "saint_cosme.jpg"
        }, {
            "id": "2",
            "name": "LAN RIOJA CRIANZA",
            "year": "2006",
            "grapes": "Tempranillo",
            "country": "Spain",
            "region": "Rioja",
            "description": "A resurgence of interest in boutique vineyards has opened the door for this excellent foray into the dessert wine market. Light and bouncy, with a hint of black truffle, this wine will not fail to tickle the taste buds.",
            "picture": "lan_rioja.jpg"
        }, {
            "id": "3",
            "name": "MARGERUM SYBARITE",
            "year": "2010",
            "grapes": "Sauvignon Blanc",
            "country": "USA",
            "region": "California Central Cosat",
            "description": "The cache of a fine Cabernet in ones wine cellar can now be replaced with a childishly playful wine bubbling over with tempting tastes of\nblack cherry and licorice. This is a taste sure to transport you back in time.",
            "picture": "margerum.jpg"
        }, {
            "id": "4",
            "name": "OWEN ROE \"EX UMBRIS\"",
            "year": "2009",
            "grapes": "Syrah",
            "country": "USA",
            "region": "Washington",
            "description": "A one-two punch of black pepper and jalapeno will send your senses reeling, as the orange essence snaps you back to reality. Don't miss\nthis award-winning taste sensation.",
            "picture": "ex_umbris.jpg"
        }, {
            "id": "5",
            "name": "REX HILL",
            "year": "2009",
            "grapes": "Pinot Noir",
            "country": "USA",
            "region": "Oregon",
            "description": "One cannot doubt that this will be the wine served at the Hollywood award shows, because it has undeniable star power. Be the first to catch\nthe debut that everyone will be talking about tomorrow.",
            "picture": "rex_hill.jpg"
        }, {
            "id": "6",
            "name": "VITICCIO CLASSICO RISERVA",
            "year": "2007",
            "grapes": "Sangiovese Merlot",
            "country": "Italy",
            "region": "Tuscany",
            "description": "Though soft and rounded in texture, the body of this wine is full and rich and oh-so-appealing. This delivery is even more impressive when one takes note of the tender tannins that leave the taste buds wholly satisfied.",
            "picture": "viticcio.jpg"
        }, {
            "id": "7",
            "name": "CHATEAU LE DOYENNE",
            "year": "2005",
            "grapes": "Merlot",
            "country": "France",
            "region": "Bordeaux",
            "description": "Though dense and chewy, this wine does not overpower with its finely balanced depth and structure. It is a truly luxurious experience for the\nsenses.",
            "picture": "le_doyenne.jpg"
        }, {
            "id": "8",
            "name": "DOMAINE DU BOUSCAT",
            "year": "2009",
            "grapes": "Merlot",
            "country": "France",
            "region": "Bordeaux",
            "description": "The light golden color of this wine belies the bright flavor it holds. A true summer wine, it begs for a picnic lunch in a sun-soaked vineyard.",
            "picture": "bouscat.jpg"
        }, {
            "id": "9",
            "name": "BLOCK NINE",
            "year": "2009",
            "grapes": "Pinot Noir",
            "country": "USA",
            "region": "California",
            "description": "With hints of ginger and spice, this wine makes an excellent complement to light appetizer and dessert fare for a holiday gathering.",
            "picture": "block_nine.jpg"
        }, {
            "id": "10",
            "name": "DOMAINE SERENE",
            "year": "2007",
            "grapes": "Pinot Noir",
            "country": "USA",
            "region": "Oregon",
            "description": "Though subtle in its complexities, this wine is sure to please a wide range of enthusiasts. Notes of pomegranate will delight as the nutty finish completes the picture of a fine sipping experience.",
            "picture": "domaine_serene.jpg"
        }, {
            "id": "11",
            "name": "BODEGA LURTON",
            "year": "2011",
            "grapes": "Pinot Gris",
            "country": "Argentina",
            "region": "Mendoza",
            "description": "Solid notes of black currant blended with a light citrus make this wine an easy pour for varied palates.",
            "picture": "bodega_lurton.jpg"
        }, {
            "id": "12",
            "name": "LES MORIZOTTES",
            "year": "2009",
            "grapes": "Chardonnay",
            "country": "France",
            "region": "Burgundy",
            "description": "Breaking the mold of the classics, this offering will surprise and undoubtedly get tongues wagging with the hints of coffee and tobacco in\nperfect alignment with more traditional notes. Breaking the mold of the classics, this offering will surprise and\nundoubtedly get tongues wagging with the hints of coffee and tobacco in\nperfect alignment with more traditional notes. Sure to please the late-night crowd with the slight jolt of adrenaline it brings.",
            "picture": "morizottes.jpg"
        }];
    </script>
</head>
<body>
<div>
    <form id="frmSearchVin">
        <input type="search" id="searchVin" name="searchVin" />
        <button type="button" id="btSearch" name="btSearch" value="Search">Search</button>
    </form>
    <ul id="listeVin">
    </ul>
</div>
<div>
    <form action="<?= $app->urlFor('ajoutWines'); ?>" id="formVin" method="post">
        <input type="reset" id="btReset" name="btReset" value="New">
        <label for="idVin">Id:</label>
        <input type="text" id="idVin" name="name" maxlength="50" readonly/>
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
        <img src="#" alt=#" id="imgVin"/>
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="10" cols="25" maxlength="500"></textarea>
        <button type="submit" id="btSubmit" name="btSubmit">Save</button>
        <button type="button" id="btDelete" name="btDelete">Delete</button>
    </form>
</div>
<script src="../js/jquery-1.12.0.js"></script>
<script>

    $(document).ready(function() {
        //Ajax TODO: trouver un moyen d'utiliser $JSON.parse()
        $.ajax("./listing.php",{// Lancement d'Ajax en reliant la source du fichier des données TODO: changer URL
            success: function(response){
                console.log(response); // Récupération de toute la BD
            }
        });

        //console.log(json[0].name);//récupération bd dans var ok

        for (var i in json) {
            $("#listeVin").append("<li>" + json[i].name + "</li>");
        }
        $("li").on('mouseover', function () {
            $(this).addClass('highlight');
        });
        $("li").on('mouseout', function () {
            $(this).removeClass('highlight');
        });
        $("li").on('click', function () {
            //$(this).addClass('highlight');
            var id = $(this).attr("id");
            //console.log(id);
            var traversing = $(this).closest("body");
            traversing.find('#idVin').val(id);
            traversing.find('#nameVin').val(json[id].name);
            traversing.find('#grapesVin').val(json[id].grapes);
            traversing.find('#countryVin').val(json[id].country);
            traversing.find('#regionVin').val(json[id].region);
            traversing.find('#yearVin').val(json[id].year);
            traversing.find('#description').val(json[id].description);
            traversing.find('#imgVin').attr("src", json[id].picture);
            traversing.find('#imgVin').attr("alt", json[id].name);
            traversing.find('#imgVin').css("visibility", "visible");
        });
        //JQUERYUI: Autocomplete
        var autocompleteVins = [];
        for (var i in json)
            autocompleteVins += json[i].name;

        $(function () {
            autocompleteVins
        });
        $("#searchVin").autocomplete({source: autocompleteVins});
        //Empêcher les envois des formulaires
        $("form").on("submit", function (event) {
            event.preventDefault();
        })
    });
</script>
</body>
</html>
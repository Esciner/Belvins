<?php

//AutoLoader
require '../vendor/autoload.php';

\Slim\Slim::registerAutoloader();
require '../vendor/twig/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();


//Acces DB
$user = 'root';
$pass = 'root';
$dbname = 'BelVins';
$db = new PDO('mysql:host=localhost;dbname=' . $dbname, $user, $pass);

/*
$app = new Slim\Slim([
        'templates.path' => '../templates'
        ]);
*/

//Twig
// Create app
$app = new \Slim\Slim([
        'view' => new \Slim\Views\Twig(),
        'templates.path' => '../templates'
        ]);

$app->get('/', function () use ($app) {
    $pageTitle = 'hello world';
    $body = 'sup world';

    $app->view()->setData(array('title' => $pageTitle, 'body' => $body));
    $app->render('index.html');
});

//Routing

$app->get('/contact/:name',  function($name) use ($app){
    $app->render('contact.php', compact('name'));
    
})->name('contact');

//Page de formulaire d'ajout

$app->get('/form',  function() use ($app){
    $app->render('form.php', compact('app'));
    
})->name('formAjoutVins');

//Chercher tout les vins

$app->get('/api/wine',  function() use ($app, $db){
    $sql = "SELECT * FROM wine";
    $donneeJSON = array();
    foreach($db->query($sql) as $row)
    {   
        //$donneeJSON[] = json_encode($row);
        $donneeJSON[] = $row;
    }
    //$app->render('listing.php', compact('donneeJSON'));
    $app->render('listing.html', compact('donneeJSON'));
})->name('getWines');

//Chercher vin par id

$app->get('/api/wine/:id',  function($id) use ($app, $db){
    $sql = "SELECT * FROM wine WHERE id = $id";
    $donneeJSON = array();
    foreach($db->query($sql) as $row)
    {   
        $donneeJSON[] = json_encode($row);
    }
    $app->render('listing.php', compact('donneeJSON'));
})->name('getWinesById')->conditions(['id' => '[0-9]+']);

//Chercher vin par nom

$app->get('/api/wine/search/:name',  function($name) use ($app, $db){
    $name = '%'.$name.'%';
    $sql = "SELECT * FROM wine WHERE name LIKE '$name'";
    $donneeJSON = array();
    foreach($db->query($sql) as $row)
    {   
        $donneeJSON[] = json_encode($row);
    }
    $app->render('listing.php', compact('donneeJSON'));
})->name('getWinesByName');

//Rajouter un vins

$app->post('/api/wine',  function() use ($app, $db){
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $name = '';
    }
    if(!empty($_POST['year'])){
        $year = $_POST['year'];
    }else{
        $year = '';
    }
    if(!empty($_POST['grapes'])){
        $grapes = $_POST['grapes'];
    }else{
        $grapes = '';
    }
    if(!empty($_POST['country'])){
        $country = $_POST['country'];
    }else{
        $country = '';
    }
    if(!empty($_POST['region'])){
        $region = $_POST['region'];
    }else{
        $region = '';
    }
    if(isset($_FILES['description'])){
        //echo $_FILES['description'];
        $description = fopen($_FILES['description']['tmp_name'], 'rb');
    }else{
        $description = $_FILES['description']['tmp_name'];
    }
    if(!empty($_FILES['picture'])){
        $resultat = move_uploaded_file($_FILES['picture']['tmp_name'],'../pictures/' . $_FILES['picture']['name']);
        if ($resultat) echo "Transfert réussi";
        $picture = $_FILES['picture']['name'];
    }else{
        $picture = '';
    }
    
    $stmt = $db->prepare("INSERT INTO wine (name, year, grapes, country, region, description, picture) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $year);
    $stmt->bindParam(3, $grapes);
    $stmt->bindParam(4, $country);
    $stmt->bindParam(5, $region);
    $stmt->bindParam(6, $description, PDO::PARAM_LOB);
    $stmt->bindParam(7, $picture);
    $stmt->execute();
    //echo 'Ajout reussi';
    //echo $description .'<br/>';
    //echo $picture .'<br/>';
    //print_r($_FILES);
    //print_r($_POST);
})->name('ajoutWines');

//Page de formulaire de suppression

$app->get('/formDelete',  function() use ($app){
    $app->render('delete.php', compact('app'));
    
})->name('formDeSuppressionDeVin');

//Page de formulaire de modif

$app->get('/formModif',  function() use ($app){
    $app->render('modif.php', compact('app'));
    
})->name('formDeModifDeVin');

//Supprimer un vin avec l'id

$app->delete('/api/wine/:id', function ($id) use ($app, $db){
    $sql = "DELETE FROM wine WHERE id = $id";
    $db->exec($sql);
    echo "Record deleted successfully";
    
})->name('deleteWinesById')->conditions(['id' => '[0-9]+']);

//Modifier un vins

$app->put('/api/wine/:id',  function($id) use ($app, $db){
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $name = '';
    }
    if(!empty($_POST['year'])){
        $year = $_POST['year'];
    }else{
        $year = '';
    }
    if(!empty($_POST['grapes'])){
        $grapes = $_POST['grapes'];
    }else{
        $grapes = '';
    }
    if(!empty($_POST['country'])){
        $country = $_POST['country'];
    }else{
        $country = '';
    }
    if(!empty($_POST['region'])){
        $region = $_POST['region'];
    }else{
        $region = '';
    }
    if(isset($_FILES['description'])){
        //echo $_FILES['description'];
        $description = fopen($_FILES['description']['tmp_name'], 'rb');
    }else{
        $description = $_FILES['description']['tmp_name'];
    }
    if(!empty($_FILES['picture'])){
        $resultat = move_uploaded_file($_FILES['picture']['tmp_name'],'../pictures/' . $_FILES['picture']['name']);
        if ($resultat) echo "Transfert réussi";
        $picture = $_FILES['picture']['name'];
    }else{
        $picture = '';
    }
    
    $stmt = $db->prepare("UPDATE wine SET name=?, year=?, grapes=?, country=?, region=?, description=?, picture=? where id=$id");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $year);
    $stmt->bindParam(3, $grapes);
    $stmt->bindParam(4, $country);
    $stmt->bindParam(5, $region);
    $stmt->bindParam(6, $description, PDO::PARAM_LOB);
    $stmt->bindParam(7, $picture);
    $stmt->execute();
    //echo 'Ajout reussi';
    //echo $description .'<br/>';
    //echo $picture .'<br/>';
    //print_r($_FILES);
    //print_r($_POST);
})->name('modifWines');

//Rendu

$app->run();
//$app->render('index.html');
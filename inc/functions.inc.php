<?php
session_start();

// 3- les constantes

define("RACINE_SITE", "http://localhost/ImmobiliFrourati/");


//---------------- fonction alert ----------------
function alert(string $contenu, string $class = "warning"): string // type prend une classe bootstrap
{
    return "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">
                $contenu
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
}


//---------------- fonction debug ----------------

function debug($bug)
{
    echo "<pre class=\"alert alert-info\">";
    var_dump($bug);
    echo "</pre>";
}


// ---------------------------------------------------------------------------
//----------------------- Création de la table advert ----------------------


function createTableAdvert(): void
{

    $cnx = connexionBdd();

    $sql =  "CREATE TABLE IF NOT EXISTS advert(
                id_advert INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                photo VARCHAR(255) NOT NULL,
                title VARCHAR(50) NOT NULL,
                description TEXT NULL,
                postal_code INT(5) NOT NULL,
                city VARCHAR(50) NOT NULL,
                type ENUM('location', 'vente'),
                price INT(11) NOT NULL,
                reservation_message TEXT NULL
            )";
    $request = $cnx->exec($sql);
};

createTableAdvert();


function showAnnonceViaId(int $id): mixed
{

    $cnx = connexionBdd();
    $sql = "SELECT * FROM advert WHERE id_advert = :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));
    $result = $request->fetch();
    return $result;
}


//---------- verification de l'annonce ----------

function checkAdvert(string $title): mixed
{

    $cnx = connexionBdd();
    $sql = "SELECT * FROM advert WHERE title = :title ";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ':title' => $title,

    ));
    $result = $request->fetch();

    return $result;
}

//----------- Ajout de l'annonce -----------
function insertAdvert(string $photo, string $title, string $description, int $postal_code, string $city, string $type, int $price): void
{
    $cnx = connexionBdd();
    $data = [
        'photo' => $photo,
        'title' => $title,
        'description' => $description,
        'postal_code' => $postal_code,
        'city' => $city,
        'type' => $type,
        'price' => $price,

    ];
    //echapper les données et les traiter contre les failles JS (XSS) 
    foreach ($data as $key => $value) {

        $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    $sql = "INSERT INTO advert (photo, title, description, postal_code, city, type, price) VALUES (:photo, :title, :description, :postal_code, :city, :type, :price)";

    // requête d'insertion que je stock dans une variable
    $request = $cnx->prepare($sql); // je prépare ma fonction et je l'exécute
    $request->execute($data);
    $result = $request;

    if ($result->rowCount() == 0) {
        alert("Erreur d'insertion", "danger");
    }
}


// ------------------------ Afficher les annonces ------------------------

function showAllAdvert(): mixed
{
    $cnx = connexionBdd();
    $sql = "SELECT * FROM advert";
    $request = $cnx->query($sql);
    $result = $request->fetchAll();
    return $result;
}
//-------- show 15 dernier annonces -------
function showLimitedAdverts(): mixed
{
    $cnx = connexionBdd();
    $sql = "SELECT * FROM advert ORDER BY id_advert DESC LIMIT 15";
    $request = $cnx->query($sql);
    $result = $request->fetchAll();
    return $result;
}



//------------------------ show annonce ------------------

function showAdvertViaId(int $id): mixed
{
    $cnx = connexionBdd();
    $sql = "SELECT * FROM advert WHERE id_advert = :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));
    $result = $request->fetch();
    return $result;
}


//--------------- message de reseration ---------------
function updateReservationMessage(int $id, string $message): bool
{
    if (empty(trim($message))) {
        return false;
    }
    $cnx = connexionBdd();


    $sql = "UPDATE advert SET reservation_message = :message WHERE id_advert = :id";
    $request = $cnx->prepare($sql);
    $request->bindValue(':message', $message, PDO::PARAM_STR);
    $request->bindValue(':id', $id, PDO::PARAM_INT);
    return $request->execute();
}

<?php
require_once "inc/init.inc.php"; // Inclusion du fichier d'initialisation
require_once "inc/functions.inc.php";
$info = "";



// ---------------------------Validation du formulaire d'insertion d'une annonce ---------------------------

if (!empty($_POST))
// On vérifie si le tableau $_POST n'est pas vide
{
    // On vérifie si un champ est vide 
    $verif = true;
    foreach ($_POST as $key => $value) { // une boucle pour vérifier si un champ est vide 

        if (empty(trim($value))) {

            $verif = false;
        }
    }

    if ($verif === false) {
        $info .= alert("Veuillez renseigner tout les champs", "danger");
    } else {

        //vérification de la photo

        if (!empty($_FILES['photo']['name'])) {  // $_FILES['photo']['name'] contient le nom original du fichier téléchargé.

            // Définit la variable $photo avec le nom du fichier téléchargé.
            // Cela crée le chemin relatif vers l'image qui sera utilisé pour stocker l'image et peut être utilisé dans les balises <img>.
            $photo =  $_FILES['photo']['name'];
            $extensionPhoto = array(
                'application/pdf',
                'image/jpeg',
                'image/jpg',
                'image/gif',
                'image/png'
            );

            copy($_FILES['photo']['tmp_name'], 'assets/images/' . $photo); // $_FILES['image']['tmp_name'] contient le chemin temporaire où le fichier est stocké après le téléchargement.
        }


        if ($verif === false || empty($photo)) { // si la variable $verif passe en false ou la variable $image est vide 

            $info .= alert("Veuillez insérer une photo", "danger"); // j'affiche un message d'erreur
            // la superglobale $_FILES a un indice "photo" qui correspond au "name" de l'input type="file" du formulaire, ainsi qu'un indice "name" qui contient le nom du fichier en cours de téléchargement.

            // Vérifie si le champ 'photo' du tableau $_FILES n'est pas vide, ce qui signifie qu'un fichier est en cours de téléchargement.
        } else {
            if ($_FILES['photo']['error'] != 0 ||  $_FILES['photo']['size'] == 0 || $_FILES['photo']['size'] > 2097152 || !isset($_FILES['photo']['type'])) {

                $info .= alert("La photo n'est pas valide", "danger");
            }
            if ((!in_array($_FILES['photo']['type'], $extensionPhoto)) && (!empty($_FILES["photo"]["type"]))) {
                $info .= alert("Le format de la photo n'est pas valide", "danger");
            }

            // vérification du titre
            if (!isset($_POST['title']) || strlen(trim($_POST['title'])) < 4) {

                $info .= alert("Le champ titre n'est pas valide, il doit avoir une longueur minimale de 5 caractères", "danger");
            }
            //verification description

            if (!isset($_POST['description'])) {

                $info .= alert("Veuillez laisser une description", "danger");
            }

            //verif code postale
            if (!isset($_POST['postal_code']) || !preg_match('/^[0-9]{5}$/', $_POST['postal_code'])) {

                $info .= alert("Le code postal n'est pas valide", "danger");
            }

            //verif ville
            if (!isset($_POST['city']) ||  strlen(trim($_POST['city'])) < 4 || strlen(trim($_POST['city'])) > 50 || preg_match('/[0-9]/', $_POST['city'])) {

                $info .= alert("La ville n'est pas valide", "danger");
            }

            //verif type
            if (!isset($_POST['type']) || !in_array($_POST['type'], ['location', 'vente'])) {

                $info .= alert("Veuillez insérer le type de l'annonce", "danger");
            }
            //verif prix
            if (!isset($_POST['price']) || !is_numeric($_POST['price'])) {

                $info .= alert("Le prix n'est pas valide", "danger");
            }
        }

        if (empty($info)) {
            // je stocke mes données 
            $title = htmlspecialchars(trim($_POST["title"]));
            $description = htmlspecialchars(trim($_POST["description"]));
            $postal_code = htmlspecialchars(trim($_POST["postal_code"]));
            $city = htmlspecialchars(trim($_POST["city"]));
            $type = htmlspecialchars(trim($_POST["type"]));
            $price = htmlspecialchars(trim($_POST["price"]));
            // $reservation_message = htmlspecialchars(trim($_POST["reservation_message"]));

            if (checkAdvert($title)) {
                $info .= alert("L'annonce existe déjà", "danger");
            } else {
                // j'insère dans la bdd
                insertAdvert($photo, $title, $description, $postal_code, $city, $type, $price);
                debug($_POSt);
                $info .= alert("L'annonce est insérée avec succès, <p>Consulter <a href='mesAnnonces.php'>mes annonces</a></p>", "success");
                // je redirige vers la page mes annonces
                header("Refresh: 2; url=mesAnnonces.php");
            }
        }
    }
}




require_once "inc/header.inc.php"; // Inclusion du header

?>
<?php
echo $info;
?>
<section class="container mx-center">
    <h1 class="display-4 fs-2 text-center m-5">Formulaire d'insertion d'une annonce</h1>
    <form action="" method="post" class="container w-75 bg-success-subtle rounded-3 p-5" enctype="multipart/form-data">
        <!-- image $_FILES -->
        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="photo">Photo</label>
                <br>
                <input type="file" name="photo" id="photo" required>
            </div>
        </div>
        <!-- titre -->
        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="title">Titre de l'annonce</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Appartement de 3 chambres" required>
            </div>
        </div>
        <!-- description -->
        <div class="row">
            <div class="col-12 mb-5">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="4" placeholder="Description de l'annonce"></textarea>
            </div>
        </div>
        <div class="row mb-5">
            <!-- code postal -->

            <div class="col-md-5">
                <label for="postal_code" class="form-label mb-3">Code postale</label>
                <input type="text" class="form-control " id="postal_code" name="postal_code" placeholder="75000">
            </div>


            <!-- Ville -->

            <div class="col-md-5">
                <label for="city" class="form-label mb-3">Ville</label>
                <input type="text" class="form-control " id="city" name="city" placeholder="Paris" required>
            </div>

        </div>
        <div class="row mb-5">
            <!-- type -->
            <div class="col-md-6 mb-5">
                <label class="form-label">Type</label>
                <select class="form-select" name="type">
                <option value="">Choisir le type</option>
                    <option value="location">Location</option>
                    <option value="vente">Vente</option>
                </select>
            </div>
            <!-- prix -->

            <div class="col-md-6 mb-5">
                <label for="price">Prix</label>
                <div class=" input-group">
                    <input type="text" class="form-control" id="price" name="price" aria-label="Euros amount (with dot and two decimal places)" value="" required>
                    <!--  $film['price'] ?? ''  -->
                    <span class="input-group-text">€</span>
                </div>
            </div>

        </div>
        <!-- Bouton  -->
        <div class="row justify-content-center m-5">
            <button type="submit" class=" btn btn-success rounded-5 p-3 fs-5">Ajouter l'annonce</button>
        </div>
    </form>
</section>








<?php
require_once "inc/footer.inc.php";

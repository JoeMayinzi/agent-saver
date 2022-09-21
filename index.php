<?php
session_start();

require "connexion.php";
/** Les variables contenant les infos entrées par l'utilisateur en POST */
@$photo = $_POST['photo'];
@$nom = $_POST['nom'];
@$postnom = $_POST['postnom'];
@$prenom = $_POST['prenom'];
@$sexe = $_POST['sexe'];
@$lieu = $_POST['lieu'];
//$date_de_naissance = $_POST['date'];
@$adresse = $_POST['residence'];
@$poste = $_POST['poste'];
@$email = $_POST['email'];
@$phone = $_POST['tel'];

/** Verifie si le boutton est cliqué */
if (isset($_POST['button'])) {
    if (
        /** Vérifie si les champs sont envoyés et qu'ils ne sont pas vides */
        isset($photo, $nom, $postnom, $prenom, $sexe, $lieu, /*$date_de_naissance,*/ $adresse, $poste, $email, $phone) && !empty($photo
            && !empty($nom)) && !empty($postnom) && !empty($prenom) && !empty($sexe) && !empty($lieu) && /*!empty($date_de_naissance)
        &&*/ !empty($adresse) && !empty($poste) && !empty($email) && !empty($phone)
    ) {
        /** Variable de session content les erreurs émises par l'utilisateur */
        $_SESSION['error'] = [];

        /** Vérifie que l'email entré est invalide */
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            /** Push la variable de session en cas d'erreur d'email */
            $_SESSION['error'][] = "Adresse email invalide";
        }

        /** Requete SQL pour interroger la base de données sur la colone email */
        $select = "SELECT * FROM `agents` WHERE `email` = '$email'";
        $query = $pdo->query($select);
        $agent = $query->fetch(PDO::FETCH_ASSOC);

        /** Si l'email existe dèja dans la BDD on push la variable de session error */
        if ($agent) {
            $_SESSION['error'][] = "Cet agent a dèja été enregistré";
        }

        /** Vérifie si la variable de session est vide on insere les données entrées  à l'aide de 
         * la requete INSERT */
        if ($_SESSION['error'] === []) {
            $insert = "INSERT INTO `agents`(`Photo`, `Nom`, `Postnom`, `Prenom`, `Sexe`, `Lieu`, /*`Naissance`,*/ `Adresse`,
            `Poste`, `Email`, `Telephone`) VALUES(:Photo, :Nom, :Postnom, :Prenom, :Sexe, :Lieu, /*`:Naissance`,*/ :Adresse, 
            :Poste, :Email, :Telephone)";

            $prepare = $pdo->prepare($insert);

            $execute = $prepare->execute(array(
                ":Photo" => $photo, ":Nom" => $nom, ":Postnom" => $postnom, ":Prenom" => $prenom,
                ":Sexe" => $sexe, ":Lieu" => $lieu, /*":Naissance" => $date_de_naissance,*/ ":Adresse" => $adresse, ":Poste" => $poste, ":Email" => $email, ":Telephone" => $phone
            ));

            /** la session agent pour stocker les infos de l'agent exploitable sur tout le site */

            $_SESSION['agent'] = [
                "photo" => $photo,
                "nom" => $nom,
                "postnom" => $postnom,
                "prenom" => $prenom,
                "sexe" => $sexe,
                "lieu" => $lieu,
                "adresse" => $adresse,
                "poste" => $poste,
                "email" => $email,
                "telephone" => $phone,
            ];

            header("location: successSave.php");
        }
    } else {
        /** Si au moins un champs est vide on push la variable d'erreur */
        $_SESSION['error'] = ["Veillez remplir tous les champs Svp !"];
        //die("au moins un champ est vide ou pas envoyé");

    }
}

?>
<?php require "header.php" ?>

<div class="container">
    <form method="POST" class="mb-5">
        <legend class="text-center">Enregistrement</legend>
        <?php
        if (isset($_SESSION['error'])) {
            foreach ($_SESSION['error'] as $error) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
        <?php
            }
            unset($_SESSION['error']);
        }
        ?>
        <div class="mb-3">
            <label for="formFile" class="form-label">Photo</label>
            <input class="form-control" type="file" id="formFile" name="photo">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="mb-3">
            <label for="postnom" class="form-label">Post-nom</label>
            <input type="text" class="form-control" id="postnom" name="postnom">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>
        <label class="mb-3">Sexe</label>
        <select class="mb-3 form-select" aria-label="Default select example" name="sexe">
            <option selected value="M">M</option>
            <option value="F">F</option>
        </select>
        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu de Naissance</label>
            <input type="text" class="form-control" id="lieu" name="lieu">
        </div>
        <!-- 
        <div class="mb-3">
            <label for="birthday" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" id="birthday" name="date">
        </div>
        -->
        <div class="mb-3">
            <label for="adresse" class="form-label">Residence</label>
            <input type="text" class="form-control" id="adresse" name="residence">
        </div>
        <div class="mb-3">
            <label for="post" class="form-label">Poste</label>
            <input type="text" class="form-control" id="post" name="poste">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="text" class="form-control" id="email" placeholder="Joelmayinei@example.com" name="email">
        </div>
        <div class="mb-3">
            <label for="telNo" class="form-label">Numero de telephone</label>
            <input type="tel" class="form-control" id="telNo" placeholder="+243819723232" maxlength="13" name="tel">
        </div>
        <button type="submit" class="w-100 btn btn-primary" name="button">S'enregistrer</button>
    </form>
</div>


<?php require "footer.php"
?>
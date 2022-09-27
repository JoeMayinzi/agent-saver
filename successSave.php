<?php session_start();
require "connexion.php";

$selection = "SELECT * FROM `agents`";
$query = $pdo->query($selection);
$fetch = $query->fetch();





?>
<?php require "header.php"; ?>

<div class="container">
    <div class="mt-5 alert alert-success" role="alert">
        <?php
        ?>
        <p>Merci beaucoup agent <?= $_SESSION['agent']['nom'] ?> <?= $_SESSION['agent']['postnom'] ?> <?= $_SESSION['agent']['prenom'] ?>
            Votre Enregistrement a été effectuée avec succès, Veillez telecharger votre fiche <a href="pdfAgent.php">ici</a>
        </p>
        <?php
        foreach ($fetch as $picture) {
        ?>
            <img src="<?= $picture ?>" alt="">
        <?php
        }
        ?>
    </div>
</div>

<?php

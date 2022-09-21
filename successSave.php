<?php session_start(); ?>
<?php require "header.php"; ?>

<div class="container">
    <div class="mt-5 alert alert-success" role="alert">
        <?php
        ?>
        <p>Merci beaucouo agent <?= $_SESSION['agent']['nom'] ?> <?= $_SESSION['agent']['postnom'] ?> <?= $_SESSION['agent']['prenom'] ?>
            Votre Enregistrement a été effectuée avec succès, Veillez telecharger votre fiche <a href="pdfAgent.php">ici</a>
        </p>
        <?php
        ?>
    </div>
</div>
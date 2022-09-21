<?php
session_start();

if (!isset($_SESSION['agent'])) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>agent <?= $_SESSION['agent']['nom'] ?></title>
</head>

<body>
    <?php
    if (isset($_SESSION['agent'])) {
    ?>
        <div class="container agent">
            <h1 class="mt-2">Fiche Agent</h1>
            <div class="current-agent_img">
                <img src="" alt="">
            </div>
            <div class="row">
                <div class="d-flex">
                    <div>
                        <p>Nom :</p>
                    </div>
                    <div>
                        <p class=" ms-2"><?= $_SESSION['agent']['nom'] ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p>Postnom :</p>
                    </div>
                    <div>
                        <p class=" ms-2"><?= $_SESSION['agent']['postnom'] ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p>Prenom :</p>
                    </div>
                    <div>
                        <p class=" ms-2"><?= $_SESSION['agent']['prenom'] ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p>Sexe :</p>
                    </div>
                    <div>
                        <p class=" ms-2"><?= $_SESSION['agent']['sexe'] ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p>Lieu de Naissance :</p>
                    </div>
                    <div>
                        <p class=" ms-2"><?= $_SESSION['agent']['lieu'] ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p>Adresse:</p>
                    </div>
                    <div>
                        <p class=" ms-2"><?= $_SESSION['agent']['adresse'] ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p>Poste :</p>
                    </div>
                    <div>
                        <hp class=" ms-2"><?= $_SESSION['agent']['poste'] ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p>Adresse Email :</p>
                    </div>
                    <div>
                        <p class=" ms-2"><?= $_SESSION['agent']['email'] ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p>Numer de Télephone :</p>
                    </div>
                    <div>
                        <p class=" ms-2"><?= $_SESSION['agent']['telephone'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="container mt-5">
        <footer>
            <p>Fait à Kinshasa le <?= $date = date("j, n, y") ?></p>
            <h4>Département Informatique.</h4>
        </footer>
    </div>
</body>

</html>
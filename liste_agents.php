<?php
require "connexion.php";

$select = "SELECT * FROM `agents`";
$query = $pdo->query($select);
$agents = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des agents</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Post-nom</th>
                <th>Prenom</th>
                <th>Sexe</th>
                <th>Lieu de Naissance</th>
                <th>Adresse</th>
                <th>Poste</th>
                <th>Email</th>
                <th>Numero de Telephone</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($agents as $agent) : ?>
                <tr>
                    <td><?= $agent['id'] ?> </td>
                    <td><?= $agent['Nom'] ?> </td>
                    <td><?= $agent['Postnom'] ?> </td>
                    <td><?= $agent['Prenom'] ?> </td>
                    <td><?= $agent['Sexe'] ?> </td>
                    <td><?= $agent['Lieu'] ?> </td>
                    <td><?= $agent['Adresse'] ?> </td>
                    <td><?= $agent['Poste'] ?> </td>
                    <td><?= $agent['Email'] ?> </td>
                    <td><?= $agent['Telephone'] ?> </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</body>

</html>
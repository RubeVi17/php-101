<?php

include 'objetos.php';

$id = (int) $_GET["id"];

$data = getContentById($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1><?=$data["name"]?> <?=$data["lastname"]?> </h1>
        <h2><?=$data["token"]?></h2>
    </div>
</body>
</html>
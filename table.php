<?php
include 'objetos.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["user_create"])){
        addContent($_POST);
    }

    if(isset($_POST["user_delete"])){
        deleteContent($_POST["user_delete"]);
    }

    if(isset($_POST["download"])){
        exportContent('txt');
    }

}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutorial HTML</title>
        <style>
            .container{
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
            }
            h1.title{
                text-align: center;
                color: #333;
            }
            span.info{
                display: block;
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }
            table.table{
                width: 100%;
                border-collapse: collapse;
            }
            table.table thead tr th{
                background-color: #333;
                border: 1px solid #333;
                color: #fff;
                padding: 10px;
            }
            table.table tbody tr td{
                padding: 10px;
                border: 1px solid #333;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="title">Productos</h1>
            <div class="table-container">
                <span class="info">Lista de clientes registrados en la plataforma</span>
                <form action="/table.php" method="post">
                    <button type="submit" name="download">Descargar</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Apellido
                                </th>
                                <th>
                                    Edad
                                </th>
                                <th>
                                    Genero
                                </th>
                                <th>
                                    Opciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = extraer();
                            foreach($data as $row){
                            ?>
                            <tr>
                                <td><a href="/user.php?id=<?=$row["id"]?>"><?=$row["id"]?></a></td>
                                <td><?=$row["name"]?></td>
                                <td><?=$row["lastname"]?></td>
                                <td><?=$row["age"]?></td>
                                <td><?=$row["gender"]?></td>
                                <td><button type="submit" name="user_delete" value="<?=$row["id"]?>">Eliminar</button></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <br>
            <div class="form">
                <form action="/table.php" method="post">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name">
                    <br>
                    <label for="lastname">Apellido</label>
                    <input type="text" name="lastname" id="lastname">
                    <br>
                    <label for="age">Edad</label>
                    <input type="number" name="age" id="age">
                    <br>
                    <label for="gender">Genero</label>
                    <select name="gender" id="gender">
                        <option value="M">Hombre</option>
                        <option value="F">Mujer</option>
                    </select>
                    <br>
                    <input type="submit" name="user_create" value="Crear">
                </form>
            </div>
        </div>
    </body>
</html>
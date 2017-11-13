<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helpers.php';

    $queryResult = $pdo->query("SELECT * from distro ORDER BY id DESC");
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Starter Template for Bootstrap</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DistroADA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="?route=add">Añadir Distro</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <h1>Most Popular Distros</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Logo</th>
            <th>Name</th>
            <th>Os Type</th>
            <th>Version</th>
            <th>Web</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
            <?php while( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ): ?>
        <tr>
            <td><a href="distro.php?id=<?=$row['id']?>"><img src="<?=$row['image']?>" alt="Logo de <?=$row['name']?>"></a></td>
            <td><a href="distro.php?id=<?=$row['id']?>"><?=$row['name']?></a></td>
            <td><?=$row['basedon']?></td>
            <td><?=$row['version']?></td>
            <td><?=$row['web']?></td>
            <td><a href="?route=update&id=<?=$row['id']?>" class="editar">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
            </td>
            <td><a href="?route=delete&id=<?=$row['id']?>" class="borrar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
        </tr>
        <?php endwhile; ?>

        </tbody>
    </table>
</div><!-- /.container -->
</body>
</html>

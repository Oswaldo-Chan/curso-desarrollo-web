<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="container header-content">
            <div class="bar">
                <a href="index.php">
                    <img src="build/img/logo.svg" alt="logo image">
                </a>

                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="">
                </div>
                
                <div class="nav-container">
                    <img class="btn-dark-mode" src="build/img/dark-mode.svg">
                    <nav class="nav">
                        <a href="nosotros.php">nosotros</a>
                        <a href="anuncios.php">anuncios</a>
                        <a href="blog.php">blog</a>
                        <a href="contacto.php">contacto</a>
                    </nav>
                </div>
            </div><!--end bar-->

            <?php if($inicio) { ?>
            <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>
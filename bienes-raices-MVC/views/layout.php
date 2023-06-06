<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="container header-content">
            <div class="bar">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="logo image">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="">
                </div>
                
                <div class="nav-container">
                    <img class="btn-dark-mode" src="/build/img/dark-mode.svg">
                    <nav class="nav">
                        <a href="/nosotros.php">nosotros</a>
                        <a href="/anuncios.php">anuncios</a>
                        <a href="/blog.php">blog</a>
                        <a href="/contacto.php">contacto</a>
                        <?php if ($auth) : ?>
                            <a href="logout.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div><!--end bar-->

            <?php if($inicio) { ?>
            <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>

    <?php echo $content; ?>

    <footer class="footer section">
        <div class="container footer-content">
            <nav class="nav">
                <a href="/nosotros.php">nosotros</a>
                <a href="/anuncios.php">anuncios</a>
                <a href="/blog.php">blog</a>
                <a href="/contacto.php">contacto</a>
            </nav>
        </div>

        <p class="copyright">todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>
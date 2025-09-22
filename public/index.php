<?php
session_start();

require "../config/Conexao.php";

$db = new Conexao();
$pdo = $db->conectar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <base href="http://<?=$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"]?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="images/icone.png">

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/jquery.maskedinput-1.2.1.js"></script>

    <script>
        mostrarSenha = function() {
            const campo = document.getElementById('senha');
            if (campo.type === 'password') {
                campo.type = 'text';
            } else {
                campo.type = 'password';
            }
        }
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="Shop">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <main>
            <?php
                if (isset($_GET["param"]))
                    $param = explode("/", $_GET["param"]);
                
                $controller = $param[0] ?? "index"; 
                $acao = $param[1] ?? "index";
                $id = $param[2] ?? NULL;

                $controller = ucfirst($controller)."Controller";

                $arquivo = "../controllers/{$controller}.php";

                if (file_exists($arquivo)) {
                    require $arquivo;
                    $control = new $controller();
                    $control->$acao($id);
                } else {
                    require "../views/index/erro.php";
                }
            ?>
            </main>
        </main>
    </div>

    <footer class="footer p-3">
        <p class="text-center">Desenvolvido por Seu Nome</p>
    </footer>
</body>

</html>
<?php
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/partials/index.css">
    <link rel="stylesheet" href="./css/user/home.css">
</head>
<?php   
    $hasStatus = isset($_GET['status']);    
    $message = urldecode($_GET['message']);
    if($hasStatus){
        switch($_GET['status']){
            case '200':
               ?>
               <div class="alert alert-success fixed-top d-flex justify-content-between" id="success-home-alert">
                <?= $message ?>
                <button class="btn-hidden-alert btn-close" data-alert="success-home-alert"></button>
               </div>
<?php
                break;
        }
    }
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid p-0 m-0 d-flex ">
        <?php require_once '../App/Views/partials/menu.php'?>
        <div class="container-fluid vh-100 p-0 d-flex">
            <footer class="footer mt-auto py-3 bg-light">
                <div class="container-fluid">
                    <span class="text-muted">© 2023 Class Manager. Todos os direitos reservados.</span>
                    <ul class="list-inline float-end mb-0">
                        <li class="list-inline-item"><a href="#">Termos de Uso</a></li>
                        <li class="list-inline-item"><a href="#">Política de Privacidade</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/user/partials/navbar.js"></script>
    <script src="./js/bootStrap.js"></script>

</body>

</html>
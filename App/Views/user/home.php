<?php
    $username = $_SESSION['username'];
?>  
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/user/home.css">
</head>
<body class="d-flex flex-column min-vh-100">



<div class="container d-flex ">
<nav class="navbar">
   
       
   <ul class="navbar-list d-flex flex-column justify-content-around"> 
            <li><img src="./image/profile.jpeg" alt="foto de perfil" class="img-fluid rounded-circle" height="34px" width="34px"> &nbsp;  <?= $username ?></li>
           <li>Lorem, ipsum dolor.</li>
           <li>Lorem, ipsum dolor.</li>
           <li>Lorem, ipsum dolor.</li>
           <li>Lorem, ipsum dolor.</li>
           <li><a href="/logout" class="link link-danger d-flex align-items-center gap-2"><iconify-icon icon="ion:exit" style="color: #c51605;" width="25" height="25"></iconify-icon> Sair</a></li>
          
   </ul>
</nav>
<div class="container-fluid">

</div>
</div>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">© 2023 Class Manager. Todos os direitos reservados.</span>
        <ul class="list-inline float-end mb-0">
            <li class="list-inline-item"><a href="#">Termos de Uso</a></li>
            <li class="list-inline-item"><a href="#">Política de Privacidade</a></li>
        </ul>
    </div>
</footer>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

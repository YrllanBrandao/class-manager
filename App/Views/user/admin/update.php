<?php
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Cadastro de usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../..//css/partials/index.css">
    <link rel="stylesheet" href="../../css/user/register.css">

</head>

<body class="d-flex flex-column min-vh-100">


    <?php
        $error = $_GET['error'];

        switch($error){
          case 411:
            ?>
    <div class="alert alert-warning fixed-top">
        Insira uma senha com no mínimo 8 digitos
    </div>
    <?php
            break;

          case 409:
            ?>
    <div class="alert alert-danger fixed-top">
        E-mail já cadastrado!! &nbsp; <a href="#" class="link-dark fw-bolder"> fazer login</a>
    </div>
    <?php
            break;
        }
        ?>

    <div class="container-fluid vh-100 p-0 d-flex">
        <?php require_once '../App/Views/partials/menu.php'?>
        <div class="container-fluid d-flex flex-column align-items-center pt-5 bg-gray">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Atualizar usuário</h1>
                </div>
                <div class="card-body">
                    <form action="/admin/user/save-update" method="post" id="form-update" class="form-control"> 

                        <div class="row px-3">
                            <label for="username" class="form-label">Nome do usuário</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Ex: aluno23" pattern="^[a-zA-Z0-9]{4,30}$"
                                title="Apenas letra e números, mín. 4 caracteres | max: 30 caracteres" value="<?= $username ?>">
                        </div>

                        <div class="row px-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Ex: example2023@domain.com" title="Endereço de E-mail"  value="<?= $email ?>">
                        </div>

                        <div class="row px-3">
                            <label for="role" class="form-label">Cargo</label>
                        <select name="role" id="role" class="form-control">
                                <option value="1">Administrador</option>
                                <option value="3">Professor</option>
                                <option value="2">Aluno</option>
                            </select>
                        </div>

                        
                        <input type="hidden" name="userId" value="<?= $id ?>">
                   

                        <div class="row px-3 mt-3">
                            <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="../../js/user/update.js"></script>
    <script src="../../js/user/partials/navbar.js"></script>
</body>

</html>
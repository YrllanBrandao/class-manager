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
    <link rel="stylesheet" href="../../css/partials/index.css">

</head>

<body class="d-flex flex-column min-vh-100">


    <?php
        $status = $_GET['status'];

        switch($status){
          case 201:
            ?>
    <div class="alert alert-success  fixed-top  d-flex justify-content-between" id="success-role-alert">
        Cargo registrado com sucesso!
        <button class="btn-hidden-alert btn-close" data-alert="success-role-alert"></button>
    </div>
    <?php
            break;

          case 500:
            ?>
    <div class="alert alert-danger fixed-top">
        Ocorreu um erro, tente novamente mais tarde!
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
                    <h1 class="text-center">Registrar Cargo</h1>
                </div>
                <div class="card-body">
                   <table class="table table-striped">
                    <thead>
                        <th>Cargo</th>
                        <th>Descrição</th>
                        <th>Acões</th>
                    </thead>
                    <tbody>
                    <?php
                        foreach($roles as $role){
                            ?>
                            <tr>
                                <td><?= $role['name'] ?></td>
                                <td><?= $role['description'] ?></td>
                                <td class="d-flex gap-1" >
                                <form action="/admin/user/update" method="post" >
                                <input type="hidden" name="userId" value="<?= $user['id']?>" >
                                <button type="submit" class="btn btn-primary"><iconify-icon icon="fluent:edit-settings-24-filled" style="color: white;" width="25"></iconify-icon></button>
                                </form>
                                <form action="/admin/user/delete" method="post" class="form-delete">
                                    <input type="hidden" name="userId" value="<?= $user['id']?>">
                                    <input type="hidden" name="username" value="<?= $user['username']?>" class="username">
                                <button type="submit"  class="btn btn-danger"><iconify-icon icon="fa:trash" style="color: white;" width="25"></iconify-icon></button>

                                </form>

                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                   </table>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="../../js/user/partials/navbar.js"></script>
    <script src="../../js/bootStrap.js"></script>

</body>

</html>
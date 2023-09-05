<?php
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>  
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gerenciar usuários | usuários</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/partials/index.css">
<link rel="stylesheet" href="../css/user/home.css">
</head>
<body class="d-flex flex-column min-vh-100">



<div class="container-fluid p-0 m-0 d-flex ">
<?php require_once '../App/Views/partials/menu.php'?>
<div class="container-fluid vh-100 p-0 d-flex flex-column">
<div class="card m-auto">
        <div class="card-header">
            <h1 class="fs-5 text-center">Lista usuários</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>
                        Id
                    </th>
                    <th>
                        Usuário
                    </th>
                    <th>
                        E-mail
                    </th>
                    <th class="text-center">
                        Ações
                    </th>
                </thead>
                <tbody>
                    <?php
                        foreach($users as $user){
                            ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td class="d-flex gap-1" >
                            <form action="/admin/user/update" method="post" >
                                <input type="hidden" name="userId" value="<?= $user['id']?>" >
                                <button type="submit" class="btn btn-primary"><iconify-icon icon="fa-solid:user-edit" style="color: white;" width="25"></iconify-icon></button>
                                </form>
                                <form action="/admin/user/delete" method="post" class="form-delete">
                                    <input type="hidden" name="userId" value="<?= $user['id']?>">
                                    <input type="hidden" name="username" value="<?= $user['username']?>" class="username">
                                <button type="submit"  class="btn btn-danger"><iconify-icon icon="fa-solid:user-times" style="color: white;" width="25"></iconify-icon></button>

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
<script src="../js/user/partials/navbar.js"></script>
<script src="../js/user/users.js"></script>
</body>
</html>

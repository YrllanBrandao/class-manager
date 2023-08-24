<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class Manager - Entrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/user/login.css">
</head>

<body>

    <div class="navbar border-bottom p-1 px-3">
        <a href="#" class="navbar-brand fs-2  fw-bold">
            Class Manager
        </a>
    </div>

    <?php
    if(isset($_GET['error'])){

    
        $error = $_GET['error'];

        switch($error){
            case 400:
                ?>
                    <div class="alert alert-warning">
        Senha E/ou  E-mail invalido(s)!
    </div>
                <?php
                break;
          case 411:
            ?>
    <div class="alert alert-warning">
        Insira uma senha com no mínimo 8 digitos
    </div>
    <?php
            break;

          case 409:
            ?>
    <div class="alert alert-danger">
        E-mail já cadastrado!! &nbsp; <a href="#" class="link-dark fw-bolder"> fazer login</a>
    </div>
    <?php
            break;
        }
      }
      ?>
    <div class="container-fluid m-0 row d-flex justify-content-center align-items-center p-2">


        <form class="card col-3 p-0 form-login" method="POST" id="form-login" action="/authentication">

            <div class="card-header">
                <h1 class="fs-4 text-center">Log in</h1>
            </div>
            <div class="card-body d-flex flex-column gap-2">
                <div class="form-floating">

                    <input type="emai" name="email" id="email" class="form-control" placeholder="E-mail" required>
                    <label for="email" class="floating-label">E-mail</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Senha"
                        required>
                    <label for="email" class="floating-label">senha</label>
                </div>


                <br />

                <button type="submit" class="btn btn-success">
                    Entrar
                </button>
            </div>
        </form>

        <footer class="sticky-top d-flex justify-content-center p-2">
            Yrllan Brandão &copy; 2023
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
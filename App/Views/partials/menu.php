   <?php
   require_once '../App/Middlewares/middleware.php';

   $role = $_SESSION['role'];
?>
   <nav class="navbar">

       <ul class="navbar-list d-flex flex-column">

           <nav class="navbar">
               <ul class="navbar-list d-flex flex-column">
                   <li class="navbar-item-header d-flex gap-3">
                       <iconify-icon icon="fa-solid:user" style="color: white;" width="30" height="30"></iconify-icon>
                       <?= $username ?> | <?= $role ?>
                   </li>
                   <?php
           switch($role){
            case 'student':
               ?>

                   <li class="navbar-item">
                       <iconify-icon icon="fa-solid:chalkboard-teacher" style="color: white;" width="25"></iconify-icon>
                       Ensino
                   </li>
                   <li class="navbar-item"> <a href="/document-and-processes">
                           <iconify-icon icon="mdi:file-document" style="color: white;" width="25" height="25">
                           </iconify-icon> Documentos/Processos
                       </a></li>
                   <li class="navbar-item">
                       <iconify-icon icon="fa-solid:chalkboard-teacher" style="color: white;" width="25" height="25">
                       </iconify-icon> Ensino
                   </li>
                   <?php
                break;
            case 'admin':
               ?>
                   <li class="navbar-item has-child">
                       <iconify-icon icon="fa:users" style="color: white;"></iconify-icon> Gerenciar usuários
                       <ul>
                           <li>Registrar usuário</li>
                       </ul>
                   </li>
                   <li class="navbar-item"> <a href="/document-and-processes">
                           <iconify-icon icon="mdi:file-document" style="color: white;" width="25" height="25">
                           </iconify-icon> Documentos/Processos
                       </a></li>
                   <li class="navbar-item">
                       <iconify-icon icon="fa-solid:chalkboard-teacher" style="color: white;" width="25"></iconify-icon>
                       Ensino
                   </li>
                   <li class="navbar-item">
                       <iconify-icon icon="fluent:communication-person-24-filled" style="color: white;" width="25">
                       </iconify-icon> Comunicação
                   </li>
                   <?php
                break;
            case 'professor':
                break;
         }
           
           ?>
                   <li class="navbar-item"><a href="/logout" class="link link-light d-flex align-items-center gap-2">
                           <iconify-icon icon="ion:exit" style="color: #FFFFFF;" width="25" height="25"></iconify-icon>
                           Sair
                       </a></li>
               </ul>

           </nav>

       </ul>
   </nav>
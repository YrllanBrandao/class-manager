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
                   <li class="navbar-item"><a href="/home"><iconify-icon icon="ion:home" style="color: white;" width="25"></iconify-icon>Início</a></li>
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
                   <li class="navbar-item has-child"  data-child="user-management">
                       <span class="navbar-item-title"> 
                       <iconify-icon icon="fa:users" style="color: white;"  width="25"></iconify-icon> Gerenciar usuários
                       </span>
                       <ul id="user-management" class="navbar-item-child hidden" >
                           <li><a href="/admin/users"> <iconify-icon icon="gridicons:multiple-users" style="color: white;" width="25"></iconify-icon>Usuários</a></li>
                           <li><a href="/register"> <iconify-icon icon="mdi:register" style="color: white;" width="20"></iconify-icon> Registrar usuário</a></li>
                       </ul>
                   </li>
                   <li class="navbar-item"> <a href="/document-and-processes">
                           <iconify-icon icon="mdi:file-document" style="color: white;" width="20">
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
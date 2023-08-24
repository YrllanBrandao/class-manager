<nav class="navbar">
   
   <ul class="navbar-list d-flex flex-column"> 
            <li  class="navbar-item-header d-flex gap-3"><iconify-icon icon="fa-solid:user" style="color: white;" width="30" height="30"></iconify-icon> <?= $username ?> | <?= $role ?></li>
           <li class="navbar-item"> <a href="/document-and-processes" ><iconify-icon icon="mdi:file-document" style="color: white;" width="25" height="25"></iconify-icon> Documentos/Processos</a></li>
           <li class="navbar-item"><iconify-icon icon="fa-solid:chalkboard-teacher" style="color: white;" width="25" height="25"></iconify-icon> Ensino</li>
      

           <li class="navbar-item"><a href="/logout" class="link link-light d-flex align-items-center gap-2"><iconify-icon icon="ion:exit" style="color: #FFFFFF;" width="25" height="25"></iconify-icon> Sair</a></li>
          
   </ul>
</nav>
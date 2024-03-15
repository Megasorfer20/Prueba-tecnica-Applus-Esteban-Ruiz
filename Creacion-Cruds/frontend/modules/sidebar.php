<aside class="main-sidebar sidebar-dark-warning elevation-4">
  <p class="brand-link navbar-blue">
    <img src="./frontend/assets/img/IconApplus.png" alt="Applus Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">APPLUS</span>
  </p>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item <?php if($routesArray[3]=="" || $routesArray[3]=="product"): ?> active <?php endif ?>">
          <a href="/Prueba-tecnica-Applus/Creacion-Cruds/product" class="nav-link ">
            <i class="nav-icon fa fa-dropbox"></i>
            <p>
              Productos
            </p>
          </a>
        </li>


        <li class="nav-item <?php if($routesArray[3]=="category"): ?> active <?php endif ?>">
          <a href="/Prueba-tecnica-Applus/Creacion-Cruds/category" class="nav-link ">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              Categorias
            </p>
          </a>
        </li>

    </nav>

  </div>

</aside>
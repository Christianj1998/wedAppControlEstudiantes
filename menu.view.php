<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>proyecto</title>
  <link rel="stylesheet" href="css/styles.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="images/logoRosales.jpg" alt="Rosales"></i>
        <p class="nameSchool">E.B Julio Rosales </p>
      </div>

      <!-- <div class="search_bar">
        <input type="text" placeholder="Search" />
      </div> -->

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>
      </div>
    </nav>
  </header>
  <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">
        <div class="menu_title menu_dahsboard"></div>
        <!-- start -->
        <li class="item">
          <a href="inicio.view.php" class="nav_link submenu_item active">
            <span class="navlink_icon">
            <i class='bx bxs-home-smile'></i>
            </span>
            <span class="navlink">Inicio</span>
            <i class="bx bx-chevron"></i>
          </a>
        </li>
        <!-- end -->
       <!-- start -->
        <li class="item">
          <a href="alumnos.view.php" class="nav_link submenu_item">
            <span class="navlink_icon">
            <i class='bx bxs-book-add'></i>
            </span>
            <span class="navlink">Registro Alumnos</span>

          </a>
        </li>
        <!-- end -->
      </ul>
      <ul class="menu_items">
        <div class="menu_title menu_editor"></div>
        <!-- duplicate these li tag if you want to add or remove navlink only -->
        <!-- Start -->
        <li class="item">
          <a href="listadoalumnos.view.php" class="nav_link">
            <span class="navlink_icon">
            <i class='bx bxs-book-open'></i>
            </span>
            <span class="navlink">Listado General</span>
          </a>
        </li>
        <!-- End -->
        <li class="item">
          <a href="notas.view.php" class="nav_link">
            <span class="navlink_icon">
            <i class='bx bxs-edit'></i>
            </span>
            <span class="navlink">Registro de Notas</span>
          </a>
        </li>
        <li class="item">
          <a href="listadonotas.view.php" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bx-filter"></i>
            </span>
            <span class="navlink">consulta de nota</span>
          </a>
        </li>

        <!-- start -->
        <li class="item">
          <a href="listado_trabajadores.view.php" class="nav_link">
            <span class="navlink_icon">
            <i class='bx bxs-briefcase-alt'></i>
            </span>
            <span class="navlink">Trabajadores</span>
          </a>
        </li>
        <li class="item">
          <a href="trabajadores.view.php" class="nav_link">
            <span class="navlink_icon">
            <i class='bx bxs-add-to-queue'></i>
            </span>
            <span class="navlink">Nuevo Tabajador</span>
          </a>
        </li>
        <!-- end -->

        <li class="item bottom_content">
          <a href="logout.php" class=" bottom nav_link">
            <span class="navlink_icon" >
              <i class="bx bx-log-out "></i>
              <span class="navlink">Salir</span>
            </span>
          </a>
        </li>
      </ul>


      <!-- Sidebar Open / Close -->
      <!-- <div class="bottom_content">
        <div class="bottom expand_sidebar">
          <span> Expand</span>
          <i class='bx bx-log-in'></i>
        </div>
        <div class="bottom collapse_sidebar">
          <span> Collapse</span>
          <i class='bx bx-log-out'></i>
        </div>
      </div>
    </div> -->
  </nav>

<!DOCTYPE html>
<html ng-app="YetAnotherTodoApp">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="/assets/bower_components/foundation-icons/foundation_icons_general/stylesheets/general_foundicons.css" />
    <link rel="stylesheet" href="/assets/stylesheets/app.css" />
    <script src="/assets/bower_components/modernizr/modernizr.js"></script>
</head>
<body class="dashboard">
    <div class="off-canvas-wrap" data-offcanvas>
      <div class="inner-wrap">
        <div class="tab-bar">
            <section class="left-small">
                <a href="#" class="left-off-canvas-toggle menu-icon"><span></span></a>
            </section>
            <section class="middle tab-bar-section">
                <h1 class="title"><?php echo $title ?></h1>
            </section>
        </div>
        <!-- Off Canvas Menu -->
        <aside class="left-off-canvas-menu">
          <!-- whatever you want goes here -->
          <ul class="off-canvas-list">
            <li><label for="">Opciones</label></li>
            <li>
              <a href="/dashboard">
                <i class="foundicon-address-book"></i>
                &nbsp;
                Ver la lista de tareas
              </a>
            </li>
            <li>
              <a href="#">
                <i class="foundicon-paper-clip"></i>
                &nbsp;
                Crear una lista de tareas
              </a>
            </li>
            <li>
              <a href="#">
                <i class="foundicon-add-doc"></i>
                &nbsp;
                Crear una tarea
              </a>
            </li>
            <li>
              <a href="/profile/edit">
                <i class="foundicon-heart"></i>
                &nbsp;
                Editar mi perfil
              </a>
            </li>
            <li>
                <a href="/member/logout">
                    <i class="foundicon-lock"></i>
                    &nbsp;
                    Salir
                </a>
            </li>
          </ul>
        </aside>

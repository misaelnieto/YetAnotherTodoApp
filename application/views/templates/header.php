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
        <aside class="left-off-canvas-menu" ng-controller="OffCanvasMenuCtrlr">
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
              <a href="#" ng-click="createTaskList()">
                <i class="foundicon-paper-clip"></i>
                &nbsp;
                Crear una lista de tareas
              </a>
            </li>
            <li>
              <a href="#" ng-click="showNewTaskModal()">
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
          <script type="text/ng-template" id="NewTaskListModal.html">
              <a class="close-reveal-modal" ng-click="cancel_add()">&#215;</a>
              <input type="text" ng-model="data.title" required/>
              <button class="button" ng-click="add_tasklist()">Agregar lista de tareas</button>
          </script>
          <script type="text/ng-template" id="NewTaskModal.html">
              <a class="close-reveal-modal" ng-click="cancel()">&#215;</a>
              <p>Lista de tareas</p>
              <select ng-model="data.tasklist_id" ng-options="l.id as l.title for l in task_lists"></select>
              <p>Texto</p>
              <textarea ng-model="data.text" required/>
              <button class="button" ng-click="add_task()">Agregar tarea</button>
          </script>
        </aside>

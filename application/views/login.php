<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista de tareas</title>
    <link rel="stylesheet" href="/assets/bower_components/foundation-icons/foundation_icons_general/stylesheets/general_foundicons.css" />
    <link rel="stylesheet" href="/assets/stylesheets/app.css" />
    <script src="/assets/bower_components/modernizr/modernizr.js"></script>
</head>
<body class="login">
    <div class="title row text-center">
        <h1>Mi lista de tareas</h1>
    </div>
    <div class="center row">
        <ul class="tabs" data-tab>
            <li class="tab-title">
                <a href="/register">Crear una cuenta</a>
            </li>
            <li class="tab-title active">
                <a href="#ingresar">Ya tengo una</a>
            </li>
        </ul>
        <div class="tabs-content">
            <section class="content" id="registro">
            </section>
            <section class="content active" id="ingresar">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="login-panel">
                            <?php echo form_open('member/login'); ?>
                            <p class="welcome"><?php echo validation_errors(); ?></p>
                                <div class="row collapse">
                                    <div class="small-2 columns">
                                        <span class="prefix"><i class="foundicon-mail"></i></span>
                                    </div>
                                    <div class="small-10  columns">
                                        <input type="email" name="email" placeholder="Correo Electrónico" required>
                                    </div>
                                </div>
                                <div class="row collapse">
                                    <div class="small-2 columns ">
                                        <span class="prefix"><i class="foundicon-lock"></i></span>
                                    </div>
                                    <div class="small-10 columns ">
                                        <input type="password" name="password" placeholder="Contraseña" required>
                                    </div>
                                </div>
                                <input class="button" type="submit" value="Entrar">
                            </form>
                        </div>
                    </div>
                 </div>
            </section>
        </div>
    </div>

    <script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/assets/bower_components/foundation/js/foundation.min.js"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista de pendiendtes</title>
    <link rel="stylesheet" href="assets/stylesheets/app.css" />
    <script src="assets/bower_components/modernizr/modernizr.js"></script>
</head>
<body class="login">
    <div class="center row">
        <ul class="tabs" data-tab>
            <li class="tab-title active">
                <a href="#registro">Crear una cuenta</a>
            </li>
            <li class="tab-title">
                <a href="#ingresar">Ya tengo una</a>
            </li>
        </ul>
        <div class="tabs-content">
            <section class="content active" id="registro">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="signup-panel">
                            <p class="welcome">Hola, Bienvenido!</p>
                            <form>
                                <div class="row collapse">
                                    <div class="small-2  columns">
                                        <span class="prefix"><i class="fi-torso"></i></span>
                                    </div>
                                    <div class="small-10  columns">
                                        <input type="text" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="row collapse">
                                    <div class="small-2 columns">
                                        <span class="prefix"><i class="fi-mail"></i></span>
                                    </div>
                                    <div class="small-10  columns">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row collapse">
                                    <div class="small-2 columns ">
                                        <span class="prefix"><i class="fi-lock"></i></span>
                                    </div>
                                    <div class="small-10 columns ">
                                        <input type="text" placeholder="Password">
                                    </div>
                                </div>
                            </form>
                            <a href="#" class="button">Registrate! </a>
                        </div>
                    </div>
                 </div>
            </section>
            <section class="content" id="ingresar">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="signup-panel">
                            <p class="welcome">Welcome back!</p>
                            <form>
                                <div class="row collapse">
                                    <div class="small-2 columns">
                                        <span class="prefix"><i class="fi-mail"></i></span>
                                    </div>
                                    <div class="small-10  columns">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row collapse">
                                    <div class="small-2 columns ">
                                        <span class="prefix"><i class="fi-lock"></i></span>
                                    </div>
                                    <div class="small-10 columns ">
                                        <input type="text" placeholder="Password">
                                    </div>
                                </div>
                            </form>
                            <a href="#" class="button ">Sign Up! </a>
                        </div>
                    </div>
                 </div>
            </section>
        </div>
    </div>

    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/foundation/js/foundation.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
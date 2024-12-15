<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

        <!-- Custom CSS for additional styling -->
        <style>
            body {
                background: linear-gradient(to right, #6a11cb, #2575fc);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: 'Montserrat', sans-serif;
            }
            .card {
                border: none;
                border-radius: 20px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                background-color: #ffffff;
            }
            .card-title {
                font-size: 1.75rem;
                font-weight: bold;
                color: #333;
            }
            .form-control {
                border-radius: 10px;
            }
            .btn-primary {
                background-color: #6a11cb;
                border-color: #6a11cb;
                border-radius: 10px;
            }
            .btn-primary:hover {
                background-color: #2575fc;
                border-color: #2575fc;
            }
            .register-link {
                color: #6a11cb;
            }
            .register-link:hover {
                text-decoration: underline;
            }
        </style>

        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card p-4">
                        <div class="card-body">
                            <h3 class="text-center mb-4 card-title">Iniciar Sesión</h3>
                            <form action="<?php echo base_url('/login') ?>" method="POST">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" name="usuario" class="form-control" placeholder="Ingresa tu usuario" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            </form>
                            <div class="text-center mt-3">
                                <span>¿No tienes una cuenta?</span>
                                <a href="/register" class="register-link">Regístrate aquí</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
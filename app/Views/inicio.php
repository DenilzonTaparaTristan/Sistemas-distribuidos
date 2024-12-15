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

  <!-- Custom CSS for styling -->
  <style>
    body {
      background-color: #e9ecef;
      font-family: 'Montserrat', sans-serif;
    }
    .navbar {
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .content {
      margin-top: 50px;
      text-align: center;
    }
    .content h1 {
      color: #343a40;
      font-weight: 700;
      font-size: 2.5rem;
    }
    .btn-logout {
      color: #fff;
      background-color: #dc3545;
      border: none;
      transition: background-color 0.3s;
      border-radius: 20px;
    }
    .btn-logout:hover {
      background-color: #c82333;
    }
    .role {
      color: #6c757d;
      font-style: italic;
      margin-top: 10px;
      font-size: 1.2rem;
    }
    .btn-primary {
      background-color: #007bff;
      border-radius: 20px;
    }
    .btn-secondary {
      background-color: #6c757d;
      border-radius: 20px;
    }
    .btn-primary:hover, .btn-secondary:hover {
      opacity: 0.9;
    }
  </style>

  <title>Inicio</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand font-weight-bold" href="#"><?php echo session('usuario'); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-logout text-white" href="<?php echo base_url('/salir') ?>">Salir</a>
        </li>
      </ul>
    </div>
  </nav>
  
  <div class="container content">
    <h1>Bienvenido, <?php echo session('usuario'); ?>!</h1>
    <p class="role">
      <?php
      switch (session('type')) {
        case 'admin':
          echo "Eres un administrador.";
          break;
        case 'editor':
          echo "Eres un editor.";
          break;
        case 'viewer':
          echo "Eres un espectador.";
          break;
        default:
          echo "Rol desconocido.";
          break;
      }
      ?>
    </p>
    
    <!-- Contenido dinámico basado en el tipo de usuario -->
    <div class="mt-4">
      <?php if (session('type') === 'admin'): ?>
        <a href="<?php echo base_url('/admin/configuracion'); ?>" class="btn btn-primary">Configuración</a>
        <a href="<?php echo base_url('/admin/usuarios'); ?>" class="btn btn-secondary">Gestionar Usuarios</a>
      <?php elseif (session('type') === 'editor'): ?>
        <a href="<?php echo base_url('/editor'); ?>" class="btn btn-primary">Editar Contenido</a>
      <?php elseif (session('type') === 'viewer'): ?>
        <p>Gracias por visitar. Puedes explorar el contenido disponible.</p>
      <?php else: ?>
        <p>No tienes un rol asignado.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
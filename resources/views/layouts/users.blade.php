<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Financial Dashboard</title>
  <!-- Import MaterializeCSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
  <!-- Import Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      background-color: #e3f2fd;
      padding-bottom: 70px; /* Tambahkan padding agar konten tidak tertutup navbar */
    }
    .header {
      background-color: #1976d2;
      color: white;
      padding: 20px;
      text-align: center;
    }
    .balance-card {
      background-color: #1e88e5;
      color: white;
      padding: 20px;
      border-radius: 8px;
      margin-top: 20px;
      text-align: center;
    }
    .menu-item {
      text-align: center;
      padding: 10px;
    }
    .menu-item i {
      font-size: 2rem;
      color: #1e88e5;
    }
    .menu-label {
      color: #1e88e5;
      font-size: 0.9rem;
    }
    .feature-item {
      text-align: center;
      color: #1e88e5;
      padding: 10px;
    }
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      background-color: white;
      border-top: 1px solid #e0e0e0;
    }
    .bottom-nav ul {
      margin: 0;
    }
    .bottom-nav li a {
      color: #fff;
    }
    .bottom-nav li a.active, .bottom-nav li a.active i {
      color: #1e88e5; /* Ubah warna ikon dan teks pada item aktif */
      font-weight: bold;
    }
  </style>
</head>
<body>

  @include('user_area.partials.nav')
  @yield('content')
  @include('user_area.partials.bottom')

  <!-- Import Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
  </script>
</body>
</html>

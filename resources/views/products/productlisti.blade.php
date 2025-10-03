<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1414-TECHNOLOGY:online</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">



  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto:wght@400;700&family=Saira+Stencil+One&display=swap"
    rel="stylesheet">
    
</head>

<body id="top" class="dark_theme">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1 class="h1 logo">
        <a href="#">1414<span>TECH</span></a>
      </h1>

      <div class="navbar-actions">

        <select name="language" id="lang">
          <option value="en">En</option>
          <option value="Sw">Sw</option>
        </select>

        <button class="theme-btn" aria-label="Change Theme" title="Change Theme" data-theme-btn>
          <span class="icon"></span>
        </button>

      </div>

      <button class="nav-toggle-btn" aria-label="Toggle Menu" title="Toggle Menu" data-nav-toggle-btn>
        <span class="one"></span>
        <span class="two"></span>
        <span class="three"></span>
      </button>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link">Home.</a>
          </li>

          <li>
            <a href="#about" class="navbar-link">About.</a>
          </li>
          <li>
            <a href="#products" class="navbar-link">products.</a>
          </li>

          <li>
            <a href="#skills" class="navbar-link">Skills.</a>
          </li>

          <li>
            <a href="#portfolio" class="navbar-link">Portfolio.</a>
          </li>

          <li>
            <a href="#contact" class="navbar-link">Contact.</a>
          </li>

        </ul>
      </nav>

    </div>
  </header>
  <!-- 
    - #FOOTER
  -->

  <footer class="footer">
    <div class="container">

      <p class="h1 logo">
        <a href="#">
          1414<span>TECH</span>
        </a>
      </p>

      <p class="copyright">
        &copy; 2025<a href="#home">1414-technology</a>. All rights reserved
      </p>

    </div>
  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top title="Go to Top">
    <ion-icon name="arrow-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>

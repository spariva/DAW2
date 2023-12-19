<?php

$mostrarWarning = true;
if (isset($_COOKIE['aceptadas']) && $_COOKIE['aceptadas'] == true) {
    $mostrarWarning = false;
    setcookie('aceptadas', true, time() + (60 * 60 * 24 * 7), "/");
}else {
  if(isset($_GET['aceptadas']) && ($_GET['aceptadas']) == true){
    $mostrarWarning = false;
    setcookie('aceptadas', true, time() + (60 * 60 * 24 * 7), "/");
  }else{
    setcookie('aceptadas', false);
    $mostrarWarning = true;
  echo '<style>#pagina { filter: blur(5px); }</style>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
  <div id="pagina">
    <header id="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="d-flex align-items-center">
          <a class="textoCabecera" href="./index.php" id="logo">Parque de Atracciones </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="./cuenta.php">Cuenta</a></li>
            <li class="nav-item"><a class="nav-link" href="./verBD.php">ver BD</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="bloque" id="info">
      <h2>¿¡A qué esperas para visitarnos!?</h2>
      <p>
        Sumérgete en un mundo lleno de emociones y diversión sin límites, donde cada rincón está diseñado
        para desatar la alegría y la adrenalina. En "Aventura Mágica", nos enorgullece ofrecer experiencias
        inolvidables para visitantes de todas las edades.
      </p>
      <p>
        Descubre nuestras atracciones fascinantes que desafían la gravedad, desde montañas rusas vertiginosas
        hasta emocionantes paseos acuáticos que te harán salpicar de felicidad. Para los más pequeños,
        contamos con áreas temáticas encantadoras y atracciones diseñadas especialmente para su diversión y
        seguridad.
      </p>
      <p>
        Nuestro compromiso es crear recuerdos imborrables para toda la familia. Explora los exquisitos
        espectáculos en vivo, prueba delicias culinarias en nuestros vibrantes puestos de comida y
        participa en eventos especiales que animan cada día.
      </p>
      <p>
        En "Aventura Mágica", la diversión no tiene límites. Estamos ansiosos por compartir risas,
        emociones y momentos inolvidables contigo. ¡Prepárate para vivir la magia en cada esquina!
      </p>
      <p>
        Bienvenido a la aventura. ¡Bienvenido a "Aventura Mágica"!
      </p>
    </div>

    <div class="bloque" id="imagenes">
      <h2>Galeria de imágenes</h2>
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../img/01.jpg.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Parque en Madrid</h5>
              <p>Con una de las monatñas más altas de Europa</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../img/04.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Siente la adrenalina</h5>
              <p>Con atracciones más rapidas que tus gritos</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../img/03.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Hora del baño!</h5>
              <p>Visita nuestra nueva zona acuática</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="bloque" id="reservas">
      <h2>Reserva tu visita</h2>
      <iframe id="calendarioIframe"
        src="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23ffffff&ctz=Europe%2FMadrid&showTitle=0&showNav=0&showPrint=0&showTabs=0&showCalendars=0&showTz=0&src=ZXMuc3BhaW4jaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23009688"
        style="border-width:0" frameborder="0" scrolling="no"></iframe>
    </div>
  </div>

  <?php if($mostrarWarning==true) {?>
    <div class="bloque" id="avisoCookies">
      <b>Aviso de Cookies:</b>
      Este sitio web utiliza cookies para mejorar la experiencia del usuario, analizar el tráfico y personalizar contenido. 
      Al aceptar, consientes el uso de cookies. Puedes gestionarlas en la configuración del navegador. Utilizamos cookies esenciales, 
      de rendimiento, funcionalidad y publicidad. Compartimos datos con socios de redes sociales, publicidad y análisis. 
      Visita nuestras políticas de privacidad y cookies para más detalles. 
      <a href="index.php?aceptadas=true">Aceptar Cookies</a>
    </div>
  <?php } ?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" defer></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
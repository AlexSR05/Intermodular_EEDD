<?php
session_start(); // Esto debe ser lo primero en el archivo
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="LogoPagina.png" type="image/x-icon" />
    <link rel="stylesheet" href="../styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+Spray+Paint&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Chewy&family=Rubik+Spray+Paint&display=swap"
      rel="stylesheet"
    />
    <style>
        /* Estilos para el contenedor de información del usuario */
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: auto; /* Alinea a la derecha */
        }

        /* Estilos para el mensaje de bienvenida */
        .welcome-message {
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            opacity: 0.8;
            margin: 0;
        }

        /* Estilos para el botón de cerrar sesión */
        .logout-button {
            text-decoration: none;
            color: #ffffff;
            font-size: 14px;
            padding: 5px 10px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .logout-button:hover {
            background-color: #ffffff;
            color: #000000;
        }

        /* Estilos para el contenedor de login y registro */
        .login-register {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: auto; /* Alinea a la derecha */
        }

        /* Estilos para los botones de login y registro */
        .login-button,
        .register-button {
            text-decoration: none;
            color: #ffffff;
            font-size: 14px;
            padding: 5px 10px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .login-button:hover,
        .register-button:hover {
            background-color: #ffffff;
            color: #000000;
        }
    </style>
    <title>Bienvenido a LoopLab</title>
</head>
<body>
    <header>
      <h1>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="40"
          height="40"
          fill="currentColor"
          class="bi bi-music-note"
          viewBox="0 0 16 16"
        >
          <path
            d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2"
          />
          <path fill-rule="evenodd" d="M9 3v10H8V3z" />
          <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5z" />
        </svg>
        LoopLab
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="40"
          height="40"
          fill="currentColor"
          class="bi bi-music-note"
          viewBox="0 0 16 16"
        >
          <path
            d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2"
          />
          <path fill-rule="evenodd" d="M9 3v10H8V3z" />
          <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5z" />
        </svg>
      </h1>
    </header>
    <nav style="padding: 0px 40px;">
      <a href="#inicio">Inicio</a>
      <a href="#registro">Registro</a>
      <a href="../productos/instrumentales.php">Instrumentales</a>
      <a href="#valoraciones">Valóranos</a>
      <a href="#colaboraciones">Colaboraciones</a>
      <a href="#contacto">Contacto</a>
      <a href="../productos/cart.html">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="18"
          height="18"
          fill="currentColor"
          class="bi bi-cart"
          viewBox="0 0 16 16"
        >
          <path
            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"
          />
        </svg>
      </a>
      <?php
      if (isset($_SESSION['usuario'])) {
          echo "<div class='user-info'>";
          echo "<p class='welcome-message'>Bienvenido, " . $_SESSION['usuario'] . "!</p>";
          echo "<a class='logout-button' href='logout.php'>Cerrar Sesión</a>";
          echo "</div>";
      } else {
          echo "<div class='login-register'>";
          echo '<a class="login-button" href="login.html">Iniciar Sesión</a>';
          echo '<a class="register-button" href="registro.html">Registrarse</a>';
          echo "</div>";
      }
      ?>
    </nav>
    <div class="hero">
      <p class="hero-p">
        <span style="color: #ff826b">Explora</span>,
        <span style="color: #63aae4">obten</span> y
        <span style="color: #7afa7a">comparte</span> las mejores instrumentales
        del momento.
      </p>
    </div>
    <div class="container-div">
      <div class="container">
        <section id="inicio" class="section">
          <div>
  
          </div>
          <h2>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="18"
              height="18"
              fill="currentColor"
              class="bi bi-bullseye"
              viewBox="0 0 16 16"
            >
              <path
                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
              />
              <path
                d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12"
              />
              <path
                d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8"
              />
              <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
            </svg>
            Inicio
          </h2>
          <div>
            <div class="inicio-about-us">
            <div>
              <h3>
                Bienvenido a
                <b style="text-decoration: underline; font-family: 'Chewy', serif"
                  >LoopLab</b
                >.
              </h3>
              <p>
                En nuestra página, podrás encontrar una gran diversidad de
                instrumentales de diferentes géneros musicales a precios
                asequibles.
  
              </p>
            </div>
            <div>
              <h3>
                <b style="text-decoration: underline; font-family: 'Chewy', serif"
                  >¿Quienes somos?</b
                >
              </h3>
              <p>
                Somos un conjunto de productores musicales situados en el área de
                la Marina Baixa que quieren impulsar la carrera de productores,
                musicos y artistas locales.
              </p>
            </div>
          </div>
          <br /><br />
        </section>
  
        <section class="section">
          <p id="text-artistas">
            <b
              >Estos son algunos de los artistas del momento que han utilizado
              nuestra página:</b
            >
          </p>
          <div>
          </div>
            <div>
                <video autoplay loop muted id="video" preload="auto" height="500" width="100%" style="position: relative;">
                  <source src="media/video_intermodular.mp4">
                </video>
            </div>
          </div>
        </section>
    </div>
      <section id="valoraciones" class="section">
        <h2>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="18"
            height="18"
            fill="currentColor"
            class="bi bi-star-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
            />
          </svg>
          Valoraciones
        </h2>
        <form action="valoraciones.php" method="post">
          <p>
            <b>¡Nos encantaría saber tu opinión acerca de nuestra página!</b>
          </p>

          <label for="comentario">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="14"
              height="14"
              fill="currentColor"
              class="bi bi-arrow-down-circle-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"
              />
            </svg>
            Escribe tu valoración
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="14"
              height="14"
              fill="currentColor"
              class="bi bi-arrow-down-circle-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"
              />
            </svg> </label
          ><br /><br />
          <textarea
            id="comentario"
            name="comentario"
            rows="4"
            required
          ></textarea
          ><br /><br />

          <label for="puntuacion">Puntuación:</label><br /><br />
          <select id="puntuacion" name="puntuacion" required>
            <option value="1">⭐</option>
            <option value="2">⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="5">⭐⭐⭐⭐⭐</option></select
          ><br /><br />

          <button type="submit">Enviar Valoración</button>
        </form>
      </section>
      <section id="colaboraciones" class="section">
        <h2>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="18"
            height="18"
            fill="currentColor"
            class="bi bi-people"
            viewBox="0 0 16 16"
          >
            <path
              d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"
            />
          </svg>
          Colaboraciones
        </h2>
        <p>
          ¡Conecta con otros productores y colabora en la creación de nuevas
          instrumentales!
        </p>
      </section>
    </div>
    <footer id="contacto">
      <p>&copy; 2025 LoopLab. Todos los derechos reservados.</p>
      <div class="div-footer">
        <a href="https://www.instagram.com/" target="_blank">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-instagram"
            viewBox="0 0 16 16"
          >
            <path
              d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
            />
          </svg>
          Instragram
        </a>
        <a href="https://twitter.com/" target="_blank">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-twitter-x"
            viewBox="0 0 16 16"
          >
            <path
              d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"
            />
          </svg>
          Twitter
        </a>
        <a href="https://www.youtube.com/@prodjxice" target="_blank">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-youtube"
            viewBox="0 0 16 16"
          >
            <path
              d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"
            />
          </svg>
          YouTube
        </a>
        <a href="../contacto/contacto.html" target="_blank">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-person-rolodex"
            viewBox="0 0 16 16"
          >
            <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            <path
              d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"
            />
          </svg>
          Contáctanos</a
        >
      </div>
    </footer>
  </body>
</html>
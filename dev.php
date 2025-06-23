<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="frontend/styles.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Devtools desabilitado!</title>
  <!-- <style>
  
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    html, body {
      height: 100%;
      overflow: hidden;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: rgb(245, 249, 249);
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      user-select: none;
      -webkit-tap-highlight-color: transparent;
      flex-direction: column;
      padding: 20px;
    }
    #welcome-container {
      position: relative;
      z-index: 10;
      font-size: 2.5rem;
      font-weight: 700;
      text-align: center;
      padding: 20px 40px;
      border-radius: 15px;
      background: #ffffff;
      backdrop-filter: blur(6px);
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
      animation: pulse 0s ease-in-out infinite;
      max-width: 90vw;
      color: #333;
      text-shadow: none;
      user-select: text;
    }
    @keyframes pulse {
      0%, 100% {
        color: #333;
        text-shadow: none;
      }
      50% {
        color: #444;
        text-shadow: none;
      }
    }

    /* Canvas full screen */
    #background-canvas {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      z-index: 1; /* Canvas com z-index baixo para ficar atrás do botão */
      pointer-events: none;
      user-select: none;
      background: transparent !important;
    }

    /* Button styling as <a> tag */
    #redirect-button {
      margin-top: 25px;
      padding: 12px 36px;
      font-size: 1.25rem;
      font-weight: 700;
      color: #2980b9;
      text-decoration: none;
      background: #ecf6fc;
      border: 2.5px solid #2980b9;
      border-radius: 6px;
      box-shadow: 0 4px 12px rgba(41, 128, 185, 0.3);
      backdrop-filter: blur(6px);
      transition: all 0.3s ease;
      user-select: none;
      display: inline-block;
      cursor: pointer;
      animation: pulse 0s ease-in-out infinite;
      text-align: center;
      -webkit-tap-highlight-color: transparent;
      text-shadow: none;
      position: relative;
      z-index: 20; /* Botão com z-index maior para ficar acima do canvas */
    }
    #redirect-button:hover,
    #redirect-button:focus {
      background: #d0e6fb;
      box-shadow:
        0 0 12px rgba(41, 128, 185, 0.6);
      outline: none;
      transform: scale(1.05);
    }
    #redirect-button:active {
      transform: scale(0.95);
      box-shadow:
        0 0 6px rgba(41, 128, 185, 0.4);
      background: #b0d1f9;
    }

    /* Responsive font size */
    @media (max-width: 600px) {
      #welcome-container {
        font-size: 1.8rem;
        padding: 15px 30px;
      }
      #redirect-button {
        font-size: 1rem;
        padding: 10px 28px;
        margin-top: 18px;
      }
    } -->
  </style>
</head>
<body>
<!-- 
<div class="button-group"></div> -->
<div class="button-group">
  <div id="welcome-container" class="container" aria-label="Mensagem de boas-vindas">
   Função desabilitada pelo admin
  </div>
  <a id="redirect-button" href="./inicial.php" aria-label="Ir para próxima página">Voltar</a>
</div>

<style>
  .button-container {
    color: #000000;
    display: flex;
    justify-content: center; /* Centraliza horizontalmente */
    align-items: center; /* Centraliza verticalmente */
    height: 100vh; /* Define a altura do container como 100% da altura da tela */
  }
</style>

  <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.11.1/tsparticles.bundle.min.js"></script>
  <script>
    (function() {
      function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
      }
      const redirectParam = getQueryParam('redirect');
      const redirectButton = document.getElementById('redirect-button');
      if (redirectParam && redirectButton) {
        try {
          const decodedUrl = decodeURIComponent(redirectParam);
          redirectButton.href = decodedUrl;
        } catch (e) {
          // If decoding fails, fallback to default href
          redirectButton.href = './inicial.php';
        }
      }
    })();
    </script>
</body>
</html>

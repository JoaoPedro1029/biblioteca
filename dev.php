<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Devtools desabilitado!</title>
  <style>
    /* Reset and base styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    html, body {
      height: 100%;
      overflow: hidden;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: rgb(166, 166, 166);
      color: #000000;
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
      background: rgb(166, 166, 166);
      backdrop-filter: blur(6px);
      box-shadow: 0 0 12px rgba(0,0,0,0.15);
      animation: pulse 0s ease-in-out infinite;
      max-width: 90vw;
      color: #000000;
      text-shadow:
        0 0 3px #444444,
        0 0 6px #444444;
      user-select: text;
    }
    @keyframes pulse {
      0%, 100% {
        color: #000000;
        text-shadow:
          0 0 3px #444444,
          0 0 6px #444444;
      }
      50% {
        color: #111111;
        text-shadow:
          0 0 6px #222222,
          0 0 10px #222222;
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
      color: #000000;
      text-decoration: none;
      background: rgb(166, 166, 166);
      border: 2.5px solid rgb(166, 166, 166);
      border-radius: 15px;
      box-shadow: 0 0 8px #00000033;
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
      background: #f0f0f0;
      box-shadow:
        0 0 12px #00000066;
      outline: none;
      transform: scale(1.05);
    }
    #redirect-button:active {
      transform: scale(0.95);
      box-shadow:
        0 0 6px #00000044;
      background: #e0e0e0;
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
    }
  </style>
</head>
<body>
  <canvas id="background-canvas"></canvas>
  <div id="welcome-container" aria-label="Mensagem de boas vindas">Não foi possível abrir o Devtools</div>
  <a id="redirect-button" href="./inicial.php" aria-label="Ir para próxima página">Voltar</a>
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

    // Initialize tsParticles for animated background: floating glowing grayish white bubbles
    tsParticles.load("background-canvas", {
      fullScreen: false,
      background: {
        color: "transparent"
      },
      fpsLimit: 60,
      interactivity: {
        detectsOn: "canvas",
        events: {
          onHover: {
            enable: true,
            mode: "repulse"
          },
          resize: true
        },
        modes: {
          repulse: {
            distance: 100,
            duration: 0.4
          }
        }
      },
      particles: {
        color: {
          value: "#666666"
        },
        links: {
          enable: false
        },
        collisions: {
          enable: false
        },
        move: {
          direction: "none",
          enable: true,
          outModes: "out",
          random: true,
          speed: 1.3,
          straight: false
        },
        number: {
          density: {
            enable: true,
            area: 800
          },
          value: 55
        },
        opacity: {
          value: 0.45,
          random: {
            enable: true,
            minimumValue: 0.2
          },
          anim: {
            enable: true,
            speed: 1,
            opacity_min: 0.15,
            sync: false
          }
        },
        shape: {
          type: "circle"
        },
        size: {
          value: 3.5,
          random: {
            enable: true,
            minimumValue: 1
          },
          anim: {
            enable: true,
            speed: 3,
            size_min: 0.5,
            sync: false
          }
        }
      },
      detectRetina: true
    });
  </script>
</body>
</html>

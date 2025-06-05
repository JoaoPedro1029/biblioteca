(function () {
  const redirectUrl = "./dev.php"; // URL real

  // Função para redirecionar para a URL real
  function redirect() {
    setTimeout(function () {
      const currentUrl = encodeURIComponent(window.location.href);
      window.location.replace(redirectUrl + "?redirect=" + currentUrl);
    }, 100);
  }

  // Contador para alertas de clique direito
  let rightClickAlertCount = 0;

  // Bloqueia atalhos comuns do DevTools e View Source
  window.addEventListener("keydown", function (e) {
    if (
      e.key === "F12" ||
      (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "J" || e.key === "C")) ||
      (e.ctrlKey && e.key === "U")
    ) {
      e.preventDefault();
      redirect();
      return false;
    }
  });

  // Modificação no clique com botão direito: mostrar 3 alertas antes de redirecionar
  window.addEventListener("contextmenu", function (e) {
    e.preventDefault();

    if (rightClickAlertCount < 3) {
      alert(`Você não pode clicar com o botão direito nesta tela! Aviso ${rightClickAlertCount + 1} de 3`);
      rightClickAlertCount++;
    } else {
      redirect();
    }
    
    return false;
  });

  // Bloqueia cliques do mouse, prevenindo o comportamento padrão no botão direito
  window.addEventListener("mousedown", function (e) {
    if (e.button === 2) {
      e.preventDefault();
      // Aqui, a gente pode chamar o mesmo evento ou deixar quieto
      // Já está tratado no "contextmenu", então só previne mesmo
    }
  });

  // Detecta pelo tamanho da janela
  function detectDevToolsBySize() {
    const widthThreshold = 160;
    const heightThreshold = 160;
    const widthDiff = window.outerWidth - window.innerWidth;
    const heightDiff = window.outerHeight - window.innerHeight;
    if (widthDiff > widthThreshold || heightDiff > heightThreshold) {
      redirect();
    }
  }

  // Detecta se o console está aberto via getter
  const element = new Image();
  Object.defineProperty(element, "id", {
    get: function () {
      redirect();
    },
  });

  // Bloqueia acesso ao console
  console.log = function () {};
  console.warn = function () {};
  console.error = function () {};

  // Checa o tamanho da janela a cada segundo
  setInterval(detectDevToolsBySize, 1000);

  // Detecta se o DevTools está aberto ou se o código está sendo inspecionado
  let devToolsOpen = false;
  setInterval(function () {
    if (window.outerHeight - window.innerHeight > 100 || window.outerWidth - window.innerWidth > 100) {
      devToolsOpen = true;
    }
    if (devToolsOpen) {
      redirect();
    }
  }, 500);

  // Previne a detecção de "elemento console.log" em ambientes comuns
  Object.defineProperty(window, 'console', {
    value: {
      log: function () {},
      warn: function () {},
      error: function () {},
      info: function () {},
    },
    writable: false,
  });
})();

// Theme toggle button with Bootstrap and icons, toggles theme on click
document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.createElement('button');
    toggleButton.id = 'theme-toggle-button';
    toggleButton.type = 'button';
    toggleButton.className = 'btn btn-primary';
    toggleButton.style.position = 'fixed';
    toggleButton.style.top = '10px';
    toggleButton.style.right = '10px';
    toggleButton.style.zIndex = '1000';
    toggleButton.style.padding = '10px 15px';
    toggleButton.style.borderRadius = '5px';
    toggleButton.style.border = 'none';
    toggleButton.style.cursor = 'pointer';

    // Bootstrap icons for sun and moon
    const sunIconClass = 'bi bi-sun-fill';
    const moonIconClass = 'bi bi-moon-fill';

    const icon = document.createElement('i');
    icon.className = sunIconClass;
    toggleButton.appendChild(icon);

    document.body.appendChild(toggleButton);

    // Load saved theme or default to light
    const savedTheme = localStorage.getItem('theme') || 'light-theme';
    document.body.classList.add(savedTheme);

    // Update button icon based on current theme
    function updateButtonIcon() {
        if (document.body.classList.contains('dark-theme')) {
            icon.className = moonIconClass;
            toggleButton.title = 'Modo Escuro';
        } else {
            icon.className = sunIconClass;
            toggleButton.title = 'Modo Claro';
        }
    }
    updateButtonIcon();

    // Toggle theme on button click
    toggleButton.addEventListener('click', function () {
        if (document.body.classList.contains('dark-theme')) {
            document.body.classList.remove('dark-theme');
            document.body.classList.add('light-theme');
            localStorage.setItem('theme', 'light-theme');
        } else {
            document.body.classList.remove('light-theme');
            document.body.classList.add('dark-theme');
            localStorage.setItem('theme', 'dark-theme');
        }
        updateButtonIcon();
    });
});

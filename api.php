<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sidebar Header Main Layout</title>
<style>
    :root {
        --bg-body: #f9f9fc;
        --bg-sidebar: #19191c;
        --bg-header: #19191c;
        --bg-main: #0e1014;
        --border-color-header: #262626;
        --border-color-sidebar: #262626;
    }
* {
  margin: 0;
  padding: 0;
}

html {
  box-sizing: border-box;
  font-size: 62.5%;
  font-family: "Roboto", sans-serif;
}
*,
::after,
::before {
  box-sizing: border-box;
}
body {
  background-color: var(--bg-body, #f9f9fc);
  font-size: 1.6rem;
  line-height: 2.7rem;
  font-family: 'Roboto', sans-serif;
}
a {
  display: inline-flex;
  text-decoration: none;
}
ul {
  list-style: none;
}
button {
  border: 0;
  outline: 0;
}
img {
  width: 100%;
  height: 100%;
}
span.icon-data {
  display: flex;
}
span.icon-data svg {
  width: 1.6rem;
}
input, select {
  border: 0;
  outline: none;
}
/* Quitar estilos predeterminados para select */
select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-color: #fff;
}
/* Para dispositivos iOS */
select::-ms-expand {
  display: none;
}
select::-webkit-inner-spin-button,
select::-webkit-outer-spin-button {
  -webkit-appearance: none;
}
/* Quitar estilos predeterminados para inputs de texto, date, y otros */
input[type="text"],
input[type="search"],
input[type="date"],
input[type="email"],
input[type="password"],
textarea {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-color: #fff;
}
/* Quitar estilos predeterminados para inputs de número */
input[type="number"] {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-color: #fff;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}
.tree-wrapper::-webkit-scrollbar {
  border: none;
  width: 6px;
}
.tree-wrapper::-webkit-scrollbar-thumb {
  background: #EAEEFB;
  border-radius: 24px;
}

/* Layout principal */
.layout-container {
  display: flex;
  height: 100vh;
  transition: width 0.3s ease;
}

/* Sidebar */
.sidebar {
  width: 24rem;
  background-color: var(--bg-sidebar);
  border-right: 1px solid #333;
  color: white;
  height: 100%;
  display: flex;
  flex-direction: column;
  transition: width 0.3s ease, transform 0.3s ease;
  z-index: 1000;
}

/* Sidebar header/body/footer */
.sidebar-header {
  padding: 1rem;
  border-bottom: 1px solid #333;
}
.sidebar-body {
  flex: 1;
  overflow-y: auto;
  padding: 0.5rem;
}

.sidebar-footer {
  padding: 1rem;
  border-top: 1px solid #333;
}

/* Íconos */
.sidebar-body .icon-data {
  flex: 0 0 3.8rem;
  height: 4rem;
  display: flex;
  align-items: center;
  justify-content: center;
}
.sidebar-body a {
    color: #898989;
    width: 100%;
    transition: all 0.3s ease-in;
    font-size: 1.4rem;
    display: flex;
    align-items: center;
    height: 3rem;
    border-radius: 0.3rem;
}
.sidebar-body a:hover {
  background-color: #2d2f33;
}
.sidebar-body .text {
  flex: 1;
  white-space: nowrap;
  overflow: hidden;
  transition: opacity 0.3s ease, max-width 0.3s ease;
}

/* Sidebar colapsado */
.layout-container.collapsed .sidebar {
  width: 4.8rem;
}
.layout-container.collapsed .sidebar .sidebar-body .text {
  opacity: 0;
  max-width: 0;
}

/* Submenu styles */
.menu-item-with-submenu {
    position: relative;
    z-index: 10;
}
.menu-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    user-select: none;
}
.submenu-arrow {
    transition: all 0.3s ease;
    margin-left: auto;
    pointer-events: none;
}
.menu-item-with-submenu.open .submenu-arrow {
    transform: rotate(90deg);
}
.submenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    margin-left: 2rem;
    margin-top: 0.5rem;
    border-left: 2px solid var(--border-color-sidebar);
    padding-left: 1rem;
    position: relative;
    z-index: 5;
}
.menu-item-with-submenu.open .submenu {
    max-height: 200px;
}
.submenu li {
    margin: 0.5rem 0;
}
.sub-item-link {
    display: flex;
    align-items: center;
    padding: 0.5rem 1rem;
    color: #a0a3b1;
    font-size: 1.3rem;
    transition: all 0.3s ease;
    border-radius: 0.4rem;
    cursor: pointer;
    user-select: none;
}
.sub-item-link:hover {
    background-color: hsl(240, 3.7%, 15.9%);
    color: #d3d5de;
}
.layout-container.collapsed .submenu {
    display: none;
}

/* Contenido principal */
.content-wrapper {
  flex: 1;
  display: flex;
  flex-direction: column;
  height: 100%;
}
.header {
  background-color: var(--bg-header);
  border-bottom: 1px solid var(--border-color-header);
  height: 4.8rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 1rem;
}
.toggle-sidebar-btn {
  background-color: #f9fafb;
  border: 1px solid #e5e7eb;
  border-radius: 0.4rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0.5rem;
}
.toggle-sidebar-btn:hover {
  background-color: #e5e7eb;
}
.main-content {
  flex: 1;
  background-color: var(--bg-main);
  overflow-y: auto;
  padding: 1rem;
}

/* Overlay móvil */
.overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  z-index: 999;
  opacity: 0;
  transition: opacity 0.3s ease;
}
.overlay.active {
  display: block;
  opacity: 1;
}

/* Tablet ≤768px: sidebar colapsable */
@media (max-width: 768px) {
    .sidebar {
        width: 4.8rem;
    }
    .layout-container.collapsed .sidebar {
        width: 4.8rem;
    }
}

/* Mobile ≤480px: sidebar fixed */
@media (max-width: 480px) {
  .layout-container {
    flex-direction: column;
    position: relative;
  }
  .layout-container.collapsed .sidebar {
    width: 24rem;
  }
  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 24rem;
    transform: translateX(-100%);
    transition: transform 0.3s ease;
  }
  .sidebar.active {
    transform: translateX(0);
  }
  .overlay.active {
    display: block;
    opacity: 1;
  }
  .content-wrapper {
    transition: margin-left 0.3s ease;
  }
  .sidebar.active ~ .content-wrapper {
    margin-left: 0;
  }
}
</style>
<script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<div class="layout-container">
  <aside class="sidebar">
    <div class="sidebar-header">
      <h2>Menu</h2>
    </div>
    <div class="sidebar-body">
      <ul>
        <li>
          <a href="#">
            <span class="icon-data"><i data-feather="grid"></i></span>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="menu-item-with-submenu">
            <a href="#" class="menu-toggle">
              <span class="icon-data"><i data-feather="user"></i></span>
              <span class="text">Users</span>
              <span class="icon-data submenu-arrow">
                <i data-feather="chevron-down"></i>
              </span>
            </a>
            <ul class="submenu">
              <li>
                  <a href="#" class="sub-item-link">
                      <span>User List</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="sub-item-link">
                      <span>Add User</span>
                  </a>
              </li>
              <li>
                  <a href="#" class="sub-item-link">
                      <span>User Roles</span>
                  </a>
              </li>
            </ul>
        </li>
        <li>
          <a href="#">
            <span class="icon-data"><i data-feather="settings"></i></span>
            <span class="text">Settings</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidebar-footer">
      <h2>Footer</h2>
    </div>
  </aside>

  <div class="content-wrapper">
    <header class="header">
      Contenido del header
      <button class="toggle-sidebar-btn" onclick="toggleSidebar()">☰</button>
    </header>
    <main class="main-content">
      <p>Contenido principal...</p>
      <p>Agrega tu contenido aquí.</p>
    </main>
  </div>
</div>

<div class="overlay" onclick="toggleSidebar()"></div>

<script>
  feather.replace();

  function toggleSidebar() {
    const layoutContainer = document.querySelector('.layout-container');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.overlay');
    const isMobile = window.innerWidth <= 480;

    if (isMobile) {
      sidebar.classList.toggle('active');
      overlay.classList.toggle('active');
      layoutContainer.classList.remove('collapsed');
    } else {
      layoutContainer.classList.toggle('collapsed');
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    }
  }

  // Submenu toggle
  document.addEventListener('click', (e) => {
    const toggle = e.target.closest('.menu-toggle');
    if (toggle) {
      e.preventDefault();
      const current = toggle.closest('.menu-item-with-submenu');
      if (current) {
        document.querySelectorAll('.menu-item-with-submenu.open').forEach(li => {
          if (li !== current) li.classList.remove('open');
        });
        current.classList.toggle('open');
      }
    }
  });

  // Ocultar overlay y sidebar si redimensionamos
  window.addEventListener('resize', () => {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.overlay');
    const layoutContainer = document.querySelector('.layout-container');
    if (window.innerWidth > 480) {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    } else {
      layoutContainer.classList.remove('collapsed');
    }
  });
</script>
</body>
</html>
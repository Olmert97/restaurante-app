<?php
function encabezado($title) {
$html = '';
$html.='<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="RESTAURANTE - Sistema de Gestión">
<meta name="author" content="RESTAURANTE">
<title>'.$title.'</title>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Remix Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Animate.css para animaciones -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<!-- Perfect Scrollbar -->
<link href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/css/perfect-scrollbar.css" rel="stylesheet">

<style>
:root {
--sidebar-width: 300px;
--sidebar-bg: linear-gradient(180deg, #ffffff 0%, #f8f9ff 100%);
--sidebar-hover: #e8ecff;
--sidebar-active: #080a88;
--sidebar-active-bg: #eef0ff;
--text-primary: #1e293b;
--text-secondary: #64748b;
--border-color: #e2e8f0;
--shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
--shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04);
}

body {
font-family: \'Poppins\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', sans-serif;
background-color: #f1f5f9;
color: var(--text-primary);
}

/* Sidebar Moderno */
.sidebar {
position: fixed;
top: 0;
left: 0;
z-index: 1000;
width: var(--sidebar-width);
height: 100vh;
overflow-y: auto;
background: var(--sidebar-bg);
border-right: 1px solid var(--border-color);
transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
box-shadow: var(--shadow-medium);
}

.sidebar-brand {
display: flex;
align-items: center;
padding: 1.5rem 1.5rem;
border-bottom: 1px solid var(--border-color);
background: linear-gradient(135deg, #f0f0f0 0%, #712ab9 100%);
margin-bottom: 0.5rem;
}

.sidebar-brand img {
height: 45px;
margin-right: 12px;
filter: brightness(0) invert(1);
border-radius: 8px;
}

.sidebar-brand span {
color: #fff;
font-size: 1.35rem;
font-weight: 700;
letter-spacing: 0.5px;
}

/* Nav Links Mejorados */
.sidebar .nav-link {
color: var(--text-secondary);
padding: 0.875rem 1.5rem;
font-weight: 500;
font-size: 0.925rem;
border-left: 4px solid transparent;
transition: all 0.25s ease;
display: flex;
align-items: center;
margin: 0.25rem 0.5rem;
border-radius: 12px;
position: relative;
overflow: hidden;
}

.sidebar .nav-link::before {
content: \'\';
position: absolute;
left: 0;
top: 0;
width: 4px;
height: 100%;
background: var(--sidebar-active);
transform: scaleY(0);
transition: transform 0.25s ease;
}

.sidebar .nav-link:hover {
color: var(--sidebar-active);
background-color: var(--sidebar-hover);
transform: translateX(5px);
}

.sidebar .nav-link:hover::before {
transform: scaleY(1);
}

.sidebar .nav-link.active {
color: #fff;
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.sidebar .nav-link.active::before {
transform: scaleY(1);
}

.sidebar .nav-link i {
margin-right: 12px;
font-size: 1.25rem;
min-width: 24px;
}


/* Submenu con Animación */
.sidebar .submenu {
background: linear-gradient(180deg, #fafbff 0%, #f5f7ff 100%);
padding: 0.5rem 0;
margin: 0.25rem 0.75rem;
border-radius: 12px;
border: 1px solid var(--border-color);
}

.sidebar .submenu a {
color: var(--text-secondary);
padding: 0.625rem 1.5rem 0.625rem 3.5rem;
font-size: 0.85rem;
display: block;
text-decoration: none;
transition: all 0.2s ease;
border-radius: 8px;
margin: 0.125rem 0.5rem;
}

.sidebar .submenu a:hover {
color: var(--sidebar-active);
background-color: var(--sidebar-active-bg);
padding-left: 3.75rem;
}

/* Iconos con Gradiente */
.sidebar .nav-link i {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
background-clip: text;
}

.sidebar .nav-link.active i {
-webkit-text-fill-color: #fff;
}

/* Main Content */
.main-content {
margin-left: var(--sidebar-width);
min-height: 100vh;
transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Topbar Mejorado */
.topbar {
background: #fff;
border-bottom: 1px solid var(--border-color);
padding: 1rem 2rem;
position: sticky;
top: 0;
z-index: 999;
box-shadow: var(--shadow-soft);
backdrop-filter: blur(10px);
}

/* Toggle Button */
.sidebar-toggle {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
border: none;
color: #fff;
font-size: 1.25rem;
cursor: pointer;
padding: 0.625rem;
border-radius: 10px;
transition: all 0.2s ease;
box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.sidebar-toggle:hover {
transform: scale(1.05);
box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
}

/* Content Area */
.content-area {
padding: 2rem;
}

/* Cards con Sombra Suave */
.card {
border: none;
border-radius: 16px;
box-shadow: var(--shadow-soft);
transition: all 0.3s ease;
background: #fff;
}

.card:hover {
box-shadow: var(--shadow-medium);
transform: translateY(-2px);
}

/* Botones Modernos */
.btn {
border-radius: 10px;
font-weight: 600;
padding: 0.625rem 1.5rem;
transition: all 0.2s ease;
}

.btn:hover {
transform: translateY(-1px);
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Dropdown Mejorado */
.dropdown-menu {
border: none;
border-radius: 16px;
box-shadow: var(--shadow-medium);
padding: 0.75rem;
}

.dropdown-item {
border-radius: 8px;
padding: 0.625rem 1rem;
transition: all 0.2s ease;
}

.dropdown-item:hover {
background: var(--sidebar-hover);
}

/* Scrollbar Personalizado */
.sidebar::-webkit-scrollbar {
width: 6px;
}

.sidebar::-webkit-scrollbar-track {
background: #f1f5f9;
border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb {
background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
background: linear-gradient(180deg, #5a67d8 0%, #6b46c1 100%);
}

/* Responsive */
@media (max-width: 768px) {
.sidebar {
transform: translateX(-100%);
}
.sidebar.show {
transform: translateX(0);
box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
}
.main-content {
margin-left: 0;
}
}

/* Animación de Entrada */
@keyframes slideIn {
from {
opacity: 0;
transform: translateX(-20px);
}
to {
opacity: 1;
transform: translateX(0);
}
}

.sidebar .nav-item {
animation: slideIn 0.3s ease forwards;
}

.sidebar .nav-item:nth-child(1) { animation-delay: 0.05s; }
.sidebar .nav-item:nth-child(2) { animation-delay: 0.1s; }
.sidebar .nav-item:nth-child(3) { animation-delay: 0.15s; }
.sidebar .nav-item:nth-child(4) { animation-delay: 0.2s; }
.sidebar .nav-item:nth-child(5) { animation-delay: 0.25s; }
.sidebar .nav-item:nth-child(6) { animation-delay: 0.3s; }
.sidebar .nav-item:nth-child(7) { animation-delay: 0.35s; }
.sidebar .nav-item:nth-child(8) { animation-delay: 0.4s; }
.sidebar .nav-item:nth-child(9) { animation-delay: 0.45s; }
.sidebar .nav-item:nth-child(10) { animation-delay: 0.5s; }

/* Tooltip personalizado */
.tooltip-custom {
position: relative;
}

.tooltip-custom::after {
content: attr(data-tooltip);
position: absolute;
left: 100%;
top: 50%;
transform: translateY(-50%);
background: #1e293b;
color: #fff;
padding: 0.5rem 1rem;
border-radius: 8px;
font-size: 0.8rem;
white-space: nowrap;
opacity: 0;
visibility: hidden;
transition: all 0.2s ease;
margin-left: 10px;
z-index: 1001;
}

.tooltip-custom:hover::after {
opacity: 1;
visibility: visible;
}
</style>

<!-- SweetAlert2 -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<!-- Toastify para notificaciones -->
<link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
</head>
<body>';
echo $html;
}

function piePagina() {
echo <<<EOT
</div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Perfect Scrollbar -->
<script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/dist/perfect-scrollbar.min.js"></script>

<!-- Toastify -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- Scripts Personalizados -->
<script src="../js/funciones.js"></script>
<script src="../js/btn.js"></script>

<script>
// Inicializar Perfect Scrollbar
const sidebar = document.querySelector(\'.sidebar\');
if (sidebar) {
const ps = new PerfectScrollbar(sidebar, {
wheelSpeed: 2,
wheelPropagation: true,
minScrollbarLength: 40
});
}

// Toggle Sidebar con Animación
function toggleSidebar() {
const sidebarEl = document.querySelector(\'.sidebar\');
const mainContent = document.querySelector(\'.main-content\');
sidebarEl.classList.toggle(\'show\');

// Animación de overlay en móvil
if (window.innerWidth <= 768) {
if (sidebarEl.classList.contains(\'show\')) {
const overlay = document.createElement(\'div\');
overlay.className = \'sidebar-overlay\';
overlay.style.cssText = \'position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.3);z-index:999;backdrop-filter:blur(2px);\';
overlay.onclick = toggleSidebar;
document.body.appendChild(overlay);
} else {
const overlay = document.querySelector(\'.sidebar-overlay\');
if (overlay) overlay.remove();
}
}
}

// Active Link con Efecto Ripple
document.querySelectorAll(\'.sidebar .nav-link\').forEach(link => {
link.addEventListener(\'click\', function(e) {
// Remover active de todos
document.querySelectorAll(\'.sidebar .nav-link\').forEach(l => l.classList.remove(\'active\'));
// Agregar active al actual
this.classList.add(\'active\');

// Efecto ripple
const ripple = document.createElement(\'span\');
ripple.style.cssText = \'position:absolute;border-radius:50%;background:rgba(255,255,255,0.3);transform:scale(0);animation:ripple 0.6s linear;pointer-events:none;\';
this.appendChild(ripple);

const rect = this.getBoundingClientRect();
const size = Math.max(rect.width, rect.height);
ripple.style.width = ripple.style.height = size + \'px\';
ripple.style.left = (e.clientX - rect.left - size/2) + \'px\';
ripple.style.top = (e.clientY - rect.top - size/2) + \'px\';

setTimeout(() => ripple.remove(), 600);
});
});

// Animación Ripple
const style = document.createElement(\'style\');
style.textContent = `
@keyframes ripple {
to {
transform: scale(4);
opacity: 0;
}
}
`;
document.head.appendChild(style);

// Notificación de Bienvenida
Toastify({
text: "¡Bienvenido al Sistema de Gestión!",
duration: 3000,
gravity: "top",
position: "right",
style: {
background: "linear-gradient(135deg, #667eea 0%, #764ba2 100%)",
borderRadius: "10px",
fontFamily: "Poppins"
}
}).showToast();

// Cerrar submenús al hacer click fuera
document.addEventListener(\'click\', function(e) {
if (!e.target.closest(\'.sidebar\')) {
document.querySelectorAll(\'.sidebar .collapse\').forEach(collapse => {
const bsCollapse = new bootstrap.Collapse(collapse, {toggle: false});
bsCollapse.hide();
});
}
});

// Indicador de carga en enlaces
document.querySelectorAll(\'.sidebar .nav-link, .sidebar .submenu a\').forEach(link => {
link.addEventListener(\'click\', function(e) {
if (this.getAttribute(\'href\') === \'#\' || this.getAttribute(\'href\').startsWith(\'#\')) {
// No mostrar loading para enlaces internos
return;
}
// Aquí puedes agregar lógica de loading si navegas a otra página
});
});
</script>
</body>
</html>
EOT;
}

function menuPrincipal() {
echo <<<EOT
<!-- Sidebar Moderno -->
<nav class="sidebar" id="sidebar">
<div class="sidebar-brand">
<img src="../img/logo2.png" alt="RESTAURANTE">
</div>

<ul class="nav flex-column">
<li class="nav-item">
<a class="nav-link active" href="#" onclick="frm_inicio()">
<i class="ri-home-5-line"></i>
<span>Inicio</span>
</a>
</li>

<!-- Autenticación / Permisos -->
<li class="nav-item">
<a class="nav-link" href="#auth-collapse" data-bs-toggle="collapse" aria-expanded="false">
<i class="ri-shield-keyhole-line"></i>
<span>Autenticación</span>
<i class="ri-arrow-down-s-line ms-auto"></i>
</a>
<div class="collapse submenu" id="auth-collapse">
<a href="#" onclick="frm_gestion()"><i class="ri-user-settings-line"></i> Gestionar Permisos</a>
<a href="#" onclick="frm_roles()"><i class="ri-badge-line"></i> Roles y Accesos</a>
</div>
</li>

<!-- Empleados -->
<li class="nav-item">
<a class="nav-link" href="#empleados-collapse" data-bs-toggle="collapse" aria-expanded="false">
<i class="ri-team-line"></i>
<span>Empleados</span>
<i class="ri-arrow-down-s-line ms-auto"></i>
</a>
<div class="collapse submenu" id="empleados-collapse">
<a href="#" onclick="formulario_gestionEmpleado()"><i class="ri-user-add-line"></i> Gestionar Empleados</a>
<a href="#" onclick="frm_comisiones()"><i class="ri-money-dollar-circle-line"></i> Consultar Comisiones</a>
</div>
</li>

<!-- Menú -->
<li class="nav-item">
<a class="nav-link" href="#menu-collapse" data-bs-toggle="collapse" aria-expanded="false">
<i class="ri-restaurant-2-line"></i>
<span>Menú</span>
<i class="ri-arrow-down-s-line ms-auto"></i>
</a>
<div class="collapse submenu" id="menu-collapse">
<a href="#" onclick="frm_administrarMenu()"><i class="ri-edit-line"></i> Administrar Menú</a>
<a href="#" onclick="frm_categorias()"><i class="ri-layout-grid-line"></i> Categorías</a>
</div>
</li>

<!-- Mesas -->
<li class="nav-item">
<a class="nav-link" href="#mesas-collapse" data-bs-toggle="collapse" aria-expanded="false">
<i class="ri-table-line"></i>
<span>Mesas</span>
<i class="ri-arrow-down-s-line ms-auto"></i>
</a>
<div class="collapse submenu" id="mesas-collapse">
<a href="#" onclick="frm_asignarMesas()"><i class="ri-user-follow-line"></i> Asignar a Meseros</a>
<a href="#" onclick="frm_limpiezaMesa()"><i class="ri-sparkling-line"></i> Confirmar Limpieza</a>
</div>
</li>

<!-- Pedidos -->
<li class="nav-item">
<a class="nav-link" href="#pedidos-collapse" data-bs-toggle="collapse" aria-expanded="false">
<i class="ri-clipboard-line"></i>
<span>Pedidos</span>
<i class="ri-arrow-down-s-line ms-auto"></i>
</a>
<div class="collapse submenu" id="pedidos-collapse">
<a href="pedidos.php" onclick="frm_tomarPedido()"><i class="ri-pencil-line"></i> Tomar Pedido</a>
<a href="#" onclick="frm_prepararPedido()"><i class="ri-cooking-line"></i> Preparar Pedido</a>
<a href="#" onclick="frm_cancelarPedido()"><i class="ri-close-circle-line"></i> Cancelar Pedido</a>
</div>
</li>

<!-- Facturación -->
<li class="nav-item">
<a class="nav-link" href="#facturacion-collapse" data-bs-toggle="collapse" aria-expanded="false">
<i class="ri-bill-line"></i>
<span>Facturación</span>
<i class="ri-arrow-down-s-line ms-auto"></i>
</a>
<div class="collapse submenu" id="facturacion-collapse">
<a href="#" onclick="frm_cerrarCuenta()"><i class="ri-wallet-line"></i> Cerrar Cuenta / Cobrar</a>
<a href="#" onclick="frm_descuento()"><i class="ri-percent-line"></i> Aplicar Descuento</a>
<a href="#" onclick="frm_cierreCaja()"><i class="ri-safe-2-line"></i> Cierre de Caja</a>
</div>
</li>

<!-- Inventario -->
<li class="nav-item">
<a class="nav-link" href="#inventario-collapse" data-bs-toggle="collapse" aria-expanded="false">
<i class="ri-stack-line"></i>
<span>Inventario</span>
<i class="ri-arrow-down-s-line ms-auto"></i>
</a>
<div class="collapse submenu" id="inventario-collapse">
<a href="#" onclick="frm_movimientoInventario()"><i class="ri-exchange-line"></i> Registrar Movimiento</a>
<a href="#" onclick="frm_stock()"><i class="ri-database-2-line"></i> Ver Stock</a>
</div>
</li>

<!-- Reportes y Estadísticas -->
<li class="nav-item mt-3">
<a class="nav-link" href="#reportes-collapse" data-bs-toggle="collapse" aria-expanded="false">
<i class="ri-bar-chart-box-line"></i>
<span>Reportes y Estadísticas</span>
<i class="ri-arrow-down-s-line ms-auto"></i>
</a>
<div class="collapse submenu" id="reportes-collapse">
<a href="#" onclick="frm_estaditica()"><i class="ri-file-chart-line"></i> Generar Reportes</a>
<a href="#" onclick="frm_analisis()"><i class="ri-pie-chart-line"></i> Análisis de Ventas</a>
</div>
</li>

<!-- Cerrar Sesión -->
<li class="nav-item mt-4 border-top pt-3" style="border-color: #e2e8f0 !important;">
<a class="nav-link" href="../login.php" style="color: #ef4444 !important;">
<i class="ri-logout-box-r-line" style="background: linear-gradient(135deg, #ef4444 0%, #f87171 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
<span>Cerrar Sesión</span>
</a>
</li>
</ul>
</nav>

<!-- Main Content -->
<div class="main-content">
<!-- Topbar -->
<div class="topbar d-flex justify-content-between align-items-center">
<button class="sidebar-toggle d-md-none" onclick="toggleSidebar()">
<i class="ri-menu-2-line"></i>
</button>

<div class="d-flex align-items-center ms-auto">
<div class="me-4">
</div>

<span class="text-muted me-3">
<i class="ri-user-circle-line" style="font-size: 1.5rem; vertical-align: middle;"></i>
<span id="user-name" class="ms-2 fw-600">Administrador</span>
</span>

<div class="dropdown">
<button class="btn btn-link text-decoration-none dropdown-toggle p-0" data-bs-toggle="dropdown">
<img src="https://ui-avatars.com/api/?name=Administrador&background=667eea&color=fff&size=128&bold=true" alt="User" class="rounded-circle" width="40" height="40" style="border: 2px solid #667eea;">
</button>
<ul class="dropdown-menu dropdown-menu-end">
<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item text-danger" href="../login.php"><i class="ri-logout-box-r-line me-2"></i>Cerrar Sesión</a></li>
</ul>
</div>
</div>
</div>

<!-- Content Area -->
<div class="content-area" id="contenedor">
EOT;
}
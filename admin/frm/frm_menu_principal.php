<?php
session_start();
if($_SESSION["correo"] != "" && $_SESSION["tiempo"] != "" ){
    if(!((time() - $_SESSION['tiempo'])>3000)){
        include_once '../funciones/funciones.php';
        encabezado("Dashboard - Restaurante");
        menuPrincipal();
        ?>

<!-- Remix Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    :root {
        --primary: #667eea;
        --secondary: #764ba2;
    }
    
    body {
        background: #f8fafc;
    }
    
    .stat-card {
        background: white;
        border-radius: 8px;
        padding: 1.25rem;
        border: 1px solid #e2e8f0;
        transition: all 0.2s ease;
    }
    
    .stat-card:hover {
        border-color: #cbd5e1;
    }
    
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 0.75rem;
        color: #64748b;
        background: #f1f5f9;
    }
    
    .stat-value {
        font-size: 1.75rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.25rem;
    }
    
    .stat-label {
        color: #64748b;
        font-size: 0.875rem;
    }
    
    .chart-card {
        background: white;
        border-radius: 8px;
        padding: 1.25rem;
        border: 1px solid #e2e8f0;
        margin-bottom: 1.5rem;
    }
    
    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .chart-title {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin: 0;
    }
    
    .menu-item {
        display: flex;
        align-items: center;
        padding: 0.875rem;
        background: #f8fafc;
        border-radius: 8px;
        margin-bottom: 0.625rem;
        border: 1px solid #f1f5f9;
    }
    
    .menu-item img {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        object-fit: cover;
        margin-right: 0.875rem;
    }
    
    .menu-item-info h6 {
        margin: 0;
        font-weight: 600;
        color: #1e293b;
        font-size: 0.9rem;
    }
    
    .menu-item-info small {
        color: #64748b;
        font-size: 0.8rem;
    }
    
    .menu-item-sales {
        margin-left: auto;
        text-align: right;
    }
    
    .sales-count {
        font-weight: 600;
        color: #667eea;
        font-size: 1rem;
    }
    
    .badge-trend {
        padding: 0.25rem 0.625rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .trend-up {
        background: #f0fdf4;
        color: #166534;
    }
    
    .trend-down {
        background: #fef2f2;
        color: #991b1b;
    }
    
    .customer-review {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        border: 1px solid #e2e8f0;
    }
    
    .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    
    .review-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 0.75rem;
        object-fit: cover;
    }
    
    .review-stars {
        color: #fbbf24;
        margin-left: auto;
        font-size: 0.875rem;
    }
    
    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 1.25rem;
    }
</style>

<div class="container-fluid py-4" id="contenedor">
    <!-- Header -->
    <!-- Estadísticas Principales -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="ri-money-dollar-circle-line"></i>
                </div>
                <div class="stat-value">$24,520</div>
                <div class="stat-label">Ventas Totales</div>
                <span class="badge-trend trend-up mt-2 d-inline-block">
                    <i class="ri-arrow-up-s-line"></i> +12.5%
                </span>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="ri-file-list-3-line"></i>
                </div>
                <div class="stat-value">415</div>
                <div class="stat-label">Total Pedidos</div>
                <span class="badge-trend trend-up mt-2 d-inline-block">
                    <i class="ri-arrow-up-s-line"></i> +8.2%
                </span>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="ri-user-line"></i>
                </div>
                <div class="stat-value">985</div>
                <div class="stat-label">Clientes</div>
                <span class="badge-trend trend-up mt-2 d-inline-block">
                    <i class="ri-arrow-up-s-line"></i> +15.3%
                </span>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="ri-layout-grid-line"></i>
                </div>
                <div class="stat-value">325</div>
                <div class="stat-label">Mesas Activas</div>
                <span class="badge-trend trend-down mt-2 d-inline-block">
                    <i class="ri-arrow-down-s-line"></i> -2.1%
                </span>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="chart-card">
                <div class="chart-header">
                    <h5 class="chart-title">Ingresos Mensuales</h5>
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option>Este Año</option>
                        <option>Año Pasado</option>
                    </select>
                </div>
                <canvas id="revenueChart" height="100"></canvas>
            </div>
            
            <div class="chart-card">
                <div class="chart-header">
                    <h5 class="chart-title">Productos Más Vendidos</h5>
                </div>
                
                <div class="menu-item">
                    <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=150" alt="Hamburguesa">
                    <div class="menu-item-info">
                        <h6>Hamburguesa Clásica</h6>
                        <small>$12.99 • 158 ventas</small>
                    </div>
                    <div class="menu-item-sales">
                        <div class="sales-count">158</div>
                    </div>
                </div>
                
                <div class="menu-item">
                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=150" alt="Pizza">
                    <div class="menu-item-info">
                        <h6>Pizza Pepperoni</h6>
                        <small>$15.99 • 124 ventas</small>
                    </div>
                    <div class="menu-item-sales">
                        <div class="sales-count">124</div>
                    </div>
                </div>
                
                <div class="menu-item">
                    <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?w=150" alt="Tacos">
                    <div class="menu-item-info">
                        <h6>Tacos al Pastor</h6>
                        <small>$9.99 • 98 ventas</small>
                    </div>
                    <div class="menu-item-sales">
                        <div class="sales-count">98</div>
                    </div>
                </div>
                
                <div class="menu-item">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=150" alt="Ensalada">
                    <div class="menu-item-info">
                        <h6>Ensalada César</h6>
                        <small>$8.99 • 76 ventas</small>
                    </div>
                    <div class="menu-item-sales">
                        <div class="sales-count">76</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="chart-card">
                <div class="chart-header">
                    <h5 class="chart-title">Distribución de Ventas</h5>
                </div>
                <canvas id="salesChart" height="220"></canvas>
            </div>
            
            <div class="chart-card">
                <div class="chart-header">
                    <h5 class="chart-title">Reseñas Recientes</h5>
                </div>
                
                <div class="customer-review">
                    <div class="review-header">
                        <img src="https://i.pravatar.cc/150?img=1" alt="Cliente" class="review-avatar">
                        <div>
                            <strong>María García</strong><br>
                            <small class="text-muted">Hace 2 horas</small>
                        </div>
                        <div class="review-stars">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <p class="mb-0 text-muted" style="font-size: 0.875rem;">"Excelente servicio y la comida estaba deliciosa."</p>
                </div>
                
                <div class="customer-review">
                    <div class="review-header">
                        <img src="https://i.pravatar.cc/150?img=3" alt="Cliente" class="review-avatar">
                        <div>
                            <strong>Carlos López</strong><br>
                            <small class="text-muted">Hace 5 horas</small>
                        </div>
                        <div class="review-stars">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-line"></i>
                        </div>
                    </div>
                    <p class="mb-0 text-muted" style="font-size: 0.875rem;">"Muy buen ambiente, aunque la espera fue larga."</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Gráfico de Ingresos
const revenueCtx = document.getElementById('revenueChart').getContext('2d');

new Chart(revenueCtx, {
    type: 'line',
    data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        datasets: [{
            label: 'Ingresos',
            data: [18500, 21000, 19500, 24000, 26500, 28000, 31000, 29500, 33000, 35500, 38000, 42000],
            borderColor: '#667eea',
            backgroundColor: 'transparent',
            borderWidth: 2,
            fill: false,
            tension: 0.4,
            pointBackgroundColor: '#fff',
            pointBorderColor: '#667eea',
            pointBorderWidth: 2,
            pointRadius: 4,
            pointHoverRadius: 6
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#f1f5f9',
                    drawBorder: false
                },
                ticks: {
                    callback: function(value) {
                        return '$' + value / 1000 + 'k';
                    }
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// Gráfico de Distribución
const salesCtx = document.getElementById('salesChart').getContext('2d');
new Chart(salesCtx, {
    type: 'doughnut',
    data: {
        labels: ['Comidas', 'Bebidas', 'Postres', 'Entradas'],
        datasets: [{
            data: [45, 25, 20, 10],
            backgroundColor: [
                '#667eea',
                '#56ab2f',
                '#f093fb',
                '#4facfe'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        cutout: '75%',
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 12,
                    usePointStyle: true,
                    pointStyle: 'circle',
                    font: {
                        size: 11
                    }
                }
            }
        }
    }
});
</script>

        <?php
        piePagina();
    } else {
        session_destroy();
        header('Location: ../login.php');
        exit;
    }    
} else {
    session_destroy();
    header('Location: ../login.php');
    exit;
}
?>
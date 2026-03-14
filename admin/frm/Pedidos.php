<?php
// conexion.php (Asegúrate de tener este archivo con tu conexión PDO)
// include 'conexion.php'; 

// Simulación de datos (En producción vendrán de tu base de datos dbRestauranteApp)
$productos = [
    ['id' => 1, 'nombre' => 'Pizza Margherita', 'precio' => 12.50, 'categoria' => 'Comida'],
    ['id' => 2, 'nombre' => 'Hamburguesa Clásica', 'precio' => 8.75, 'categoria' => 'Comida'],
    ['id' => 3, 'nombre' => 'Refresco 500ml', 'precio' => 2.00, 'categoria' => 'Bebida'],
];

$mesas = [1, 2, 3, 4, 5];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomar Pedido - Restaurante App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --primary: #667eea; --secondary: #764ba2; }
        body { background: #f8fafc; font-family: 'Inter', sans-serif; }
        
        /* Estilos que proporcionaste */
        .chart-card { background: white; border-radius: 8px; padding: 1.25rem; border: 1px solid #e2e8f0; margin-bottom: 1.5rem; }
        .chart-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid #f1f5f9; }
        .chart-title { font-size: 1rem; font-weight: 600; color: #1e293b; margin: 0; }
        
        .menu-item { display: flex; align-items: center; padding: 0.875rem; background: #f8fafc; border-radius: 8px; margin-bottom: 0.625rem; border: 1px solid #f1f5f9; cursor: pointer; transition: 0.2s; }
        .menu-item:hover { background: #eff6ff; border-color: var(--primary); }
        
        .menu-item-info h6 { margin: 0; font-weight: 600; color: #1e293b; font-size: 0.9rem; }
        .menu-item-info small { color: #64748b; font-size: 0.8rem; }
        .sales-count { font-weight: 600; color: #667eea; font-size: 1rem; margin-left: auto; }

        .btn-primary-custom { background: var(--primary); border: none; color: white; padding: 10px 20px; border-radius: 6px; font-weight: 600; width: 100%; }
        .order-summary { position: sticky; top: 20px; }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="section-title">Nuevo Pedido</h2>
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Seleccionar Productos</h3>
                    <select class="form-select form-select-sm" style="width: 150px;">
                        <option>Todas las Categorías</option>
                    </select>
                </div>
                
                <div class="row">
                    <?php foreach ($productos as $prod): ?>
                    <div class="col-md-6">
                        <div class="menu-item" onclick="agregarAlPedido('<?= $prod['nombre'] ?>', <?= $prod['precio'] ?>, <?= $prod['id'] ?>)">
                            <div class="menu-item-info">
                                <h6><?= $prod['nombre'] ?></h6>
                                <small><?= $prod['categoria'] ?></small>
                            </div>
                            <div class="sales-count">$<?= number_format($prod['precio'], 2) ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="order-summary">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">Detalle del Pedido</h3>
                    </div>

                    <form action="procesar_pedido.php" method="POST">
                        <div class="mb-3">
                            <label class="stat-label">Seleccionar Mesa</label>
                            <select name="idMesa" class="form-select" required>
                                <?php foreach ($mesas as $m): ?>
                                    <option value="<?= $m ?>">Mesa #<?= $m ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div id="lista-pedido" class="mb-3">
                            <p class="text-center text-muted small py-3">No hay productos seleccionados</p>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="stat-label">Total:</span>
                            <span class="stat-value" id="total-pedido">$0.00</span>
                        </div>

                        <button type="submit" class="btn-primary-custom">Confirmar Pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let pedido = [];
    let total = 0;

    function agregarAlPedido(nombre, precio, id) {
        pedido.push({ nombre, precio, id });
        total += precio;
        renderizarPedido();
    }

    function renderizarPedido() {
        const lista = document.getElementById('lista-pedido');
        const totalTxt = document.getElementById('total-pedido');
        
        if (pedido.length === 0) {
            lista.innerHTML = '<p class="text-center text-muted small py-3">No hay productos seleccionados</p>';
        } else {
            lista.innerHTML = pedido.map((item, index) => `
                <div class="d-flex justify-content-between align-items-center mb-2 border-bottom pb-2">
                    <div>
                        <span class="d-block small fw-bold">${item.nombre}</span>
                        <input type="hidden" name="productos[]" value="${item.id}">
                    </div>
                    <span class="small text-primary fw-bold">$${item.precio.toFixed(2)}</span>
                </div>
            `).join('');
        }
        totalTxt.innerText = `$${total.toFixed(2)}`;
    }
</script>

</body>
</html>
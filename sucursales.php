<?php
session_start();
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
if (empty($_SESSION['csrf_pedidos'])) { $_SESSION['csrf_pedidos'] = bin2hex(random_bytes(16)); }
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'vaciar') {
    if (hash_equals($_SESSION['csrf_pedidos'], (string)($_POST['csrf'] ?? ''))) {
        unset($_SESSION['pedidos']);
        header('Location: sucursales.php?reiniciado=1');
        exit;
    }
    http_response_code(403);
}
$sucursales = [
 ['nombre' => 'Tegucigalpa', 'ubicacion' => 'Bulevar Morazán, Tegucigalpa, Francisco Morazán'],
 ['nombre' => 'San Pedro Sula', 'ubicacion' => 'Barrio Guamilito, San Pedro Sula, Cortés'],
 ['nombre' => 'La Ceiba', 'ubicacion' => 'La Ceiba, Atlántida']
];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sucursales | Pizzería Bella Napoli</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color: #fbf6ea; }
            .navbar { background-color: #9c2b23; }
            .btn-ordenar { background-color: #9c2b23; color: white; }
            .btn-ordenar:hover { background-color: #7d1f19; color: white; }
            .titulo { border-bottom: 3px solid #3f6b3a; display: inline-block; padding-bottom: 4px; margin-bottom: 20px; }
            .factura { background: #fff; border: 2px dashed #9c2b23; border-radius: 8px; padding: 24px; }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">Bella Napoli</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Mostrar u ocultar el menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Menú</a></li>
                        <li class="nav-item"><a class="nav-link" href="arma-pizza.php">Arma tu pizza</a></li>
                        <li class="nav-item"><a class="nav-link" href="pedido.php">Pedido</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="sucursales.php">Sucursales</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container mt-4 mb-5">
            <h1 class="titulo">Sucursales y pedidos en sesión</h1>
            <p class="lead">Conoce nuestros puntos de atención y consulta las órdenes activas registradas en este navegador.</p>
            <div class="row g-3 mb-5">
                <?php foreach ($sucursales as $sucursal): ?>
                    <div class="col-md-4"><div class="card h-100 shadow-sm"><div class="card-body"><h2 class="card-title h5"><?php echo e($sucursal['nombre']); ?></h2><p class="card-text"><?php echo e($sucursal['ubicacion']); ?></p><p class="small text-muted mb-0">Horario de cocina: lunes a jueves 11:00 a.m. – 9:00 p.m.; viernes y sábado 11:00 a.m. – 11:00 p.m.; domingo 12:00 m. – 8:00 p.m.</p></div></div></div>
                <?php endforeach; ?>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3"><h2 class="h4 mb-0">Panel gerencial · órdenes de esta sesión</h2>
                <?php if (!empty($_SESSION['pedidos'])): ?><form action="sucursales.php" method="POST" onsubmit="return confirm('¿Vaciar todas las órdenes de esta sesión?');"><input type="hidden" name="accion" value="vaciar"><input type="hidden" name="csrf" value="<?php echo e($_SESSION['csrf_pedidos']); ?>"><button type="submit" class="btn btn-outline-danger">Vaciar / Reiniciar sesión</button></form><?php endif; ?></div>
            <?php if (isset($_GET['reiniciado'])): ?><div class="alert alert-success" role="status">Las órdenes de esta sesión se reiniciaron correctamente.</div><?php endif; ?>
            <?php if (empty($_SESSION['pedidos'])): ?><div class="alert alert-info" role="status"><span class="badge bg-info text-dark me-2">Sin pedidos</span>No hay órdenes registradas durante esta sesión. <a href="pedido.php" class="alert-link">Crear pedido</a>.</div>
            <?php else: ?><div class="table-responsive"><table class="table table-striped table-hover align-middle"><thead class="table-dark"><tr><th>Folio</th><th>Cliente</th><th>Teléfono</th><th>Detalle de pizzas / productos</th><th>Cantidad</th><th>Total (L.)</th><th>Estado</th></tr></thead><tbody>
                <?php foreach ($_SESSION['pedidos'] as $orden): ?><tr><td class="fw-semibold"><?php echo e($orden['folio'] ?? '—'); ?></td><td><?php echo e($orden['cliente'] ?? '—'); ?></td><td><?php echo e($orden['telefono'] ?? '—'); ?></td><td><?php echo e($orden['detalle'] ?? '—'); ?></td><td><?php echo (int)($orden['cantidad'] ?? 0); ?></td><td class="text-nowrap">L. <?php echo number_format((float)($orden['total'] ?? 0), 2); ?></td><td><span class="badge bg-warning text-dark"><?php echo e($orden['estado'] ?? 'Pendiente'); ?></span></td></tr><?php endforeach; ?>
            </tbody></table></div>
            <p class="text-end fw-bold">Total de órdenes: <?php echo count($_SESSION['pedidos']); ?> · Venta acumulada: L. <?php echo number_format(array_sum(array_column($_SESSION['pedidos'], 'total')),2); ?></p><?php endif; ?>
            <p class="text-muted small">Los pedidos están disponibles únicamente en la sesión PHP actual. Este panel es una demostración académica y no sustituye un sistema gerencial autenticado ni persistencia en base de datos.</p>
        </main>
        <footer class="bg-dark text-light pt-4 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h2 class="h5">Bella Napoli</h2>
                        <p class="small">Pizzas al horno de leña.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h2 class="h6">Horarios de cocina</h2>
                        <p class="small">Lunes a jueves: 11:00 a.m. - 9:00 p.m.<br> Viernes y sábado: 11:00 a.m. - 11:00 p.m.<br> Domingo: 12:00 m. - 8:00 p.m.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h2 class="h6">Redes sociales</h2>
                        <p class="small">Facebook: Bella Napoli HN<br> Instagram: @bellanapoli.hn</p>
                    </div>
                </div>
                <hr>
                <p class="text-center small mb-0">&copy; <?php echo date("Y"); ?> Pizzería Bella Napoli. Todos los derechos reservados.</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

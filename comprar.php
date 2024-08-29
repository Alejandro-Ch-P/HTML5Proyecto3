<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización de Chocolates</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-image: url('https://images.template.net/218220/chocolate-brown-background-edit-online.jpg');background-size: cover;  ">

<div class="banner-content"><div class="container mt-5">
        <h1 class="text-center" style="font-size: 3em;  font-weight: 1000; ">Cotización de Productos</h1>
</div></div>
    <div class="container mt-5">
        
        <?php
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $tipo_venta = isset($_POST['tipo_venta']) ? $_POST['tipo_venta'] : 'unidad';

        
        $precio_chocolate_negro = 25;
        

        
        $cantidad_chocolate_negro = intval(isset($_POST['chocolate_amargo']) ? $_POST['chocolate_amargo'] : 0);
       
        
        $total_chocolate_negro = $cantidad_chocolate_negro * $precio_chocolate_negro;

        ?>
  <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                <h2>Datos del Cliente</h2>
                    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                    <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></p>

                    <?php if ($tipo_venta == 'mayor'): ?>
                        <p><strong>Sucursal:</strong> <?php echo htmlspecialchars($sucursal); ?></p>
                    <?php else: ?>
                        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($direccion); ?></p>
                    <?php endif; ?>

                    <h2>Resumen de Compra:</h2>
                    <ul style="margin-left: 1rem;">
                        <?php if ($cantidad_chocolate_negro > 0): ?>
                            <li>Chocolate Negro: <?php echo $cantidad_chocolate_negro . ' ' . ($tipo_venta == 'mayor' ? 'cajas' : 'unidades') . ' - Bs. ' . number_format($total_chocolate_negro, 2); ?></li>
                        <?php endif; ?>
                       
                    </ul>

                    <p style="float:right;font-size: 1.3em;"><strong>Total General:</strong> <?= number_format($total_general, 2) ?> Bs</p>
                    <br><br>
                    <a href="index.html" class="btn btn-dark" style="float:right">Volver a la tienda</a>
                </div>
            </div>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-4">
        <p>&copy; 2024 Tienda de Chocolates UCB</p>
    </footer>

</body>
</html>

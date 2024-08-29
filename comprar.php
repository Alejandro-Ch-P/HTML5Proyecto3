<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Recibo de Compra</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $products = $_POST['products']; // Recibe los productos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $total_price = 0;

    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Teléfono:</strong> $telefono</p>";
    echo "<p><strong>Correo Electrónico:</strong> $email</p>";
    echo "<p><strong>Dirección:</strong> $direccion</p>";
    echo "<hr>";

    echo "<table>";
    echo "<tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario (Bs)</th><th>Subtotal (Bs)</th></tr>";

    foreach ($products as $product_key => $product) {
        $quantity = intval($product['quantity']);
        if ($quantity > 0) {
            $name = htmlspecialchars($product['name']);
            $price_per_unit = floatval($product['price']);
            $subtotal = $quantity * $price_per_unit;

            // Aplica descuento si la cantidad es mayor a 5
            if ($quantity > 5) {
                $subtotal *= 0.9; // Descuento del 10%
            }

            $total_price += $subtotal;

            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$quantity</td>";
            echo "<td>" . number_format($price_per_unit, 2) . "</td>";
            echo "<td>" . number_format($subtotal, 2) . "</td>";
            echo "</tr>";
        }
    }

    echo "<tr>";
    echo "<td colspan='3' class='total'>Total a Pagar:</td>";
    echo "<td class='total'>" . number_format($total_price, 2) . " Bs</td>";
    echo "</tr>";
    echo "</table>";

    echo "<p>Gracias por tu compra!</p>";
} else {
    echo "<p>No se recibieron datos del formulario.</p>";
}
?>

</body>
</html>

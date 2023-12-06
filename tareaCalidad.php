<!DOCTYPE html>
<!-- Implementar de que idioma va a ser la pagina -->
<html lang="es">
    <head>
        <!-- Agregar los metadatos corespondientes y esperados para un html -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Agregar un titulo para que el usuario sepa de que es la pagina -->
        <title>Facturas</title>
    </head>
<body>
    <?php
        //agregar una validacion de las variables no obtenga valores nulos
        if (isset($_POST["np"]) && !empty($_POST["np"]) &&
            isset($_POST["cant"]) && !empty($_POST["cant"]) &&
            isset($_POST["pu"]) && !empty($_POST["pu"])) {
                function calcular_precio_con_d($pb) {
                    if ($pb > 100000) {
                        $d = $pb * 0.05;
                        $pd= $pb - $d;
                        return $pd;
                    } else {
                        return $pb;
                    }
                }
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $np = $_POST["np"];
                    $cant = $_POST["cant"];
                    $pu = $_POST["pu"];
                    $iva_p = 19;
                    $pb = $cant * $pu;
                    $pd= calcular_precio_con_d($pb);
                    $iva = $pd* ($iva_p / 100);
                    $tp = $pd+ $iva;
            }
        
            
    ?>
    <h1>Factura de compra</h1>
    <hr>
    <p><strong>Producto:</strong> <?php echo $np; ?></p>
    <p><strong>cantidad:</strong> <?php echo $cant; ?></p>
    <p><strong>Precio unitario:</strong> $<?php echo number_format($pu, 2); ?></p>
    <p><strong>Precio bruto:</strong> $<?php echo number_format($pb, 2); ?></p>
    <?php if ($pd!== $pb): ?>
    <p><strong>descuento del 5% aplicado.</strong></p>
    <?php endif; ?>
    <p><strong>IVA (<?php echo $iva_p; ?>%):</strong> $<?php echo number_format($iva, 2);?></p>
    <hr>
    <p><strong>Total a pagar:</strong> $<?php echo number_format($tp, 2); ?></p>
    <?php } ?>
</body>
</html>
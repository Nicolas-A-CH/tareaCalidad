<!DOCTYPE html>
<html>
<head>
<title> </title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$numeros = $_POST["numeros"];
$numeros_array = explode(",", $numeros);
// Convertir los elementos en números enteros y filtrar los números no negativos
$numeros_no_negativos = array();
$hay_error = false;
foreach ($numeros_array as $numero) {
$numero_entero = intval($numero);
if ($numero_entero < 0) {
$hay_error = true;
break;
}
$numeros_no_negativos[] = $numero_entero;
}
// Mostrar resultados o mensaje de error
if ($hay_error) {
echo '<h2>No se admiten números negativos. Por favor, intente nuevamente:</h2>';
echo '<form method="post" action="">';
echo '<input type="text" name="numeros" placeholder="Ejemplo: 3, 5, 8">';
echo '<input type="submit" value="Calcular">';
echo '</form>';
} elseif (count($numeros_no_negativos) > 0) {
$mayor = max($numeros_no_negativos);
$menor = min($numeros_no_negativos);
$promedio = array_sum($numeros_no_negativos) / count($numeros_no_negativos);
echo "<h2>Resultados:</h2>";
echo "Mayor: " . $mayor . "<br>";
echo "Menor: " . $menor . "<br>";
echo "Promedio: " . $promedio . "<br>";
} else {
echo "<h2>No se ingresaron números válidos</h2>";
}
} else {
echo '<h1>Ingrese una serie de números enteros no negativos separados por comas o
espacios:</h1>';
echo '<form method="post" action="">';
echo '<input type="text" name="numeros" placeholder="Ejemplo: 3, 5, 8">';
echo '<input type="submit" value="Calcular">';
echo '</form>';
}
?>
</body>
</html>
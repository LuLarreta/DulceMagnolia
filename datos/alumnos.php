<?PHP
$alumnosJSON = file_get_contents('datos/datos_alumnos.json');
$alumnos = json_decode($alumnosJSON, TRUE);
?>
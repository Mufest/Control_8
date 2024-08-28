<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Vuelos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {        
        const form = document.querySelector("form");

        // Agregar el evento de validación al enviar el formulario
        form.addEventListener("submit", function(event) {
            // Validar fecha
            const fecha = document.getElementById("fecha").value;
            const hoy = new Date().toISOString().split("T")[0];
            if (fecha < hoy) {
                alert("La fecha del vuelo no puede ser anterior a hoy.");
                event.preventDefault(); // Evitar que el formulario se envíe
                return;
            }

            // Validar que los campos numéricos sean positivos
            const plazasDisponibles = document.getElementById("plazas_disponibles").value;
            const precio = document.getElementById("precio").value;

            if (plazasDisponibles <= 0 || precio <= 0) {
                alert("Las plazas disponibles y el precio deben ser valores positivos.");
                event.preventDefault();
                return;
            }

            // Validar que los campos numéricos solo contengan números
            if (isNaN(plazasDisponibles) || isNaN(precio)) {
                alert("Por favor, ingrese valores numéricos válidos en los campos de plazas disponibles y precio.");
                event.preventDefault();
                return;
            }
        });
    });
</script>

<body>
    <h1>Agregar Vuelo</h1>
    <form action="procesar_vuelo.php" method="post">
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" required><br><br>
        
        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" required><br><br>
        
        <label for="fecha">Fecha Vuelo:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>
        
        <label for="plazas_disponibles">Plazas Disponibles:</label>
        <input type="number" id="plazas_disponibles" name="plazas_disponibles" required><br><br>
        
        <label for="precio">Precio Vuelo:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>
        
        <input type="submit" value="Agregar Vuelo">
    </form>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

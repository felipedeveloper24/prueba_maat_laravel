<!DOCTYPE html>
<html>
<head>
    <title>Usuarios Registrados por Mes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="w-100 d-flex flex-column justify-content-center align-items-center">
        <header class="encabezado w-100 p-3 d-flex justify-content-center align-items-center">
                <h1 class="white text-center mx-3">Crud de usuarios</h1>
                <a href="/"><button class="btn btn-primary">Volver a Inicio</button></a>
        </header>
            <h1 class="text-center titulo mb-2">Reporte gráfico de usuarios registrados</h1>
            <canvas class="w-50 h-50 mt-2" id="usuariosChart"></canvas>
    </div>
   

</body>
</html>

    
<script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var usuariosPorMes = <?php echo json_encode($usuariosPorMes); ?>;


            var labels = usuariosPorMes.map(function(data) {
                return data.mes;
            });

            var data = usuariosPorMes.map(function(data) {
                return data.cantidad;
            });

            var ctx = document.getElementById('usuariosChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Usuarios Registrados por Mes',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        });
    </script>
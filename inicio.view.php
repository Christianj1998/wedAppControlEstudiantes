<!DOCTYPE html>
<?php
require 'functions.php';
$permisos = ['Administrador'];
permisos($permisos);
$femenino = 'F';
$masculino = 'M';
$totalFemenino = (json_encode(getCountGenero($conn, $femenino)));
$totalMasculino = (json_encode(getCountGenero($conn, $masculino)));
$countAlumnos =    (json_encode(getCountAlumnos($conn)));

//recuperar genero para mostrarlo en el grafico

?>
<html>
<?php include 'menu.view.php'; ?>

<div class="body">
    <div class="panel">

        <?php
        if (isset($_GET['err'])) {
            echo '<h3 class="error text-center">ERROR: Usuario no autorizado</h3>';
        }
        ?>

        <div class="card">
            <ul class="card-child">
                <li>Listado de estudiantes año 2024</li>
                <li class="dropdown"> 
                    <span>Primer año</span>
                    <ul class="submenu">
                        <li>PRIMERO</li>
                        <li ><a href="alumnosSecc.view.php?year=1&section=1">Seccion A</a></li>
                        <li><a  href="alumnosSecc.view.php?year=1&section=2">Seccion B</a></li>
                        <li><a  href="alumnosSecc.view.php?year=1&section=3">Seccion C</a></li> 
                    </ul>
                </li>
                 <li class="dropdown">
                    <span>Segundo año</span>
                    <ul class="submenu">
                    <li>SEGUNDO</li> 
                    <li><a href="alumnosSecc.view.php?year=2&section=1">Seccion A</a></li>
                    <li><a href="alumnosSecc.view.php?year=2&section=2">Seccion B</a></li>
                    <li><a href="alumnosSecc.view.php?year=2&section=3">Seccion C</a></li> 
                    </ul>
                 </li>
                 <li class="dropdown">
                    <span>Tercer año</span>
                    <ul class="submenu">
                    <li>TERCERO</li>
                    <li><a href="alumnosSecc.view.php?year=3&section=1">Seccion A</a></li>
                    <li><a href="alumnosSecc.view.php?year=3&section=2">Seccion B</a></li>
                    <li><a href="alumnosSecc.view.php?year=3&section=3">Seccion C</a></li> 
                    </ul>
                 </li>
                 <li class="dropdown">
                    Cuarto año
                    <ul class="submenu">
                     <li>CUARTO</li>   
                    <li><a href="alumnosSecc.view.php?year=4&section=1">Seccion A</a></li>
                    <li><a href="alumnosSecc.view.php?year=4&section=2">Seccion B</a></li>
                    <li><a href="alumnosSecc.view.php?year=4&section=3">Seccion C</a></li> 
                    </ul>
                 </li>
                 <li class="dropdown">
                    <span>Quinto año</span>
                    <ul class="submenu">
                    <li>QUINTO</li>
                    <li><a href="alumnosSecc.view.php?year=5&section=1">Seccion A</a></li>
                    <li><a href="alumnosSecc.view.php?year=5&section=2">Seccion B</a></li>
                    <li><a href="alumnosSecc.view.php?year=5&section=3">Seccion C</a></li> 
                    </ul>
                 </li>
                <li><canvas id="chartAlumnos" style="height: 220px;"></canvas></li>
            </ul>
        </div>
    </div>
</div>
<script>
    // Obtén el contexto del lienzo del gráfico
    const ctx = document.getElementById('chartAlumnos').getContext('2d');

    // Recuperar los datos desde PHP
    const countAlumnos = JSON.parse(<?php echo $countAlumnos; ?>);
    const countFermale = JSON.parse(<?php echo $totalFemenino; ?>);
    const countMale = JSON.parse(<?php echo $totalMasculino ?>)
    // Crea el gráfico de barras
    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total de Estudiantes: ' + countAlumnos, 'Total de Femeninas: ' + countFermale, 'Total de Masculinos: ' + countMale],
            datasets: [{
                label: 'Estudiantes',
                data: [countAlumnos, countFermale, countMale],
                backgroundColor: [
                    'rgba(49, 145, 144, 1)',
                    'rgba(255, 200, 3, 1)',
                    'rgba(255, 239, 181, 1)'
                ],
                borderColor: [
                    'rgba(49, 145, 144, 1)',
                    'rgba(255, 200, 3, 1)',
                    'rgba(255, 239, 181, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            
            
        }

    });
</script>


<script src="js/script.js"></script>
</body>

</html>
<?php
//arreglo con mensajes que puede recibir
$messages = [
    "1" => "Credenciales incorrectas",
    "2" => "No ha iniciado sesión"
];
?>
<!DOCTYPE html>
<html>
<head>
<title>Login | Acces</title>
    <meta name="description" content="Registro de Notas del Centro Escolar Profesor Lennin" />
    <link rel="stylesheet" href="css/styles.css" />

</head>
<body>
<div class="header">

    
    
    </div>
    
    <div class="body">
        <div class="panel">
            <form method="post" class="form" action="login_post.php" style="margin-right: 25%;">
                <h1 style="text-align: center;">Julio Rosales</h1>
                <h4>Inicio de Sesion</h4>
                <div class="form-group">
                    <label>Usuario</label><br>
                    <input type="text" name="username">
                </div>
                <div class="form-group">
                    <label>Contraseña</label><br>
                    <input type="password" name="password">
                </div>
                <button type="submit" class="b_b">Entrar</button>
            </form>
        <?php
        if(isset($_GET['err']) && is_numeric($_GET['err']) && $_GET['err'] > 0 && $_GET['err'] < 3 )
            echo '<span class="error">'.$messages[$_GET['err']].'</span>';
        ?>
        </div>
</div>



</body>

</html>
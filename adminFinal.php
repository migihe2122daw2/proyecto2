<?php
    include './loginCAPBIBLIO.php';
    include './loginBIBLIOTECARI.php';
    

// Quitar warning de error de sintaxis

    error_reporting(0);




    if(isset($_POST['cerrar'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: INDEX.html");
        
    }

    if(isset($_POST ['opciones'])){
        
        // Leer el valor de la opción seleccionada

        $opcion = $_POST ['opciones'] ;
    

        // Habilitar la opción seleccionada

        switch ($opcion) {
            case 'crear':

                ob_clean();

                include './claseUsuario.php';
                
                // Crear un usuario con la clase Usuario

                // Crear un formulario para crear un usuario

                echo "<h1>Crear usuario</h1>";
                echo "<form action='adminFinal.php?opciones=crear' method='post'>";
                echo "<p>Nombre: <input type='text' name='nombre'></p>";
                echo "<p>Apellido1: <input type='text' name='apellido1'></p>";
                echo "<p>Apellido2: <input type='text' name='apellido2'></p>";
                echo "<p>Residencia: <input type='text' name='residencia'></p>";
                echo "<p>Email: <input type='text' name='email'></p>";
                echo "<p>Telefono: <input type='text' name='telefono'></p>";
                echo "<p>IdPersonal: <input type='text' name='idPersonal'></p>";
                echo "<p>Contraseña: <input type='password' name='contrasena'></p>";
                echo "<p>Prestado: <input type='checkbox' name='prestado'></p>";
                echo "<p>FechaPrestamo: <input type='text' name='fechaPrestamo'></p>";
                echo "<p>ISBN: <input type='text' name='ISBN'></p>";
                echo "<p><input type='submit' name='crear' value='Crear'></p>";
                echo "</form>";

                // Leer los datos del formulario

                $nombreFormulario = $_POST['nombre'];
                $apellido1Formulario = $_POST['apellido1'];
                $apellido2Formulario = $_POST['apellido2'];
                $residenciaFormulario = $_POST['residencia'];
                $emailFormulario = $_POST['email'];
                $telefonoFormulario = $_POST['telefono'];
                $idPersonalFormulario = $_POST['idPersonal'];
                $contrasenaFormulario = $_POST['contrasena'];
                $prestadoFormulario = $_POST['prestado'];
                $fechaPrestamoFormulario = $_POST['fechaPrestamo'];
                $ISBNFormulario = $_POST['ISBN'];

                // Crear un usuario con los datos del formulario

                echo "<p>Nombre: $nombreFormulario</p>";
                echo "<p>Apellido1: $apellido1Formulario</p>";
                echo "<p>Apellido2: $apellido2Formulario</p>";
                
                header("Refresh: 4 adminFinal.php");

                $usuario = new Usuario($nombreFormulario, $apellido1Formulario, $apellido2Formulario, $residenciaFormulario, $emailFormulario, $telefonoFormulario, $idPersonalFormulario, $contrasenaFormulario, $prestadoFormulario, $fechaPrestamoFormulario, $ISBNFormulario);
            



                break;

            case 'eliminar':
                
                // Eliminar un usuario con la clase Admin

                break;

            case 'visualizar':
                
                // Visualizar los usuarios con la clase Admin

                include './claseUsuario.php';

                // Llama a la función mostrarUsuarios()

                $usuarios  = new Usuario();

                $usuarios->visualizarUsuarios();

                break;
        }
        
    }
    
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         /* Poner div session arriba a la derecha con un recuadro */

         #session {
            position: absolute;
            top: 10px;
            right: 0;
            width: 300px;
            height: 80px;
            background-color: #f1f1f1;
            border: 1px solid #d3d3d3;
            padding: 10px;
            font-size: 13px;
            text-align: center;
        }

        /* Posicionar el botón de cerrar sesión en el centro del recuadro */

        #Cerrar {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<div id="session">
        <p name="idSessio">Id de sessio: <?php echo session_id() ?></p>
        <!-- Boton para cerrar sesion -->
        <form id="Cerrar" action="" method="post">
            <input style="font-size: 13px; " type="submit" name="cerrar" value="Cerrar sesión">
        </form>
    </div>
    <!-- Poner un formulario con tres opciones: 1. Crear usuarios 2. Visualizar usuarios 3. Elminar usuarios -->
    <br>

    <form action="adminFinal.php" method="post">
        <select name="opciones">
            <option value="crear">Crear usuario</option>
            <option value="visualizar">Visualizar usuarios</option>
            <option value="eliminar">Eliminar usuarios</option>
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
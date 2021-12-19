<?php
    include './loginCAPBIBLIO.php';
    include './loginBIBLIOTECARI.php';

    



    if(isset($_POST['cerrar'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: INDEX.html");
        
    }

    if(isset($_POST['opciones'])){
        
        // Leer el valor de la opción seleccionada

        $opcion = $_POST['opciones'];
    

        // Habilitar la opción seleccionada

        switch ($opcion) {
            case 'crear':
                
                // Crear un usuario con la clase Admin

                break;

            case 'eliminar':
                
                // Eliminar un usuario con la clase Admin

                break;

            case 'visualizar':
                
                // Visualizar los usuarios con la clase Admin

                include_once './adminUsuarios.php';

                // Llama a la función mostrarUsuarios()

                $admin = new Admin();
                
                $admin->visualizarUsuarios();

                echo "<table border='1' width='100%'>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido1</th>";
                echo "<th>Apellido2</th>";
                echo "<th>Residencia</th>";
                echo "<th>Email</th>";
                echo "<th>Telefono</th>";
                echo "<th>IdPersonal</th>";
                echo "<th>Contrasena</th>";
                echo "<th>Prestado</th>";
                echo "<th>FechaPrestamo</th>";
                echo "<th>ISBN</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<tr><br></tr>";
                echo "<td>" . $admin->getNombre() . "</td>"; 
                echo "<td>" . $admin->getApellido1() . "</td>";
                echo "<td>" . $admin->getApellido2() . "</td>";
                echo "<td>" . $admin->getResidencia() . "</td>";
                echo "<td>" . $admin->getEmail() . "</td>";
                echo "<td>" . $admin->getTelefono() . "</td>";
                echo "<td>" . $admin->getIdPersonal() . "</td>";
                echo "<td>" . $admin->getContrasena() . "</td>";
                echo "<td>" . $admin->getPrestado() . "</td>";
                echo "<td>" . $admin->getFechaPrestamo() . "</td>";
                echo "<td>" . $admin->getISBN() . "</td>";
                echo "</tr>";
                echo "</table>";
                

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
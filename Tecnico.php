<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tecnic</title>
</head>
<body bgcolor="#EAF2F8">
    <center>
        <form method="post">
            <h3> BUSCAR EQUIPO</h3>
            ID : <br><br>
            <?php
            error_reporting(0);
            if($_POST['btnBus']=="Buscar"){
                include("funciones.php");
                $cnn = Conectar();
                $id = $_POST['txtid'];

                $sql = "SELECT * FROM equipos WHERE ID = '$id'";
                $rs = mysqli_query($cnn, $sql);

                if (mysqli_num_rows($rs)) {
                    echo "<table border='1'>";
                    echo "<tr align='center'>";
                    echo "<td><b>ID</td>";
                    echo "<td><b>Nombre del equipo</td>";
                    echo "<td><b>Observaciones</td>";
                    echo "<td><b>Dueño</td>";
                    echo "<td><b>Modelo</td>";
                    echo "<td><b>Color</td>";
                    echo "<td><b>Tamaño</td>";
                    echo "<td><b>Bateria</td>";
                    echo "<td><b>Cargador</td>";
                    echo "<td><b>Pantalla</td>";
                    echo "<td><b>Estado</td>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_array($rs)) {
                        echo "<tr>";
                        echo "<td>" . $row[0] . "</td>";
                        echo "<td>" . $row[1] . "</td>";
                        echo "<td>" . $row[2] . "</td>";
                        echo "<td>" . $row[3] . "</td>";
                        echo "<td>" . $row[4] . "</td>";
                        echo "<td>" . $row[5] . "</td>";
                        echo "<td>" . $row[6] . "</td>";
                        echo "<td>" . $row[7] . "</td>";
                        echo "<td>" . $row[8] . "</td>";
                        echo "<td>" . $row[9] . "</td>";
                        echo "<td>" . $row[10] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p>No se encontró el equipo.</p>";
                }
            }
            ?>

            <form method="post">
                <br><br><br>
                <input type="text" name="txtid" size="25" maxlength="30" value ="<?php echo "$id"?>">
                <input type="submit" name="btnBus" value="Buscar">
                <br><br><br>

                <h3> CAMBIAR ESTADO</h3>

                <select name="selEstado">
                    <option value="R">EN REPARACION</option>
                    <option value="E">ENTREGADO</option>
                </select>
                <br><br>
                <input type="submit" name="btnGuardar" value="Guardar">
                <br><br>

                <?php 
                if ($_POST['btnGuardar']=='Guardar'){
                    include("funciones.php");
                    $cnn = Conectar();
                    $id = $_POST['txtid'];
                    $estado = $_POST['selEstado'];

                    $sql= "UPDATE equipos SET estado = '$estado' WHERE ID = '$id'" ;
                    $rs = mysqli_query($cnn, $sql);
                    echo "<script>alert('Se ha guardado el estado')</script>";
                }
                ?>  
            </form>

            <h3><button type="submit"><a href="index.php">Volver</a></button></h3>
        </form>
    </center>
</body>
</html>

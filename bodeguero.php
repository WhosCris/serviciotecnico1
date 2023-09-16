<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BODEGUERO</title>
</head>
<body bgcolor="#EAF2F8">
    <center>
        <form method="post">
            <?php
                include("funciones.php");
                $cnn = Conectar();

            ?>
            <h3> BODEGUERO </h3>
            ID DEL REPUESTO : <br><br>

            <?php
            error_reporting(0);
            if ($_POST['btnBus'] == "Buscar") {
                $id = $_POST['txtid'];

                $sql = "SELECT * FROM pedido WHERE ID = '$id'";
                $rs = mysqli_query($cnn, $sql);

                if (mysqli_num_rows($rs)) {
                    echo "<table border='1'>";
                    echo "<tr align='center'>";
                    echo "<td><b>ID</td>";
                    echo "<td><b>repuesto</td>";
                    echo "<td><b>cantidad</td>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_array($rs)) {
                        echo "<tr>";
                        echo "<td>" . $row[0] . "</td>";
                        echo "<td>" . $row[1] . "</td>";
                        echo "<td>" . $row[2] . "</td>";
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
                <input type="text" name="txtid" size="25" maxlength="30" value="<?php echo "$id" ?>">
                <input type="submit" name="btnBus" value="Buscar">
                <br><br><br>

                <h3> INGRESE LA CANTIDAD </h3>

                <input type="text" name="txtCant" value="<?php echo "$can" ?>" size="25" maxlength="30">
                <br><br>
                <input type="submit" name="btnIngresar" value="Ingresar">
                <br><br>

                <?php
                if ($_POST['btnIngresar'] == 'Ingresar') {
                    $id = $_POST['txtid'];
                    $can = $_POST['txtCant'];
                    $sql = "UPDATE pedido SET cantidad = cantidad + '$can'  WHERE id = '$id'";
                    $rs = mysqli_query($cnn, $sql);
                    echo "<script>alert('se han ingresado correctamente el valor')</script>";
                }
                ?>

                <h3> DESCONTAR CANTIDAD  </h3>

                <input type="text" name="txtCan" value=" " size="25" maxlength="30">
                <br><br>
                <input type="submit" name="btnDescontar" value="Descontar">
                <br><br>

                <?php
                if ($_POST['btnDescontar'] == 'Descontar') {
                    
                    $id = $_POST['txtid'];
                    $can = $_POST['txtCan'];
                    $sql = "UPDATE pedido SET cantidad = cantidad - '$can'  WHERE id = '$id'";
                    $rs = mysqli_query($cnn, $sql);
                    echo "<script>alert('se han descontado correctamente el valor')</script>";
                }
                ?>

            </form>

            <h3><a href="index.php">Volver</a></h3>
        </form>
    </center>
</body>
</html>

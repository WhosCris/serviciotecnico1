<!DOCTYPE html>
<html>
<head>
    <title>Desvincular
    </title>
</head>

<body>
    <center>
        <h1>
            Desvincular trabajador
        </h1>

        <form method="post">

            <?php 
               include("funciones.php");
                $cnn = Conectar();
            ?>
            
            <h3>Ingrese el rut de la persona que desea desvincular</h3>
                Rut<br>
                <input type="text" name="Rutactivar" value="" size="10">
                <br>             
                <button type="submit" name="btnCancel"><a href="mainAdmin.php">Cancelar</a></button>

            <?php 
                error_reporting(0)
            ?>

            <input type="submit" name="btnActivar" value="Activar">

            <?php 
                
                if($_POST['btnActivar']=="Activar"){

                    $rut = $_POST['Rutactivar'];

                    $sql2="UPDATE empleados set estado='Activo' where Rut='$rut'";

                    mysqli_query($cnn,$sql2);

                    echo $sql2;

                    echo "<script>alert('Se ha Reactivado al usuario $rut')</script>";
                }
            ?>
        </form>
    </center>

    </body>
</html>
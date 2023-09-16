<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar Cliente</title>
</head>

<body bgcolor="#EAF2F8">
<form method="post">	
<?php error_reporting (0); ?>  
	<center>
	<h1>Agregar Cliente</h1>

	<table>
		<tr>
            <td> Rut :</td>
            <td><input type="text" name="txtRut" value="" size="30" maxlength="30"></td>
        </tr>
        <tr>
            <td>Nombre :</td>
            <td><input type="text" name="txtNom" value="" size="30" maxlength="30"></td>
        </tr>
            <td>Apellido :</td>
            <td><input type="text" name="txtApe" value="" size="30" maxlength="30"></td>
        </tr>
        </tr>
            <td>Direccion :</td>
            <td><input type="text" name="txtDirec" value="" size="30" maxlength="30"></td>
        </tr>
    	</tr>
            <td>Fono :</td>
            <td><input type="text" name="txtFon" value="" size="30" maxlength="30"></td>
        </tr>
        </tr>
            <td>Correo electronico :</td>
            <td><input type="text" name="txtCorreo" value="" size="30" maxlength="30"></td>
        </tr>
	</center>
        
     </table> 
     <br><br>  	
        	
        	<center><input type="submit" name="btnAgre" value="AGREGAR" size="25" maxlength="30"></center>
            <br><br>
			<button type="submit"><a href="menurecepcionista.php">Volver</a></button>

 <?php 

if ($_POST['btnAgre']=="AGREGAR"){

	include("funciones.php");
	$cnn = Conectar();

	 $Rut = $_POST['txtRut'];
	 $nom = $_POST['txtNom'];
	 $ape = $_POST['txtApe'];
	 $direc = $_POST['txtDirec'];
	 $fon = $_POST['txtFon'];
	 $Correo = $_POST['txtCorreo'];

	 $sql="INSERT into cliente values('$Rut','$nom','$ape','$direc','$fon','$Correo')";
	


mysqli_query($cnn,$sql);

echo "<script>alert('Cliente agregado correctamente')</script>";

}

  ?>  
	
		
	
</form>

</body>
</html>
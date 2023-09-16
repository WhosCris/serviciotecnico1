<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar Equipo</title>
</head>

<body bgcolor="#EAF2F8">
<form method="post">	
<?php error_reporting (0); ?>  
	<center>
	<h1>Agregar Equipo</h1>

    <?php
error_reporting(0);

if($_POST['btnBus']=="Buscar"){
    include("funciones.php");
    $cnn = Conectar();
    $rut= $_POST['txtDueño'];
    
    $sql ="select * from cliente where rut ='$rut'";
    $rs = mysqli_query($cnn,$sql);
     if($row = mysqli_fetch_array($rs)){

        $nom = $row[1];
        $ape = $row[2];

    }else{
        echo "<script>alert('no hay datos con ese rut')</script>";
    }
            }  
?>

<table>
<tr>
            <td>Dueño :</td>
		    <td><input type="text" name="txtDueño" value="<?php echo "$rut"?>" size="25" maxlength="30">
            <input type="submit" name="btnBus" value="Buscar">
        </tr>
        <tr>
        
            <td>Nombre :</td>
            <td><input type="text" name="txtNom" value="<?php echo "$nom" ?>" size="25" maxlength="30" readonly></td>
        </tr>
        <tr>
            <td>Apellido :</td>
            <td><input type="text" name="txtApe" value="<?php echo "$ape"?>" size="25" maxlength="30" readonly></td>
        </tr>
</table>

	<table>
                <tr>
		             <td>Marca del equipo :</td>
		            <td><input type="text" name="txtMar" size="25" maxlength="30"></td>
					
                </tr>
		        <tr>
		             Observaciones :  <br> 
		           <textarea type="text" name="txtObser"  rows="5" cols="40" value="" >
		           </textarea> <br> <br>
                </tr>
                 <tr>
                   <td>Modelo :</td>
		           <td><input type="text" name="txtModelo" value="" size="25" maxlength="30">
                 </tr>
                 <tr>
                   <td>Color :</td>
		           <td><input type="text" name="txtColor" value="" size="25" maxlength="30">
                 </tr>
                 <tr>
                   <td>Tamaño :</td>
		           <td><input type="text" name="txtTamaño" value="" size="25" maxlength="30">
                 </tr>
                 <tr>
                   <td>Bateria :</td>
		           <td><input type="text" name="txtBateria" value="" size="25" maxlength="30">
                 </tr>
                 <tr>
                   <td>Cargador :</td>
		           <td><input type="text" name="txtCargador" value="" size="25" maxlength="30">
                 </tr>
                 <tr>
                   <td>Pantalla :</td>
		           <td><input type="text" name="txtPantalla" value="" size="25" maxlength="30">
                 </tr>
                 <tr>
                   <td>Estado :</td>
		           <td><select name="selEs" >
                    <option value="R" >Reparado</option>
        			<option value="E" >En reparacion</option>
                </select></td>
                 </tr>
                 <tr>
                   <td>Repuesto :</td>
		           <td><input type="text" name="txtRepuesto" value="" size="25" maxlength="30">
                 </tr>
                 <tr>
     </table> 
     <br><br>  	
        	
        	<center><input type="submit" name="btnAgre" value="AGREGAR" size="25" maxlength="30"></center>
            <br><br>
			<button type="submit"><a href="menurecepcionista.php">Volver</a></button>

 <?php 

if ($_POST['btnAgre']=="AGREGAR"){

	include("funciones.php");
	$cnn = Conectar();

	 $Marca = $_POST['txtMar'];
	 $Obser = $_POST['txtObser'];
	 $Dueño = $_POST['txtDueño'];
	 $Modelo = $_POST['txtModelo'];
	 $Color = $_POST['txtColor'];
	 $Tamaño = $_POST['txtTamaño'];
     $Bateria = $_POST['txtBateria'];
     $Cargador = $_POST['txtCargador'];
     $Pantalla = $_POST['txtPantalla'];
     $Estado = $_POST['selEs'];
     $Repuesto = $_POST['txtRepuesto'];

	 $sql="INSERT into equipos(ID,Marca,Observaciones,Dueno,Modelo,Color,Tamaño,Bateria,Cargador,Pantalla,Estado,Repuesto) 
     values(NULL,'$Marca','$Obser','$Dueño','$Modelo','$Color','$Tamaño','$Bateria','$Cargador','$Pantalla','$Estado','$Repuesto')";
	


mysqli_query($cnn,$sql);
echo "<script>alert('Equipo agregado correctamente')</script>";

}

  ?>  
	
		
	
</form>

</body>
</html>
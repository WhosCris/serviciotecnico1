<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>orden de trabajo </title>
</head>

<body bgcolor="#EAF2F8">
	<?php error_reporting(0) ?>
  <form method="post">

  <?php

if($_POST['btnBus']=="Buscar"){
    include("funciones.php");
    $cnn = Conectar();
    $rut= $_POST['txtRut'];
    
    $sql ="select * from cliente where rut ='$rut'";
    $rs = mysqli_query($cnn,$sql);
     if($row = mysqli_fetch_array($rs)){

        $nom = $row[1];
        $ape = $row[2];
		$fono = $row[4];

    }else{
        echo "<script>alert('no hay datos con ese rut')</script>";
    }
            }  
?>

		<center>
			<table>
				<h1>ORDEN DE TRABAJO</h1>

		<div name = "clientes" >
			
			<center>
			<h3> CLIENTES</h3>
		     <table>
			    <tr>
                   <td>Rut :</td>
		           <td><input type="text" name="txtRut" value="<?php echo "$rut"?>" size="25" maxlength="30">
                   <input type="submit" name="btnBus" value="Buscar" size="25" maxlength="30"></td>
		        </tr> 
		           

		        <tr>
		            <td>Nombre :</td>
		            <td><input type="text" name="txtNom" value="<?php echo "$nom"?>" size="25" maxlength="30" readonly></td>
		        </tr>
		            <td>Apellido :</td>
		            <td><input type="text" name="txtApe" value="<?php echo "$ape"?>" size="25" maxlength="30"readonly></td>
		        </tr>
		         </tr>
		            <td>Telefono:</td>
		            <td><input type="text" name="txtTel" value="<?php echo "$fono"?>" size="25" maxlength="30"readonly></td>
		        </tr>
		     </table>
		    </center>
		</div>
		<center>
<table>
		        <tr>
		           <td>Tecnico :</td>
		        	  <td>
		        		 <select name="selTec">
		        			<option value="65-2">Santiago Mondaca</option>
		        			<option value="76-2">Lina Rios</option>
							<option value="33-1">Gabriel Rentería</option>
		        		 </select>
		        	  </td>

		        </tr>
				<tr>
		            <td>Recepcionado por:</td>
		        	  <td>
		        		 <select name="selRecp">
		        			<option value="67-1">Carmen Ibarra</option>
		        			<option value="76-3">Esteban Ruiz</option>	
		        		 </select>
		        	  </td>
		        </tr>
		        <tr>
		            <td>Fecha de recepcion:</td>
		            <td><input type="date" name="fRecp" value="" size="25" maxlength="30"></td>
		        </tr>
				<tr>
					<td>Monto:</td>
					<td><input type="text" name="txtmto" value=""></td>
				</tr>
				<tr>
					<td>Motivo:</td>
					<td><input type="text" name="txtMOTI" value=""></td>
				</tr>
		        <tr>
		            <td>Fecha de retiro:</td>
		            <td><input type="date" name="fRet" value="" size="25" maxlength="30"></td>
		        </tr>
				<tr>
		            <td>Fecha real de retiro:</td>
		            <td><input type="date" name="fRere" value="" size="25" maxlength="30"></td>
		        </tr>
		        
		     </table>
		    </center>
		</div>

		<br><br><br>

		<center>
		        <tr>
				  <td><input type="submit" name="btnCargar" value="Cargar orden" size="25" maxlength="30"></td>
                  <button type="submit"><a href="menurecepcionista.php">Volver</a></button>
				  
				</tr>
		</center>

		<br><br>
			</table>
		</center>
        
<?php 


if ($_POST['btnCargar']=="Cargar orden"){
	include("funciones.php");
	$cnn = Conectar();
	$Dueño= $_POST['txtRut'];
	 $Tecnico = $_POST['selTec'];
	 $Recep = $_POST['selRecp'];
	 $Frecp = $_POST['fRecp'];
	 $Mon = $_POST['txtmto'];
	 $Mot = $_POST['txtMOTI'];
     $Fret = $_POST['fRet'];
     $fReal = $_POST['fRere'];
   			
		 $rs = mysqli_query($cnn, "select * from equipos");
		 if($row = mysqli_fetch_array($rs)){
			 $ID= $row[0];}
		

		 $sql="INSERT INTO orden(ID,Equipo,Cliente,Tecnico,recepcionadoPor,FechaRecepcion,FechaRetiro,
		 Monto,MOTIVO,FechaRealRetiro) values (NULL,'$ID','$Dueño','$Tecnico','$Recep','$Frecp','$Fret','$Mon','$Mot','$fReal')";
	 mysqli_query($cnn,$sql);
	 
	 

		echo "<script>alert('Orden registrado correctamente')</script>";
		}


  ?>









  </form>			
</body>
</html>
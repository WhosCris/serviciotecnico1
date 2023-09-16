<!DOCTYPE html>
<html>
    <head>
    <STYLE>
    BODY { background: url(tecnico2.jpg) center fixed no-repeat}
</STYLE>
    </head>
    <body bgcolor="E7DE4D">
    <center>
        <form method="post">
        <?php error_reporting (0); ?>
        <h1><FONT COLOR="white">INICIAR SESIÓN </FONT></h1>
    <table><br><br><br>
    
        <tr>
            <td><b>Rut : <b></td><td><input type="textRut" name="txtRut" value="" placeholder="ingrese su rut"></td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr>
            <td><b>Contraseña : <b></td><td> <input type="password" name="txtContra" value="" maxlenght="15" placeholder="ingrese su contraseña"></td>
        </tr>
       

    
    </table>
<br><br>
        <input type="submit" name="btnAcceder" value="Acceder">
    

    <?php 
    if($_POST['btnAcceder']=="Acceder"){
        include("funciones.php");
        $cnn = Conectar();
        $user = $_POST['txtRut'];
        $pass = $_POST['txtContra'];
        $sql1 = "SELECT * FROM empleados WHERE (RUT='$user')";
        $result = $cnn->query($sql1);

if ($result->num_rows > 0) {
    // Se encontró un empleado con el RUT especificado
    $row = $result->fetch_assoc();
    $estado = $row['Estado'];}
    if ($estado == 'Inactivo') {

        echo "<script>alert('Usuario inactivo')</script>";
        exit();}
        else{
        $sql = "select * from empleados where usuario='$user' and clave='$pass'";
        $rs=mysqli_query($cnn,$sql);
            if(mysqli_num_rows($rs) !=0){
                if($row=mysqli_fetch_array($rs)){
                    
                    $nom = $row[1];
                    $ape = $row[2];
                    $car = $row[4];
                
                    switch ($car){
                        case 1:
                            echo "<script>alert('Usted es $nom $ape y es Tecnico')</script>";
                            echo "<script type='text/javascript'>window.location='Tecnico.php'</script>";
                            break;
                        case 2:
                            echo "<script>alert('Usted es $nom $ape y es Recepcionista')</script>";
                            echo "<script type='text/javascript'>window.location='menurecepcionista.php'</script>";
                            break;
                        case 3:
                            echo "<script>alert('Usted es $nom $ape y es Administrador')</script>";
                            echo "<script type='text/javascript'>window.location='mainAdmin.php'</script>";
                            break;
                        case 4:
                            echo "<script>alert('Usted es $nom $ape y es Bodeguero')</script>";
                            echo "<script type='text/javascript'>window.location='bodeguero.php'</script>";
                            break;
                        default:
                            echo "<script>alert('Usted no es usuario $sql')</script>";
                            echo "<script type='text/javascript'>window.location='login.php'</script>";
                            break;
                    
                }
            }
        }else{
            echo "<script>alert('Usuario o Clave incorrecta!')</script>";
        }
}}
?>

        </form>
        </center>
    </body>
</html>
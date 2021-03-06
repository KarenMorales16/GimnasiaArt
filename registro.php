<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username=$tipo =$nombre = $apaterno = $amaterno = $fecha_nac = $peso_kg = $estatura_cm = $ciudad = $asociacion = $clave = $rep_clave = "";
$username_err = $nombre_err = $apaterno_err = $amaterno_err = $fecha_nac_err = $peso_kg_err = $estatura_cm_err = $clave_err = $rep_clave_err = "";



$query=mysqli_query($link,"SELECT Id_Ciudad, Ciudad, Id_Pais FROM ciudad");
    
    if(isset($_POST['ciudad']))
    {
        $ciudad=$_POST['ciudad'];
        echo $ciudad;
    }

$query2=mysqli_query($link,"SELECT Id_Asociacion, Asociacion, Tipo FROM asociacion");
    
    if(isset($_POST['asociacion']))
    {
        $asociacion=$_POST['asociacion'];
        echo $asociacion;
    }

    $query3=mysqli_query($link,"SELECT id_TipoUsuario,tipo FROM tipousuario");
    
    if(isset($_POST['tipo']))
    {
        $tipo=$_POST['tipo'];
        echo $tipo;
    }
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] === "POST"){
 
    // Validate nombre
    if(empty($_POST['nombre'])){
        $nombre_err = "Por favor ingrese un usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_Usuario FROM USUARIO WHERE Nombre = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_nombre);
            
            // Set parameters
            $param_nombre = trim($_POST["nombre"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $nombre = trim($_POST["nombre"]);
                
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }


    if(empty($_POST['username'])){
        $username_err = "Por favor ingrese un username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_Usuario FROM USUARIO WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) >= 1){
                    $username_err = "Este nombre de usuario ya está en uso.";
                    } else{
                 if(strlen(trim($_POST["username"])) < 11){
                    $username = trim($_POST["username"]);
                 }
                 else{
                    $username_err = "El username debe tener máximo 10 caracteres.";
                 }
                    }  
            } else{
                echo "Ups! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }



    // Validate apaterno
    if(empty($_POST["apaterno"])){
        $apaterno_err = "Por favor ingrese su apellido paterno.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_Usuario FROM USUARIO WHERE ApellidoP = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_apaterno);
            
            // Set parameters
            $param_apaterno = trim($_POST["apaterno"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $apaterno = trim($_POST["apaterno"]);
                
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate amaterno
    if(empty($_POST["amaterno"])){
        $amaterno_err = "Por favor ingrese su apellido materno.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_Usuario FROM USUARIO WHERE ApellidoM = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_amaterno);
            
            // Set parameters
            $param_amaterno = trim($_POST["amaterno"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $amaterno = trim($_POST["amaterno"]);
                
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate birth date
    if(empty($_POST["fecha_nac"])){
        $fecha_nac_err = "Por favor ingrese su fecha de nacimiento.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_Usuario FROM USUARIO WHERE FechaNacimiento = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_fechanac);
            
            // Set parameters
            $param_fechanac = trim($_POST["fecha_nac"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $fecha_nac = trim($_POST["fecha_nac"]);
                
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate weight
    if(empty($_POST["peso_kg"])){
        $peso_kg_err = "Por favor ingrese su peso en kilogramos.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_Usuario FROM USUARIO WHERE Peso = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_peso);
            
            // Set parameters
            $param_peso = trim($_POST["peso_kg"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $peso_kg = trim($_POST["peso_kg"]);
                
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate height
    if(empty($_POST["estatura_cm"])){
        $estatura_cm_err = "Por favor ingrese su estatura en centimetros.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_Usuario FROM USUARIO WHERE Estatura = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_estatura);
            
            // Set parameters
            $param_estatura = trim($_POST["estatura_cm"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $estatura_cm = trim($_POST["estatura_cm"]);
                
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
        // Validate password
        if(empty(trim($_POST["clave"]))){
            $clave_err = "Por favor ingresa una contraseña.";     
        } elseif(strlen(trim($_POST["clave"])) < 6){
            $clave_err = "La contraseña al menos debe tener 6 caracteres.";
        } else{
            $clave = trim($_POST["clave"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["rep_clave"]))){
            $rep_clave_err = "Confirma tu contraseña.";     
        } else{
            $rep_clave = trim($_POST["rep_clave"]);
            if(empty($clave_err) && ($clave != $rep_clave)){
                $rep_clave_err = "No coincide la contraseña.";
                
            }

    }
    
    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($apaterno_err) && empty($amaterno_err) && empty($fecha_nac_err) && empty($peso_kg_err) && empty($estatura_cm_err) && empty($clave_err) && empty($rep_clave_err) && empty($username_err)){

         $param_nombre = $nombre;
         $param_apaterno = $apaterno;
         $param_amaterno = $amaterno;
         $param_fechanac = $fecha_nac;
         $param_estatura = $estatura_cm;
         $param_clave = password_hash($clave, PASSWORD_DEFAULT); // Creates a password hash
         $user=$peso_kg;
     try {
       // Prepare an insert statement
       $sql = "INSERT INTO USUARIO (Clave,Nombre,Username, ApellidoP, ApellidoM, FechaNacimiento, Peso, Estatura, Estatus, Clv_Nivel, Id_Ciudad,Id_Asociacion,id_TipoUsuario   ) 
       VALUES ($clave ,'$param_nombre', '$username', '$param_apaterno', '$param_amaterno', '$param_fechanac', $peso_kg, $param_estatura, 1 , 1, '$ciudad', $asociacion,$tipo)";
        
       
      $result=  mysqli_query($link, $sql);

        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='index.php'>Login</a></div>";
        }
        else{
        echo ($sql);
        }
    
        
         
        // Close statement
         //mysqli_stmt_close($stmt);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
    }
    
    // Close connection
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
<h1 >Registrarse</h1>

	<div class="modal-body" style="float: left; width: 50%;">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">

            <div class="input-group mb-12 form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="nombre" class="form-control input_user" value="<?php echo $nombre; ?>" placeholder="nombre">
                <span class="help-block"><?php echo $nombre_err; ?></span>
            </div>

            <div class="input-group mb-2 form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control input_user" value="<?php echo $username; ?>" placeholder="username">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>

            <div class="input-group mb-2 form-group <?php echo (!empty($apaterno_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" name="apaterno" class="form-control input_pass" value="<?php echo $apaterno; ?>" placeholder="apellido paterno">
                <span class="help-block"><?php echo $apaterno_err; ?></span>
            </div>

            <div class="input-group mb-2 form-group <?php echo (!empty($amaterno_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="amaterno" class="form-control input_user" value="<?php echo $amaterno; ?>" placeholder="apellido materno">
                <span class="help-block"><?php echo $amaterno_err; ?></span>
            </div>

            <div class="input-group mb-2 form-group <?php echo (!empty($fecha_nac_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="date" name="fecha_nac" class="form-control input_pass" value="<?php echo $fecha_nac; ?>" placeholder="fecha de nacimiento">
                <span class="help-block"><?php echo $fecha_nac_err; ?></span>
            </div>

            <div class="input-group mb-12 form-group">
            	 <div class="input-group-append">
	                <span class="input-group-text"><i class="fas fa-user"></i></span>
	                </div>

	                <select name="ciudad" class="form-control input_pass">
	                    <?php 
	                        while($datos = mysqli_fetch_array($query))
	                        {
	                    ?>
	                            <option value="<?php echo $datos['Id_Ciudad']?>"> <?php echo $datos['Ciudad']?> </option>
	                    <?php
	                        }
	                    ?> 
	                </select>
          
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>

                <select name="asociacion"  class="form-control input_pass" >
                    <?php 
                        while($datos2 = mysqli_fetch_array($query2))
                        {
                    ?>
                            <option value="<?php echo $datos2['Id_Asociacion']?>"> <?php echo $datos2['Asociacion']?> </option>
                    <?php
                        }
                    ?> 
                </select>
         
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <select name="tipo"  class="form-control input_pass">
                    <?php 
                        while($datos3 = mysqli_fetch_array($query3))
                        {
                    ?>
                            <option value="<?php echo $datos3['id_TipoUsuario']?>"> <?php echo $datos3['tipo']?> </option>
                            
                    <?php
                        }
                        ?>  </select>
                
            </div> 

            </div>
            <div class="modal-body" style="float: left; width: 50%;">
            <div class="input-group mb-2 form-group <?php echo (!empty($peso_kg_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="number" name="peso_kg" class="form-control input_user" value="<?php echo $peso_kg; ?>" placeholder="Peso Kg">
                <span class="help-block"><?php echo $peso_kg_err; ?></span>
            </div>
            <div class="input-group mb-2 form-group <?php echo (!empty($estatura_cm_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="number" name="estatura_cm" class="form-control input_pass" value="<?php echo $estatura_cm; ?>" placeholder="Estatura cm">
                <span class="help-block"><?php echo $estatura_cm_err; ?></span>
            </div>

            <div class="input-group mb-2 form-group <?php echo (!empty($clave_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="clave" class="form-control input_pass" value="<?php echo $clave; ?>" placeholder="Clave">
                <span class="help-block"><?php echo $clave_err; ?></span>
            </div>   

            <div class="input-group mb-2 form-group <?php echo (!empty($rep_clave_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="rep_clave" class="form-control input_pass" value="<?php echo $rep_clave; ?>" placeholder="Repetir Clave">
                <span class="help-block"><?php echo $rep_clave_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit"  name="Ingresar"class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>         
          </form>
        </div>

        <div class="mt-4">
          <div class="d-flex justify-content-center links custom-control">
            Ya tienes cuenta? <a href="index.php" class="ml-2">Pagina inicial</a>
          </div>
        </div>            
	        
        
<!-- Footer -->
	<?php include 'footer.php';?>
<!-- End Footer -->

</body>
</html>
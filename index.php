<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ("php/connect.php"); ?>
<!DOCTYPE html>
<html lang=es dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Perfil</title>
  </head>
  <body>
    <h3>Perfil:</h3>
    <?php
    $id = $_GET['id'];
    $consulta = "SELECT * FROM usuario WHERE id ='$id'";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombre = $res['nombre'];
    $apellidos = $res['apellidos'];
    $email = $res['email'];
    $pass = $res['pass'];
    ?>
    <p><strong>Nombre:</strong> <?php echo $nombre;?></p>
    <p><strong>Apellidos:</strong> <?php echo $apellidos;?></p>
    <p><strong>Email:</strong> <?php echo $email;?></p>
    <p><strong>Pass:</strong> <?php echo $pass;?></p>
    <br>
    <h3>Proyectos:</h3>
    <?php

    $proyectos = "SELECT * FROM proyectos where id_usuario='$id'";
    $stmt = $pdo->prepare($proyectos);
    $stmt->execute();
    while($row = $stmt->fetch()) {
      $proyecto = $row['nombre'];
      $color = $row['color'];
      $descripcion = $row['descripcion'];
      ?>
      <p><strong>Nombre proyecto:</strong> <?php echo $proyecto;?></p>
      <p><strong>Disponibilidad:</strong> <?php echo $color;?></p>
      <p><strong>Descripcion:</strong> <?php echo $descripcion;?></p>
      <?php
    }
     ?>
     <br>
     <h3>Editar perfil:</h3>
     <form class="" action="php/editar_perfil.php" method="post">
       <input type="text" name="id_perfil" value="<?php echo $id; ?>" hidden>
       <div class="form-group">
         <p><strong>Nombre:</strong></p>
         <input type="text" name="nombre" value="<?php echo $nombre; ?>"></input>
       </div>
       <div class="form-group">
         <p><strong>Apellidos:</strong></p>
         <input type="text" name="apellidos" value="<?php echo $apellidos; ?>"></input>
       </div>
       <div class="form-group">
         <p><strong>Email:</strong></p>
         <input type="text" name="email" value="<?php echo $email; ?>"></input>
       </div>
       <div class="form-group">
         <p><strong>Contraseña:</strong></p>
         <input type="password" name="pass" value="<?php echo $pass; ?>"></input>
       </div>
       <div class="form-group">
         <p><strong>Repite Contraseña:</strong></p>
         <input type="password" name="pass" value="<?php echo $pass; ?>"></input>
       </div>
       <div class="form-group">
         <input type="submit" name="" value="Enviar"></input>
       </div>

     </form>
     <br>
     <h3>Editar proyectos:</h3>
     <?php

     $proyectos = "SELECT * FROM proyectos where id_usuario='$id'";
     $result = mysqli_query($mysqli,$proyectos);
     while($row = mysqli_fetch_array($result)) {
       $id_proyecto = $row['id'];
       $id_usuario = $row['id_usuario'];
       $proyecto = $row['nombre'];
       $color = $row['color'];
       $descripcion = $row['descripcion'];
       ?>
       <form class="" action="php/editar_proyecto.php" method="post">
         <input type="text" name="id_proyecto" value="<?php echo $id_proyecto; ?>" hidden>
         <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
         <div class="form-group">
           <p><strong>Nombre proyecto:</strong></p>
           <input type="text" name="proyecto" value="<?php echo $proyecto;?>"></input>
         </div>
         <div class="form-group">
           <p><strong>Disponibilidad:</strong></p>
           <input type="text" name="color" value="<?php echo $color;?>"></input>
         </div>
         <div class="form-group">
           <p><strong>Descripcion:</strong></p>
           <input type="text" name="descripcion" value="<?php echo $descripcion;?>"></input>
         </div>
         <div class="form-group">
           <input type="submit" name="" value="Enviar"></input>
         </div>

       </form>
       <?php
     }
      ?>


  </body>
</html>

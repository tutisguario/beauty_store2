<?php include("session.php")?>//verifica que estes logueado correctamente
<?php include("conexion.php")?>//se conecta a la base de datos
<?php 

if (isset($_POST['guardar_registro'])){//en crear_categorias mandamos datos con POST, si se reciben 
//los datos nuevos, se guardan en variables
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
}

//GUARDA LOS DATOS EN LA BASE DE DATOS
$query = "INSERT INTO categorias(nombre, descripcion) VALUES ('$nombre','$descripcion')";
$result = mysqli_query($conexion, $query);
if(!$result){
    die("Fallo en el query. Existe un problema en la base de datos.");
}
else{
    ?>
    <script>alert("Registro Guardado");</script>
    <?php 
}
?>
<script>
window.location = "listado_categorias.php";
</script>
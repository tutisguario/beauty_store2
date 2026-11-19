<?php include("session.php")?>
//importamos el archivo session para asegurarnos que el usuario este logueado
<?php include("conexion.php")?>
//importamos el archivo conexion para poder conectarnos a la base de datos

<?php
if(isset($_GET['id'])){ //verificamos que el id de la categoria a eliminar exista
    $codigo = $_GET['id']; //guarda el id recibido en una variable local

    $check = mysqli_query($conexion, "SELECT id FROM productos WHERE categoria_id = $codigo");
    
    if (mysqli_num_rows($check) > 0) {
        ?>
        <script>alert("No se puede eliminar la categoría porque hay productos asociados a ella.");</script>
        <?php
    } else {

        $query = "DELETE FROM categorias WHERE id = $codigo";//consulta sql para que a la hora de borrar algo, el id sea igual al codigo recibido
        $result = mysqli_query($conexion, $query);//ejecuta la consulta sql en la base de datos usando la conexion que abrimos al principio
        if(!$result)
        {
            die("El query para eliminar falló");
            //si la consulta sql fallo, la funcion die() frena el sistema y muestra un mensaje de error
        }
        else{
            ?>
            <script>alert("Registro Eliminado");</script>
            //si la consulta se ejcuto bien, muestra un mensaje de que se ha borrado correctamente
            <?php 
        }
    }
    
}
?>
<script>
window.location = "listado_categorias.php";
//apenas se borra el registro que querias , la pag te devuleve al listado de la categorias
</script>
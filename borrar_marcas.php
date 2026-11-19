<?php include("session.php")?>
<?php include("conexion.php")?>

<?php
if(isset($_GET['id'])){
    $codigo = $_GET['id'];

    // Verificamos si hay productos asociados a esta marca
    $check = mysqli_query($conexion, "SELECT id FROM productos WHERE marca_id = $codigo");

    if(mysqli_num_rows($check) > 0){
        ?>
        <script>alert("No se puede eliminar la marca porque tiene productos asociados. Reasigna o elimina esos productos primero.");</script>
        <?php
    } else {
        // Si no tiene productos asociados, eliminamos normalmente
        $query = "DELETE FROM marcas WHERE id = $codigo";
        $result = mysqli_query($conexion, $query);
        if(!$result){
            die("El query para eliminar falló");
        } else {
            ?>
            <script>alert("Registro Eliminado");</script>
            <?php
        }
    }
}
?>
<script>
window.location = "listado_marcas.php";
</script>
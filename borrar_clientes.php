<?php include("session.php"); ?>
<?php include("conexion.php"); ?>

<?php

// Verificamos si recibimos el ID del cliente.
if(isset($_GET['id'])){

    // Obtenemos el ID del cliente que queremos eliminar.
    $codigo = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    // Verificamos que el ID sea válido.
    if($codigo === false || $codigo <= 0){
        echo '<script>alert("El ID del cliente no es válido");</script>';
    }
    else{

        // Intentamos ejecutar la eliminación.
        try {

            // Creamos la consulta SQL para eliminar el cliente.
            $query = "DELETE FROM clientes WHERE id = $codigo";

            // Ejecutamos la consulta en la base de datos.
            $result = mysqli_query($conexion, $query);

            // Verificamos si la consulta se ejecutó correctamente.
            if(!$result){
                echo '<script>alert("El query para eliminar falló");</script>';
            }
            else{
                echo '<script>alert("Registro eliminado correctamente");</script>';
            }

        }
        //el resultado lo guarda en e
        catch(mysqli_sql_exception $e){

            // Si el error es 1451, el cliente tiene registros relacionados.
            if($e->getCode() == 1451){
                echo '<script>alert("No se puede eliminar el cliente porque tiene pedidos asociados");</script>';
            }
            else{
                echo '<script>alert("Ocurrió un error al eliminar el cliente");</script>';
            }
        }
    }
}

?>

<script>
// Volvemos al listado de clientes.
window.location = "listado_clientes.php";
</script>
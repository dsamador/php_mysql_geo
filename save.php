
<?php 
    include("db.php");

    if(isset($_POST['save'])){
        
        $direccion = $_POST['direccion'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];        

        $query = "INSERT INTO direcciones(direccion, latitud, longitud) VALUES ('$direccion','$latitud','$longitud')";
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Registro guardado satisfactoriamente';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");
    }
?>
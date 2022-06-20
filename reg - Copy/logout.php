<?PHP




if(isset($_SESSION["logout"])){
    session_destroy();
     header("location: login.php");
     
}




?>
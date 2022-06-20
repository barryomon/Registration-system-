<?PHP


session_start();

if(!isset($_SESSION["username"])  || !isset($_SESSION["loggedin"])){
     header("location: login.php");
     exit();

}

if(isset($_POST["logout"])){
     session_destroy();
      header("location: login.php");
      
 }
 




?>
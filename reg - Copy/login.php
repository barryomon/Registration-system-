<?php

 session_start();


 if(isset($_SESSION["username"])   &&  isset($_SESSION["loggedin"])){

    header("location: index.php");
    exit();
 }

 $conn = mysqli_connect('localhost', 'barryomon', 'usiomonjasonbarry', 'practice');
 if(!$conn){
     echo 'connection error' . mysqli_connect_error();
 } 

 $errors = array('username'=>'',  'password'=>'' );

 
if(isset($_POST['submit'])){


    $username = $conn->real_escape_string( $_POST['username']);
    $password = md5( $conn->real_escape_string( $_POST['password']));

    
    if(empty($username)){

        // echo 'a username is required';
        $errors['username'] =  'a username is required';
    }
   

    if(empty($password)){
        $errors['password'] = 'password is required';

    }
          if($username !=""  &&  $password!=""){


            // MAKE QUERY TO SELECT USERNAME AND PASSWORD FROM DATABASE 

            // $sql = " SELECT * FROM user WHERE  username = '$username' password = '$password '  ";

            //  $result = mysqli_query($conn,$sql);


             $query = $conn->query( "SELECT id FROM user WHERE username = '$username' && password = '$password' ");
       
           if($query->num_rows > 0){


            $_SESSION["username"] =  $username;
            $_SESSION["loggedin"] =    1;
            header('location: index.php ');
            exist();
           }else{

            echo 'you are not a  registered user please sign up';

           }



          }
    





    

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" id="container">
	
	<div class="form-container sign-in-container">
<form action="login.php"  method="post" enctype="multipart/form-data">  
		
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="facebook.com" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="google.com" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="linkedin.com" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="name" placeholder="username" name="username" >
			<div class="red-text"><?php echo  $errors['username']?></div><br>



			<input type="password" placeholder="Password"  name="password">
             <div class="red-text"><?php echo  $errors['password']?></div><br>


			<a href="#">Forgot password?</a>

			<button name="submit">Sign In</button>

			<!-- <input type="submit" value="Sign in " > -->
click the link to create an account
     <a href="signup.php">Sign up</a>
		</form>
   
	</div>
    </div>
	








    
</body>
</html>
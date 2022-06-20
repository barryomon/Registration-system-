<?php
 $conn = mysqli_connect('localhost', 'barryomon', 'usiomonjasonbarry', 'practice');
 if(!$conn){
     echo 'connection error' . mysqli_connect_error();
 }



 $username = $email ='';

 $errors = array('username'=>'', 'email'=>'', 'password'=>'' );

if(isset($_POST['submit'])){


    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword =  mysqli_real_escape_string($conn, $_POST['cpassword']);



    if(empty($username)){

        // echo 'a username is required';
        $errors['username'] =  'a username is required';
    }


     /////////////////////////////
    ///////////////////////////
    //////////////////////////
    // check if username is duplicate

    $check_duplicate_username= $conn->query( "SELECT username FROM user WHERE username = '$username' ");
    if($check_duplicate_username->num_rows > 0){

        $errors['username'] =  'user name already taken';
    }
    // email validation

    if(empty($email)){

        $errors['email'] = 'an email is required';
    }


    /////////////////////////////
    ///////////////////////////
    //////////////////////////
    // check if email is duplicate
    $check_duplicate_email= $conn->query( "SELECT email FROM user WHERE email = '$email' ");
    if($check_duplicate_email->num_rows > 0){

        $errors['email'] =  'email belongs to another user';
    }
    // //  echo $email;
    // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //     $errors['email'] = 'must be a valid email address';
    //        }
    // }


// first password validation
if(empty($password)){
    $errors['password'] = 'password is required';
    

}else
    // 2nd validation for password

    if($password != $cpassword){
        $errors['password'] = 'password do not match';
    }else{

        // encrypt the pasword with md5

        $pass = md5($password);


        $sql = "INSERT INTO user(username,email,password) VALUES ('$username', '$email', '$pass') ";
      

        if(mysqli_query($conn , $sql)){


        }else{

            echo 'problem with query';
        }
     header('location:login.php ');
    
    }






}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
	<form action="signup.php"  method="post" enctype="multipart/form-data">  

			<h1>Create Account</h1>
			

<input type="text" name="username"  placeholder="username"    value="<?php echo $username?>" >
<div class="red-text"><?php echo  $errors['username']?></div>


<input type="email" name="email"  placeholder="email" value=" <?php echo $email?>" >
<div class="red-text"><?php echo  $errors['email']?></div>



<input type="password" name="password" placeholder="password" value="">
<div class="red-text"><?php echo  $errors['password']?></div>


<input type="password" name="cpassword" placeholder="confirm-password">

<div>
 <button name="submit">Sign up</button>
 <p> 

   click the Sign in  link if you have an account</p>
   <a href="login.php">Sign in</a>
<!-- <input type="submit" name="submit" value="submit">  -->

</div>

</div>
   </div>









</form>
    
</body>
</html>







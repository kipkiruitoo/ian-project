 <?php
require 'db.php';
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']); 
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php"); 
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['role']=$user['role'];
        
        // This is how we'll know the user is logged in 
        $_SESSION['logged_in'] = true;
         if ($user['role']==0){
        header("location: reservation.php"); 
    }
       else if($user['role']==1){

        header("location:dash.php");
    }
        else if($user['role']==2){

        header("location:kitchen.php");
    }
        else if($user['role']==3){

        header("location:finance.php");
    } 
       }    
    
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}


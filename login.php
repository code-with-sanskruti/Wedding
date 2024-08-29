<?php     
// session_start();
$conn = mysqli_connect('localhost', 'root', '', 'wedplanner');  
if(!$conn) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}     
session_start();
$email = $_POST['email'];  
$password = $_POST['password'];  

$sql = "SELECT name,email,mobilenumber, password  FROM users WHERE email = '$email' and password = '$password'";  
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_assoc($result);
$name= $row['name'];
$mobilenumber= $row['mobilenumber'];
$email= $row['email'];


   

        $sql = "SELECT email, password FROM users WHERE email = '$email' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        $_SESSION['mobilenumber']=$mobilenumber;
       
        
          
        if($count == 1){ 
                echo ("<script LANGUAGE='JavaScript'>
            window.alert('Welcome admin $name');
            window.location.href='index.html';
            </script>");
            } 
            
        
        else{  echo ("<script LANGUAGE='JavaScript'>
            window.alert('Invalid Username or Password.');
            window.location.href='login.html';
            </script>");
        }  
        mysqli_close($conn);
//   session_unset();
//   session_destroy();
   
?>
<?php
    $conn=mysqli_connect('localhost','root','','wedplanner');
    if(!$conn){
        die("Connection failed. Please try again.".mysqli_connect_error());
    }

    // Validate email format
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Invalid email format. Please enter a valid email.');
        window.location.href='reg.php';
        </script>");
        exit; // Stop further execution
    }

    // Validate mobile number length
    if (strlen($_POST['mobile']) !== 10) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Invalid phone number. Please enter a 10-digit phone number.');
        window.location.href='reg.php';
        </script>");
        exit; // Stop further execution
    }

    $sql="INSERT INTO users(name, email, mobilenumber, password) VALUES ('$_POST[username]','$_POST[email]','$_POST[mobile]','$_POST[password]')";
    
    $result=mysqli_query($conn,$sql);
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Your registration done successfully. Please login.');
        window.location.href='login.html';
        </script>");
    }   
    else{
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Registration failed. Please register again.');
        window.location.href='reg.php';
        </script>");
        echo "failed".mysqli_error($conn);
    }
    mysqli_close($conn);
?>

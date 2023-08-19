<?php
    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Mobile=$_POST['mobile'];
    $Password=$_POST['password'];

    $con = new mysqli("localhost","root","","expensave");
    if($con->connect_error)
    {
        die("Failed to connect: ".$con->connect_error);
    }
    else
    {
        $stmt=$con->prepare("INSERT INTO tblusr (FullName, Email, MobileNumber,Password) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$Name,$Email,$Mobile,$Password);
        $stmt->execute;
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0)
        {
            $data=$stmt_result->fetch_assoc();
            if($data['Password']===$Password)
            {
                echo "<h2> Registered Successful</h2>";
            }
            else
            {
                echo "<h2 Account already exists, login!</h2>";
            }
        }
        else
        {
            echo "<h2 Invalid Email or Password</h2>";
        }
    }
?>
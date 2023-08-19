<?php
    $Email=$_POST['email'];
    $Password=$_POST['password'];

    $con = new mysqli("localhost","root","","expensave");
    if($con->connect_error)
    {
        die("Failed to connect: ".$con->connect_error);
    }
    else
    {
        $stmt=$con->prepare("SELECT * FROM tbluser WHERE Email = ?");
        $stmt->bind_param("s",$Email);
        $stmt->execute;
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0)
        {
            $data=$stmt_result->fetch_assoc();
            if($data['Password']===$Password)
            {
                echo "<h2> Login Successful</h2>";
            }
            else
            {
                echo "<h2 Invalid Email or Password</h2>";
            }
        }
        else
        {
            echo "<h2 Invalid Email or Password</h2>";
        }
    }
?>
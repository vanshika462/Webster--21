<?php
    if(isset($_POST['add']))
    {
        $amount = $_POST['amount'];
        $category = $_POST['category'];
        $comment = $_POST['comment'];

        //database details
        $host = "localhost";
        $username = "vanz";
        $password = "4620";
        $dbname = "expensave";

        //create connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        //check connection if it is working or not
        if (!$con)
        {
            die("Connection failed!" . mysqli_connect_error());
        }
        
        //send form enteries
        $sql = "INSERT INTO add_transaction (id, amount, category, comment) VALUES ('0', '$amount', '$category', '$comment')";
        //fire query to save entries and check it with if statement
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            echo "Successfully saved";
        }
      //connection closed.
        mysqli_close($con);
    }
?>
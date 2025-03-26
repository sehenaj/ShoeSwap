<?php
include('database.php');
$conn=mysqli_connect($host,$username,$password,"ShowSwap");



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=$_POST["user-email"];
    $user=$_POST["user-name"];
    $pass=$_POST["user-pass"];
    $passconfirm=$_POST["user-pass-confirm"];
    $security=$_POST["sequrity-ques"];


    // ----------connecting to database----------

    $counter=0;
    $sql="select * from user";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($rows= mysqli_fetch_assoc($result)){
           if( $rows["USERNAME"]==$user){
            $counter++;
            echo '<script>
            alert("Username Already Exist.");
             window.location.href = "../index.php?showRegModal=true";
            </script>';
            exit();

           }
           elseif($rows["EMAIL_ID"]==$email){
            $counter++;
            echo '<script>
            alert("Email Already Exist.");
             window.location.href = "../index.php?showRegModal=true";
            </script>';
            exit();

           }
           
        }
    }
    if($counter<1 && $pass===$passconfirm){
        $sql="INSERT INTO USER(USERNAME,EMAIL_ID,PASSWORD,SECURITY_QUES)
        VALUES ('$user','$email','$pass','$security')";
        $result=mysqli_query($conn,$sql);

        if(!$result){
            die("Wrong Input..!!".mysqli_connect_errno());
        }
        else{
            echo '<script>
            alert("User Created.");
             window.location.href = "../index.php";
            </script>';
            exit();

        }

    }
    else{
        echo '<script>
        alert("Re-Enter Password Correctly.");
        window.location.href = "../index.php?showRegModal=true";
        </script>';
        exit();


    }
}


?>

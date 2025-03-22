<?php
include('../auth/database.php');
$conn=mysqli_connect($host,$username,$password,"sholler");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user=$_POST["user-name"];
    $pass=$_POST["user-pass"];

    // ----------connecting to database----------
    $counter=0;
    $sql="select * from admin";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($rows= mysqli_fetch_assoc($result)){
        
           if( $rows["USERNAME"]==$user){
                $counter++;
                if($rows["PASSWORD"]==$pass){

                    // ---------------Storing session variable---------------
                    session_start();
                    $_SESSION["admin"]=$rows["USERNAME"];
                    $_SESSION["status"]="active";
                    echo '<script>alert("credential okay Mismatch.")</script>';
                    
                        header("Location: admin_home.php");
    
                }
                
           }
        }

    }
    if($counter==1){
        echo '<script>alert("Password Mismatch.")</script>';
        exit();
    }
    elseif($counter==0){
        echo '<script>alert("User Does not Exist.. \nRegister First")</script>';
        exit();
    }
   
}
    

?>
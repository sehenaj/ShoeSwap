<?php
include('database.php');
$conn=mysqli_connect($host,$username,$password,"ShowSwap");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user=$_POST["username"];
    $question=$_POST["security"];
    $newpass=$_POST["newpass"];

    // ----------connecting to database----------
    $counter=0;
    $sql="select * from user";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($rows= mysqli_fetch_assoc($result)){
           if( $rows["USERNAME"]==$user){
                $counter++;
                if($rows["SECURITY_QUES"]==$question){

                        // Assuming you have already established a database connection
                        // and sanitized the user input for the new password and user ID



                        // Update the password field for the user with the given ID
                        $query = "UPDATE user SET PASSWORD ='$newpass' where USERNAME='$user';";

                        if (mysqli_query($conn, $query)) {
                            echo '<script> "Your password has been changed successfully!"; window.location.href = "../index.php";</script>';
                            exit();
                        } else {
                        echo "<script>Error updating password </script>" . mysqli_error($connection);
                        echo '<script> window.location.href = "../index.php";</script>';
                        exit();

                        }

                        
                        


                    // ---------------Storing session variable---------------
                    
                    
                }
                
           }
        }

    }
    if($counter==1){
        echo '<script>
        alert("Wrong Year");
        window.location.href = "../index.php?showForgotPassModal=true";
        </script>';
        exit();

        
    }
    elseif($counter==0){
        echo '<script>
        alert("User Does not Exist.. \nRegister First");
        window.location.href = "../index.php?showRegModal=true";
        </script>';
        exit();

       
    }
   
}
    

?>

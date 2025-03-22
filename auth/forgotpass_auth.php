<?php
include('database.php');
$conn=mysqli_connect($host,$username,$password,"sholler");

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
                            // echo '<script>alert("Password Mismatch.")</script>';
                            header("Location: login.php");
                            exit();
                        } else {
                        echo "<script>Error updating password </script>" . mysqli_error($connection);
                        }

                        
                        


                    // ---------------Storing session variable---------------
                    
                    
                }
                
           }
        }

    }
    if($counter==1){
        echo '<script>alert("Wrong Year")</script>';
        exit();
    }
    elseif($counter==0){
        echo '<script>alert("User Does not Exist.. \nRegister First")</script>';
        exit();
    }
   
}
    

?>
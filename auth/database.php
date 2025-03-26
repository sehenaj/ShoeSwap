<?php
//Database credential
$host="localhost";
$username="root";
$password="";

//creating Connection
$conn=mysqli_connect($host,$username,$password);

$database="ShowSwap";

if(!$conn){
    die("<br>Connection Failed.".mysqli_connect_error());
}
else{
    // echo("<br>Connection Successfull.");
   
    $sql="SHOW DATABASES";
    $result=mysqli_query($conn,$sql);

    // ----------------Database Sample Self Creation-----------------
    /*
    $check_database=0;
    if(mysqli_num_rows($result)>0){
        while($rows=mysqli_fetch_assoc(($result))){
            foreach ($rows as $row){
                if($row==$database){
                    $check_database++;
                   //TO DO if database found
                }
                          
            }
        }
    }
    else{
        // echo "<br>O Database.";
    }

    if ($check_database <1){
        $sql= "CREATE DATABASE SHOLLER";
        $result=  mysqli_query($conn,$sql);
        if(!$result){
            die("<br>ERROR IN CREATION.".mysqli_connect_error());
        }
        else{
            //TODO---------->> ADDING TABLE

            $conn=mysqli_connect($host,$username,$password,$database);
            $sql= "CREATE TABLE USER(
                FNAME VARCHAR(15),
                LNAME VARCHAR(15),
                USERNAME VARCHAR(10) PRIMARY KEY,
                EMAIL_ID VARCHAR(50) UNIQUE,
                PASSWORD VARCHAR(10),
                ADDRESS VARCHAR(30),
                CITY VARCHAR(30),
                PIN VARCHAR(30),
                PHONE_NUMBER VARCHAR(10) ,
                SECURITY_QUES VARCHAR(4)
                
            )";
            $result=  mysqli_query($conn,$sql);
            if(!$result){
                die("<br>ERROR IN CREATION.".mysqli_connect_error());
            }
            else{
                $sql= "CREATE TABLE ADMIN(
                    EMAIL_ID VARCHAR(20) UNIQUE,
                    USERNAME VARCHAR(10) PRIMARY KEY,
                    PASSWORD VARCHAR(10)
                )";
                $result=  mysqli_query($conn,$sql);
                if(!$result){
                    die("<br>ERROR IN ADMIN CREATION.".mysqli_connect_error());
                }
                else{
                    // echo "<br> ADMIN CREATED";
                    $sql= "INSERT INTO ADMIN VALUES('anand@gmail.com','anand2002','adminlogin')";
                    $result=  mysqli_query($conn,$sql);
                    if(!$result){
                        die("<br>ERROR IN ADMIN CREATION.".mysqli_connect_error());
                    }
                    else{
                        $sql= "CREATE TABLE SHOES (
                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            brand VARCHAR(30) NOT NULL,
                            type VARCHAR(50) NOT NULL,
                            category VARCHAR(50) NOT NULL,
                            shoe_usage VARCHAR(50) NOT NULL,
                            gender VARCHAR(50) NOT NULL,
                            size VARCHAR(10) NOT NULL,
                            purchase_price DECIMAL(10,2) NOT NULL,
                            selling_price DECIMAL(10,2) NOT NULL,
                            status VARCHAR(10) NOT NULL DEFAULT 'LISTED',
                            user  VARCHAR(50) NOT NULL,
                            seller_name VARCHAR(50) NOT NULL,
                            seller_location VARCHAR(50) NOT NULL,
                            image_url VARCHAR(255) NOT NULL,
                            image_url_f VARCHAR(255) NOT NULL,
                            image_url_s VARCHAR(255) NOT NULL,
                            description TEXT NOT NULL
                        )";
                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            die("<br>ERROR IN Shoe Table CREATION." . mysqli_connect_error());
                        } else {
                            $sql = "INSERT INTO shoes (brand, type, category, shoe_usage, gender, size, selling_price,purchase_price, seller_name, seller_location, image_url, description)
                            VALUES 
                                ('Nike', 'Air Max 90', 'Running', 'Sports', 'Men', 'US 9', 150.00,300.00, 'John Doe', 'New York', 'uploads/1.webp', 'The classic Air Max 90 in a new colorway'),
                                ('Adidas', 'Ultra Boost', 'Running', 'Sports', 'Women', 'US 8.5', 120.00,100.00, 'Jane Smith', 'Los Angeles', 'uploads/2.webp', 'Barely worn Ultra Boost sneakers'),
                                ('Jordan', 'Air Jordan 1', 'Basketball', 'Sports', 'Men', 'US 10', 200.00,200.00, 'Alex Lee', 'San Francisco', 'uploads/3.webp', 'Well-maintained Air Jordan 1 sneakers'),
                                ('New Balance', '990v5', 'Running', 'Sports', 'Women', 'US 9.5', 175.00,320.00, 'Sarah Johnson', 'Chicago', 'uploads/4.webp', 'Brand new New Balance 990v5 sneakers'),
                                ('Puma', 'Clyde Court', 'Basketball', 'Sports', 'Men', 'US 11', 80.00,150.00, 'David Kim', 'Houston', 'uploads/5.webp', 'Gently used Puma Clyde Court sneakers');
                            ";
                            
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                die("<br>ERROR IN INSERTING DATA INTO THE Shoe Table." . mysqli_connect_error());
                            }else {
                                $sql= "CREATE TABLE SELLER(
                                    FNAME VARCHAR(15),
                                    LNAME VARCHAR(15),
                                    USERNAME VARCHAR(10) PRIMARY KEY,
                                    EMAIL_ID VARCHAR(50) UNIQUE,
                                    PASSWORD VARCHAR(10),
                                    ADDRESS VARCHAR(30),
                                    CITY VARCHAR(30),
                                    PIN VARCHAR(30),
                                    PHONE_NUMBER VARCHAR(10) ,
                                    SECURITY_QUES VARCHAR(4)
                                    
                                )";
                                                                 
                                        
                                        $result = mysqli_query($conn, $sql);
                                        if (!$result) {
                                            die("<br>ERROR IN INSERTING DATA INTO THE Shoe Table." . mysqli_connect_error());
                                        } else {
                                            $sql="CREATE TABLE cart (
                                                cart_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                    user VARCHAR(50) NOT NULL,
                                                    shoes_id INT UNSIGNED
                                            )";
                                            $result = mysqli_query($conn, $sql);
                                            if (!$result) {
                                                die("<br>ERROR IN Cart Table CREATION." . mysqli_connect_error());
                                            } else{
                                                // ----------old------
                                                // $sql="CREATE TABLE wishlist (
                                                //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                //     brand VARCHAR(30) NOT NULL,
                                                //     type VARCHAR(50) NOT NULL,
                                                //     category VARCHAR(50) NOT NULL,
                                                //     shoe_usage VARCHAR(50) NOT NULL,
                                                //     gender VARCHAR(50) NOT NULL,
                                                //     size VARCHAR(10) NOT NULL,
                                                //     status VARCHAR(10) NOT NULL,
                                                //     purchase_price DECIMAL(10,2) NOT NULL,
                                                //     selling_price DECIMAL(10,2) NOT NULL,
                                                //     user  VARCHAR(50) NOT NULL,
                                                //     seller_name VARCHAR(50) NOT NULL,
                                                //     seller_location VARCHAR(50) NOT NULL,
                                                //     image_url VARCHAR(255) NOT NULL,
                                                //     description TEXT NOT NULL
                                                // )";
                                                //-------------new
                                                $sql="CREATE TABLE wishlist (
                                                    wishlist_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                    user VARCHAR(50) NOT NULL,
                                                    shoes_id INT UNSIGNED
                                                )";
                                                $result = mysqli_query($conn, $sql);
                                                if (!$result) {
                                                    die("<br>ERROR IN Wishlist Table CREATION." . mysqli_connect_error());
                                                }
                                                else{
                                                    $sql="CREATE TABLE `order` (
                                                        order_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                        user  VARCHAR(50) NOT NULL,
                                                        shoes_id INT UNSIGNED,
                                                        `created_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                                                    )";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (!$result) {
                                                        die("<br>ERROR IN Order Table CREATION." . mysqli_connect_error());
                                                    }
                                                    else{
                                                        $sql="CREATE TABLE `contact` (
                                                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                            name VARCHAR(30) NOT NULL,
                                                            email VARCHAR(50) NOT NULL,
                                                            phno VARCHAR(50) NOT NULL,
                                                            
                                                            msg TEXT NOT NULL
                                                        )";
                                                        $result = mysqli_query($conn, $sql);
                                                        if (!$result) {
                                                            die("<br>ERROR IN Contact Table CREATION." . mysqli_connect_error());
                                                        }
                                                        else{
                                                            $sql="CREATE TABLE `comment` (
                                                                comment_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                                seller VARCHAR(50) NOT NULL,
                                                                user VARCHAR(50) NOT NULL,
                                                                comment VARCHAR(500) NOT NULL,
                                                                shoes_id INT(6) NOT NULL,
                                                                `comment_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                                                                
                                                            )";
                                                            $result = mysqli_query($conn, $sql);
                                                        }
                                                        if (!$result) {
                                                            die("<br>ERROR IN Comment Table CREATION." . mysqli_connect_error());
                                                        }
                                                        else{
                                                            $sql="CREATE TABLE `payment` (
                                                                payment_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                                card_name VARCHAR(50) NOT NULL,
                                                                card_number INT(16) NOT NULL,
                                                                card_expiry INT(4) NOT NULL,
                                                                card_cvv INT(3) NOT NULL,
                                                                order_id INT(6) NOT NULL,
                                                                `payment_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                                                                
                                                            )";
                                                            $result = mysqli_query($conn, $sql);
                                                        }

                                                    }

                                                    
                                                }

                                            }
                                            
                                        }                    
                                    }
                                        
                                                   
                                }
                            }                    
                        }
                        
                        
                   

                    }                    
                }
                
            }

          
            */
    }

?>

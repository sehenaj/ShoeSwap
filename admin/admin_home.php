<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .Item-table{
            margin:10px;
        }
        .sticky-top {
          background: -webkit-linear-gradient(to right, #cbad6d, #d53369);
          background: linear-gradient(to right, #cbad6d, #d53369);
        }
        
    </style>
    <link rel="icon" href="images/logo.png" type="image/x">
    <title>Admin</title>
  </head>
  <body>
    <!-- ---------------------------Navbar------------------------------ -->
   
      <nav class="navbar navbar-expand-lg navbar-light bg-gradient-nav sticky-top">
        <!-- Just an image -->

        <a class="navbar-brand" href="#">
            <img class="rounded-circle" src="../images/logo.png" width="50" height="50" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                    <a class="nav-link" href="admin_home.php">Item </a>
                </li>
                
                <li class="buyer-item">
                  <a class="nav-link" href="admin_buyer.php">Buyer</a>
              </li>
                <li class="seller-item">
                    <a class="nav-link" href="admin_seller.php">Seller</a>
                </li>
                <li class="cleansing-item ">
                    <a class="nav-link" href="admin_contact.php">Contact</a>
                </li>
                <li class="cleansing-item ">
                    <a class="nav-link" href="admin_reviews.php">Reviews</a>
                </li><li class="cleansing-item ">
                    <a class="nav-link" href="admin_order.php">Order</a>
                </li>
                
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0  ">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <button type="submit" class="btn button-primary"><a  href="logout.php"><img src="../images/icons/logout.png" alt="" width="30px"></a></button>

        </div>
    </nav>
    <!-- ---------------------------Navbar------------------------------ -->
    <!-- ---------------------------Table------------------------------ -->
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'sholler');
    //$result = mysqli_query($conn, "SELECT * FROM shoes");
    $searchName = $_POST['searchName'] ?? '';
$searchReferenceId = $_POST['searchReferenceId'] ?? '';
$searchGender = $_POST['searchGender'] ?? '';
$searchPrice = $_POST['searchPrice'] ?? '';
$searchType = $_POST['searchType'] ?? '';

// Construct the SQL query
$query = "SELECT * FROM shoes WHERE 1=1";

if (!empty($searchName)) {
    $query .= " AND brand LIKE '%$searchName%'";
}

if (!empty($searchReferenceId)) {
    $query .= " AND id = '$searchReferenceId'";
}

if (!empty($searchGender)) {
    $query .= " AND gender = '$searchGender'";
}

if (!empty($searchPrice)) {
    $query .= " AND selling_price <= '$searchPrice'";
}

if (!empty($searchType)) {
    $query .= " AND type = '$searchType'";
}

$result = $conn->query($query);

if (isset($_GET['delete'])) {
    $job_reference_number = $_GET['delete'];
    $deleteQuery = "DELETE FROM shoes WHERE id = '$job_reference_number'";
    $conn->query($deleteQuery);
    header('Location: admin_home.php');
}
$result = $conn->query($query);


// Close the database connection
$conn->close();

?>
<br>
<form method="POST" action="admin_home.php">
    <label for="searchName">Search by Brand:</label>
    <input type="text" name="searchName" id="searchName">
    
    <label for="searchReferenceId">ID:</label>
    <input type="text" name="searchReferenceId" id="searchReferenceId">
    
    <label for="searchGender">Gender:</label>
    <select name="searchGender">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="kids">Kids</option>
    </select>
    
    <label for="searchPrice">Selling Price:</label>
    <input type="text" name="searchPrice" id="searchPrice">
    
    <label for="searchType">Type:</label>
    <input type="text" name="searchType" id="searchType">
    
    <input type="submit" value="Search">
</form>

<div class="Item-table">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Brand</th>
                <th scope="col">Size</th>
                <th scope="col">Duration</th>
                <th scope="col">Selling Price</th>
                <th scope="col">Type</th>
                <th scope="col">Category</th>
                <th scope="col">Gender</th>
                <th scope="col">Purchase Price</th>
                
                <th scope="col">Status</th>
                <th scope="col">Seller</th>
                <th scope="col col-sm"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row['id'] . "</th>";
                    echo "<td>" . $row['brand'] . "</td>";
                    echo "<td>" . $row['size'] . "</td>";
                    echo "<td>" . $row['shoe_usage'] . "</td>";
                    echo "<td>₹" . $row['selling_price'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>₹ " . $row['purchase_price'] . "</td>";
                    
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['seller_name'] . "</td>";
                    if ($row['status'] == "listed" || $row['status'] == "LISTED") {
                        echo "<td>
                            <form action='admin_home.php' method='get' onsubmit='return confirm(\"Are you sure you want to delete ?\");'>
                                <input type='hidden' name='delete' value='" . $row['id'] . "'>
                                <button type='submit' class='btn btn-primary'><img src='../images/icons/bin.png' alt='' width='10%'></button>
                            </form>
                        </td>";
                    }              
  
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>


      
    <!-- ---------------------------Table------------------------------ -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
  </body>
</html>
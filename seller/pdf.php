<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../auth/database.php');
    $conn=mysqli_connect($host,$username,$password,'sholler');
    $product_id = $_POST['product_id'];

    $sql = "SELECT s.*, o.created_date FROM shoes s JOIN `order` o ON s.id = o.shoes_id  WHERE s.id = '$product_id'";
    
    $result = $conn->query($sql);
    
   
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        // Access the details

        //SELLER DETAILS
        
        //PICKUP DETAILS
        $order_created = $row['created_date'];
        
        

// Use the increased date as needed
// ...

        
        //shoe_details
        $brand = $row['brand'];
        $type = $row['type'];
        $category = $row['category'];
        $shoeUsage = $row['shoe_usage'];
        $gender = $row['gender'];
        $size=$row['size'];
        $selling_price=$row['selling_price'];
    
        // Use the fetched details as needed
        // ...
   
    
    

    require('fpdf/fpdf.php');

    class PDF extends FPDF
    {
        // Header
        function Header()
        {
            $this->Image('images/logo.jpeg', 10, 10, 10);
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0, 10, 'Seller Receipt', 0, 0, 'C');
            // width, height, text, border, line break, alignment
            $this->Ln(20);
        }

        // Footer
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Sholler Shipping Logistics | MG ROAD, New Delhi | INDIA | 7076853097', 0, 0, 'L');
        }

        // Generate PDF
        function generatePDF($brand, $type, $category, $shoe_usage, $gender,$order_created, $size, $selling_price)
        {
            $this->AddPage();
            $this->SetFont('Arial', '', 12);

            // Customer Information
            $this->Cell(0, 10, 'Seller Information', 1, 1, 'C');
            $this->Cell(0, 10, 'Name: '.$_SESSION['fname'].' '.$_SESSION['lname'].'', 0, 1);
            $this->Cell(0, 10, 'Email: '.$_SESSION['email'].'', 0, 1);
            $this->Cell(0, 10, 'Phone Number: '.$_SESSION['phone'].'', 0, 1);
            $this->Cell(0, 10, 'Address: '.$_SESSION['address'].'', 0, 1);

            // Delivery Details
            $this->Cell(0, 10, 'Pickup Details', 1, 1, 'C');
            $this->Cell(0, 10, 'Order Placed: '.$order_created, 0, 1);
            $createdDate = $order_created;
            $pickupDate = date('Y-m-d', strtotime($createdDate . ' +1 day'));
     // Add seven days to the order date
            $this->Cell(0, 10, 'Pickup Date: '.$pickupDate, 0, 1);
            $this->Cell(0, 10, 'Pickup Address: '.$_SESSION['address'], 0, 1);

            // Order Details
            $this->Cell(0, 10, 'Order Details', 1, 1, 'C');
            $this->Ln(10); // Add a line space of 10 units
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(30, 10, 'Brand', 1, 0);
            $this->Cell(30, 10, 'Type', 1, 0);
            $this->Cell(30, 10, 'Category', 1, 0);
            $this->Cell(40, 10, 'Duration', 1, 0);
            $this->Cell(30, 10, 'Gender', 1, 0);
            $this->Cell(20, 10, 'Size', 1, 1);
           
            
            

            $this->SetFont('Arial', '', 12);
            $this->Cell(30, 10, $brand ,1, 0);
            $this->Cell(30, 10, $type, 1, 0);
            $this->Cell(30, 10, $category, 1, 0);
            $this->Cell(40, 10, $shoe_usage, 1, 0);
            $this->Cell(30, 10, $gender, 1, 0);
            $this->Cell(20, 10, $size, 1, 1);
            

            // Total
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Total', 0, 1);
            $this->SetFont('Arial', '', 12);
            $this->Cell(0, 10, 'Sub Total: Rs ' .$selling_price.' /- ', 0, 1);
            $this->Cell(0, 10, 'Total Amount: Rs '.$selling_price.' /- ', 0, 1);
        }
    }
    $pdf = new PDF();
    $pdf->generatePDF($brand, $type, $category, $shoeUsage, $gender, $order_created, $size, $selling_price);
    $file=time().'.pdf';
    $pdf->Output($file,'D');

} }else {
   
}
?>





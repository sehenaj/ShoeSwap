<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $shoe_usage = $_POST['shoe_usage'];
    $order_created=$_POST['order_created'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $purchasing_price = $_POST['purchasing_price'];
    $selling_price = $_POST['selling_price'];


    require('fpdf/fpdf.php');

    class PDF extends FPDF
    {
        // Header
        function Header()
        {
            $this->Image('images/logo.jpeg', 10, 10, 10);
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0, 10, 'Delivery Receipt', 0, 0, 'C');
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
        function generatePDF($brand, $type, $category, $shoe_usage, $gender,$order_created, $size, $purchasing_price, $selling_price)
        {
            $this->AddPage();
            $this->SetFont('Arial', '', 12);

            // Customer Information
            $this->Cell(0, 10, 'Customer Information', 1, 1, 'C');
            // width, height, text, border, line break, alignment
            $this->Cell(0, 10, 'Name: '.$_SESSION['fname'].' '.$_SESSION['lname'].'', 0, 1);
            $this->Cell(0, 10, 'Email: '.$_SESSION['email'].'', 0, 1);
            $this->Cell(0, 10, 'Phone Number: '.$_SESSION['phone'].'', 0, 1);
            $this->Cell(0, 10, 'Address: '.$_SESSION['address'].'', 0, 1);

            // Delivery Details
            $this->Cell(0, 10, 'Delivery Details', 1, 1, 'C');
            $this->Cell(0, 10, 'Order Placed: '.$order_created, 0, 1);
            $order_created = date('Y-m-d'); // Get the current order date
            $delivery_date = date('Y-m-d', strtotime('+7 days', strtotime($order_created))); // Add seven days to the order date
            $this->Cell(0, 10, 'Delivery Date: '.$delivery_date, 0, 1);
            $this->Cell(0, 10, 'Delivery Address: '.$_SESSION['address'], 0, 1);

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
    $pdf->generatePDF($brand, $type, $category, $shoe_usage, $gender,$order_created, $size, $purchasing_price, $selling_price);
    $file=time().'.pdf';
    $pdf->Output($file,'D');

} else {
   
}




?>
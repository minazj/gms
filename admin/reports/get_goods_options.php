<?php
// Assuming you have already established the database connection using $conn

// Check if the form is submitted and if the report type is selected
if (isset($_GET['report_type'])) {
    $reportType = $_GET['report_type'];
} else {
    // Default report type if not selected
    $reportType = 'goods_available';
}

// Get the list of available goods based on the selected report type
$goodsList = [];
if ($reportType === 'goods_available') {
    $qry = $conn->query("SELECT DISTINCT `name` FROM `goodsavailable_list` ORDER BY `name` ASC");
} elseif ($reportType === 'goods_needed') {
    $qry = $conn->query("SELECT DISTINCT `name` FROM `goodsneeded_list` ORDER BY `name` ASC");
}

// Fetch the goods options and store them in an array
while ($row = $qry->fetch_assoc()) {
    $goodsList[] = $row['name'];
}

// Return the goods options as JSON response
header('Content-Type: application/json');
echo json_encode($goodsList);

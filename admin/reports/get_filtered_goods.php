<?php
// Your database connection and other configurations...
// Include the necessary files to establish the database connection

// Assuming you have already established the database connection using $conn

// Check if the form is submitted and if the report type is selected
if (isset($_GET['report_type'])) {
    $reportType = $_GET['report_type'];
} else {
    // Default report type if not selected
    $reportType = 'goods_available';
}

// Check if the form is submitted and get the selected date and goods
if (isset($_GET['date_created'])) {
    $date = $_GET['date_created'];
} else {
    // Default date if not selected
    $date = date("Y-m-d");
}

if (isset($_GET['goods'])) {
    $selectedGoods = $_GET['goods'];
} else {
    // Default goods if not selected
    $selectedGoods = '';
}

// Convert the selected date to the format used in the SQL query
$formattedDate = date("Y-m-d", strtotime($date));

// Initialize response arrays for both goods available and goods needed tables
$response = array(
    'available' => '',
    'needed' => ''
);

// SQL query for goods available table
$qryAvailable = $conn->query("SELECT * FROM `goodsavailable_list` WHERE DATE(date_created) = '$formattedDate' AND delete_flag = 0 " . ($selectedGoods ? "AND name = '$selectedGoods'" : "") . " ORDER BY `name` ASC ");

// SQL query for goods needed table
$qryNeeded = $conn->query("SELECT * FROM `goodsneeded_list` WHERE DATE(date_created) = '$formattedDate' AND delete_flag = 0 " . ($selectedGoods ? "AND name = '$selectedGoods'" : "") . " ORDER BY `name` ASC ");

// Function to generate the table HTML based on the query result
function generateTableHTML($result)
{
    // Start the HTML table
    $html = '<table class="table table-bordered">
                <colgroup>
                    <col width="5%">
                    <col width="20%">
                    <col width="25%">
                    <col width="20%">
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="px-1 py-1 text-center">#</th>
                        <th class="px-1 py-1 text-center">Date Updated</th>
                        <th class="px-1 py-1 text-center">Goods</th>
                        <th class="px-1 py-1 text-center">Description</th>
                        <th class="px-1 py-1 text-center">Quantity</th>
                        <th class="px-1 py-1 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>';

    // Check if there are any rows in the query result
    if ($result->num_rows > 0) {
        $i = 1;
        // Loop through each row and generate the table rows
        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                        <td class="px-1 py-1 align-middle text-center">' . $i++ . '</td>
                        <td class="px-1 py-1 align-middle">' . date("Y-m-d H:i", strtotime($row['date_created'])) . '</td>
                        <td class="px-1 py-1 align-middle">' . $row['name'] . '</td>
                        <td class="px-1 py-1 align-middle"><p class="m-0 truncate-1">' . $row['description'] . '</p></td>
                        <td class="px-1 py-1 text-center"><p class="m-0 truncate-1">' . $row['available'] . '</p></td>
                        <td class="text-center">
                            ' . ($row['status'] == 1 ? '<span class="badge badge-success px-3 rounded-pill">Active</span>' : '<span class="badge badge-danger px-3 rounded-pill">Inactive</span>') . '
                        </td>
                    </tr>';
        }
    } else {
        // Display a message if no records found
        $html .= '<tr>
                    <td colspan="6" class="py-1 text-center">No records found.</td>
                </tr>';
    }

    // Close the table tags
    $html .= '</tbody>
            </table>';

    return $html;
}

// Generate the table HTML for both goods available and goods needed
$response['available'] = generateTableHTML($qryAvailable);
$response['needed'] = generateTableHTML($qryNeeded);

// Return the response in JSON format
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>

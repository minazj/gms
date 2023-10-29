<?php
// get_filtered_goods_needed.php

// Assuming $conn is your database connection

$date = isset($_GET['date_created']) ? $_GET['date_created'] : date("Y-m-d");
$selectedGoods = isset($_GET['goods']) ? $_GET['goods'] : '';

$formattedDate = date("Y-m-d", strtotime($date));

// SQL query with the goods filter for "Goods Needed" table
$qry2 = $conn->query("SELECT * FROM `goodsneeded_list` WHERE DATE(date_created) = '$formattedDate' AND delete_flag = 0 " . ($selectedGoods ? "AND name = '$selectedGoods'" : "") . " ORDER BY `name` ASC");

// HTML content for the filtered table
$output = '';
if ($qry2->num_rows > 0) {
    while ($row = $qry2->fetch_assoc()) {
        // Generate table rows for the "Goods Needed" table
        $output .= '<tr>';
        $output .= '<td class="px-1 py-1 align-middle text-center">' . $i++ . '</td>';
        $output .= '<td class="px-1 py-1 align-middle">' . date("Y-m-d H:i", strtotime($row['date_created'])) . '</td>';
        $output .= '<td class="px-1 py-1 align-middle">' . $row['name'] . '</td>';
        $output .= '<td class="px-1 py-1 align-middle"><p class="m-0 truncate-1">' . $row['description'] . '</p></td>';
        $output .= '<td class="px-1 py-1 text-center"><p class="m-0 truncate-1">' . $row['needed'] . '</p></td>';
        $output .= '<td class="text-center">';
        if ($row['status'] == 1) {
            $output .= '<span class="badge badge-success px-3 rounded-pill">Active</span>';
        } else {
            $output .= '<span class="badge badge-danger px-3 rounded-pill">Inactive</span>';
        }
        $output .= '</td>';
        $output .= '</tr>';
    }
} else {
    // No records found
    $output .= '<tr><td colspan="6" class="py-1 text-center">No records found.</td></tr>';
}

// Return the HTML content
echo $output;
?>

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

// SQL query for goods available table
$qry = $conn->query("SELECT * FROM `goodsavailable_list` WHERE DATE(date_created) = '$formattedDate' AND delete_flag = 0 " . ($selectedGoods ? "AND name = '$selectedGoods'" : "") . " ORDER BY `name` ASC ");

// SQL query for goods needed table
$qry2 = $conn->query("SELECT * FROM `goodsneeded_list` WHERE DATE(date_created) = '$formattedDate' AND delete_flag = 0 " . ($selectedGoods ? "AND name = '$selectedGoods'" : "") . " ORDER BY `name` ASC ");

// Function to generate the filter form with selected report type
function generateFilterForm($selectedReportType)
{
    ob_start(); // Start output buffering
    ?>

    <div class="row align-items-end">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="date" class="control-label">Choose Date</label>
                <input type="date" class="form-control form-control-sm rounded-0" name="date_created" id="date" value="<?= $date ?>" required="required">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="goods" class="control-label">Choose Goods</label>
                <select class="form-control form-control-sm rounded-0" name="goods" id="goods">
                    <option value="">All Goods</option>
                    <?php
                    // Fetch the list of available goods from the database and display them as options in the dropdown
                    $goodsList = $conn->query("SELECT DISTINCT `name` FROM `goodsavailable_list` ORDER BY `name` ASC");
                    while ($row = $goodsList->fetch_assoc()):
                    ?>
                    <option value="<?= $row['name'] ?>" <?php echo ($selectedGoods === $row['name']) ? 'selected' : ''; ?>>
                        <?= $row['name'] ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <button class="btn btn-sm btn-flat btn-primary bg-gradient-primary"><i class="fa fa-filter"></i> Filter</button>
            </div>
        </div>
    </div>

    <?php
    return ob_get_clean(); // Return the output buffer content
}

echo generateFilterForm($reportType); // Call the function with selected report type

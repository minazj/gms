<?php 
$date = isset($_GET['date_created']) ? $_GET['date_created'] : date("Y-m-d");
$selectedGoods = isset($_GET['goods']) ? $_GET['goods'] : '';

// Convert the selected date to the format used in the SQL query
$formattedDate = date("Y-m-d", strtotime($date));

// SQL queries with the goods filter
$qry = $conn->query("SELECT * FROM `goodsavailable_list` WHERE DATE(date_created) = '$formattedDate' AND delete_flag = 0 " . ($selectedGoods ? "AND name = '$selectedGoods'" : "") . " ORDER BY `name` ASC ");

?>

<div class="content py-5 px-3 bg-gradient-navy">
    <h2>Goods Available Report</h2>
</div>
<div class="row flex-column mt-4 justify-content-center align-items-center mt-lg-n4 mt-md-3 mt-sm-0">
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-2 shadow">
            <div class="card-body">
                <fieldset>
                    <form action="" id="filter-form">
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
                                        <option value="<?= $row['name'] ?>" <?php echo ($selectedGoods == $row['name']) ? 'selected' : ''; ?>>
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
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-2 shadow">
            <div class="card-header py-1">
                <div class="card-tools">
                    <button class="btn btn-flat btn-sm btn-light bg-gradient-light border" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid" id="printout">
                    <table class="table table-bordered">
                        <h4>Goods Available</h4>
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
                        <tbody>
                            <?php 
                            $i = 1;
                            while($row = $qry->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="px-1 py-1 align-middle text-center"><?php echo $i++; ?></td>
                                <td class="px-1 py-1 align-middle"><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                <td class="px-1 py-1 align-middle"><?php echo $row['name'] ?></td>
                                <td class="px-1 py-1 align-middle"><p class="m-0 truncate-1"><?php echo $row['description'] ?></p></td>
                                <td class="px-1 py-1 text-center"><p class="m-0 truncate-1"><?php echo $row['available'] ?></p></td>
                                <td class="text-center">
                                    <?php if($row['status'] == 1): ?>
                                        <span class="badge badge-success px-3 rounded-pill">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>

                            <?php if ($qry->num_rows === 0): ?>
                            <tr>
                                <td colspan="6" class="py-1 text-center">No records found.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
    <div>
        <style>
            html {
                min-height: unset !important;
            }

            @media print {
                body {
                    width: 210mm;
                    height: 297mm;
                }

                table.table-bordered {
                    border-collapse: collapse;
                    width: 100%;
                }

                table.table-bordered th,
                table.table-bordered td {
                    border: 1px solid black;
                    padding: 0.5rem;
                    vertical-align: middle;
                    text-align: center;
                }

                table.table-bordered th:first-child,
                table.table-bordered td:first-child {
                    border-left: 1px solid black;
                }

                table.table-bordered th:last-child,
                table.table-bordered td:last-child {
                    border-right: 1px solid black;
                }

                table.table-bordered tr:last-child th,
                table.table-bordered tr:last-child td {
                    border-bottom: 1px solid black;
                }
            }
        </style>

        <div class="d-flex w-100 align-items-center">
            <center>
                <!--div class="col-2 text-center">
                    <img src="<?php //echo validate_image($_settings->info('logo')) ?>" alt="" class="rounded-circle border" style="width: 5em;height: 5em;object-fit:cover;object-position:center center">
                </div-->
                <div></div>
                <div class="col-8">
                    <div style="line-height:1em">
                        <div class="text-center font-weight-bold h5 mb-0"><h2><?= $_settings->info('name') ?></h2></div>
                        <div class="text-center font-weight-bold h5 mb-0"><h2>Goods Available Report</h2></div>
                        <div class="text-center font-weight-bold h5 mb-0">as of <?= date("F d, Y", strtotime($date)) ?></div>
                    </div>
                </div>
            </center>
        </div>
        <hr>
    </div>
</noscript>

<script>
    function print_r(){
        var h = $('head').clone();
        var el = $('#printout').clone();
        var ph = $($('noscript#print-header').html()).clone();
        h.find('title').text("Report - Print View");

        var nw = window.open("", "_blank", "width="+($(window).width() * .8)+",left="+($(window).width() * .1)+",height="+($(window).height() * .8)+",top="+($(window).height() * .1));
        nw.document.querySelector('head').innerHTML = h.html();
        nw.document.querySelector('body').innerHTML = ph[0].outerHTML;
        nw.document.querySelector('body').innerHTML += el[0].outerHTML;

        // Set the logo image source in the new window
        var logoSrc = "<?php echo validate_image($_settings->info('logo')) ?>";
        nw.document.querySelector('.rounded-circle.border').setAttribute('src', logoSrc);

        nw.document.close();
        start_loader();
        setTimeout(() => {
            nw.print();
            setTimeout(() => {
                nw.close();
                end_loader();
            }, 200);
        }, 300);
    }

    $(function(){
        $('#filter-form').submit(function(e){
            e.preventDefault();
            location.href = './?page=goodsAvailableReport&'+$(this).serialize();
        });
        $('#print').click(function(){
            print_r();
        });
    });
</script>




<style>
    #tableAccordion button.btn.btn-block.text-left.font-weight-bolder:focus {
        box-shadow: none !important;
    }
    #search-field .form-control.rounded-pill{
        border-top-right-radius:0 !important;
        border-bottom-right-radius:0 !important;
        border-right:none !important
    }
    #search-field .form-control:focus{
        box-shadow:none !important;
    }
    #search-field .form-control:focus + .input-group-append .input-group-text{
        border-color: #86b7fe !important
    }
    #search-field .input-group-text.rounded-pill{
        border-top-left-radius:0 !important;
        border-bottom-left-radius:0 !important;
        border-right:left !important
    }
</style>
<div class="section py-5">
    <div class="container">
        <h3 class="text-center"><b>Goods Available List</b></h3>
        <hr>

        <!--div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12 col-sm-12 mb-3">
                <div class="input-group input-group-lg" id="search-field">
                    <input type="search" class="form-control form-control-lg  rounded-pill" aria-label="Search table Field" id="search" placeholder="Search">
                    <div class="input-group-append">
                        <span class="input-group-text rounded-pill bg-transparent"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div-->

<div class="card card-outline rounded-0">
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-hover table-striped" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="25%%">
                    <col width="30%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                        $qry = $conn->query("SELECT * from `goodsavailable_list` where `status` = 1 and delete_flag = 0 order by `name` asc ");
                        while($row = $qry->fetch_assoc()):
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>

                            <td><?php echo $row['name'] ?></td>

                            <td><p class="m-0 truncate-1"><?php echo $row['description'] ?></p></td>

                            <td><p class="m-0 truncate-1"><?php echo $row['available'] ?></p></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.table').dataTable({
            columnDefs: [
                    { orderable: false, targets: [3] }
            ],
            order:[0,'asc']
        });
        $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
    })
</script>
<!--script>
    $(function(){
        $('.table_collapse').on('show.bs.collapse',function(){
            var card = $(this).closest('.card')
            var icon = card.find('.collapse-icon')
            icon.removeClass('fa-plus').addClass('fa-minus')
        })
        $('.table_collapse').on('hide.bs.collapse',function(){
            var card = $(this).closest('.card')
            var icon = card.find('.collapse-icon')
            icon.removeClass('fa-minus').addClass('fa-plus')
        })
        $('#search').on('input', function(){
            var _search = $(this).val().toLowerCase()
            $('#tableAccordion .card').each(function(){
                var _text = $(this).text().toLowerCase()
                _text = _text.trim()
                if(_text.includes(_search) === false){
                    $(this).toggle(false)
                }else{
                    $(this).toggle(true)
                }
            })
        })
    })
</script-->
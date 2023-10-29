<?php 
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT b.*,t.name as `goodsneeded`, t.description as `goodstype` FROM `donatorapp_list` b inner join `goodsneeded_list` t on b.goodsneeded_id = t.id where b.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k)){
                $$k = $v;
            }
        }
    }else{
        echo '<script> alert("Unknown donatorApp\'s ID."); location.replace("./?page=donatorApp"); </script>';
    }
}else{
    echo '<script> alert("donatorApp\'s ID is required to access the page."); location.replace("./?page=donatorApp"); </script>';
}
?>
<div class="content py-3">
    <div class="card card-outline card-navy rounded-0 shadow">
        <div class="card-header">
            <h4 class="card-title">Donator Application Details: <b><?= isset($code) ? $code : "" ?></b></h4>
            <div class="card-tools">
                <a href="./?page=donatorApp" class="btn btn-default border btn-sm"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Donator Name</b></div>
                    <div class="col-9 border mb-0"><?= isset($name) ? $name : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Phone Number</b></div>
                    <div class="col-9 border mb-0"><?= isset($contact) ? $contact : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Email</b></div>
                    <div class="col-9 border mb-0"><?= isset($email) ? $email : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Address</b></div>
                    <div class="col-9 border mb-0"><?= isset($address) ? $address : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Date</b></div>
                    <div class="col-9 border mb-0"><?= isset($date) ? date("M d, Y", strtotime($date)) : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Goods</b></div>
                    <div class="col-9 border mb-0"><?= isset($goodsneeded) ? $goodsneeded : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Description</b></div>
                    <div class="col-9 border mb-0"><?= isset($goodstype) ? $goodstype : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Quantity</b></div>
                    <div class="col-9 border mb-0"><?= isset($quantity) ? $quantity : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Remark</b></div>
                    <div class="col-9 border mb-0"><?= isset($remark) ? $remark : '' ?></div>

                    <div class="col-3 border border-navy bg-gradient-navy mb-0"><b>Status</b></div>
                    <div class="col-9 border mb-0">
                        <?php 
                        $status = isset($status) ? $status : '';
                        switch($status){
                            case 0:
                                echo '<span class="badge badge-default border px-3 rounded-pill">Pending</span>';
                                break;
                            case 1:
                                echo '<span class="badge badge-primary px-3 rounded-pill">Confirmed</span>';
                                break;
                            case 2:
                                echo '<span class="badge badge-info px-3 rounded-pill">Arrived</span>';
                                break;
                            case 3:
                                echo '<span class="badge badge-warning px-3 rounded-pill">No Show</span>';
                                break;
                            case 4:
                                echo '<span class="badge badge-success px-3 rounded-pill">Done</span>';
                                break;
                            case 5:
                                echo '<span class="badge badge-danger px-3 rounded-pill">Cancelled</span>';
                                break;
                        }
                        ?>
                    </div>
                </div>
                <div class="clear-fix mb-2"></div>
                <div class="text-center">
                    <button class="btn btn-primary bg-gradient-navy border col-3 rounded-pill" id="update_status" type="button"><i class="fa fa-edit"></i> Update Status</button>
                    <button class="btn btn-danger bg-gradient-danger border col-3 rounded-pill" id="delete_donatorapp" type="button"><i class="fa fa-trash"></i> Delete Donator Application</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

$(function(){
    $('#update_status').click(function(){
        uni_modal("Update Application Status", "donatorApp/update_status.php?id=<?= isset($id) ? $id : '' ?>")
    })
    $('#delete_donatorapp').click(function(){
        _conf("Are you sure to delete this application permanently?","delete_donatorapp",[])
    })
})
function delete_donatorapp($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_donatorapp",
			method:"POST",
			data:{id: '<?= isset($id) ? $id : "" ?>'},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.replace('./?page=donatorApp');
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>
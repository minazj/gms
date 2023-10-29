<section class="py-5">
    <div class="container">
        <?php if($_settings->chk_flashdata('success_fix')): ?>
            <div class="alert alert-success">
                <div class="d-flex w-100 align-items-center">
                    <div class="col-11"><?= $_settings->flashdata('success_fix') ?></div>
                    <div class="col-1 text-right">
                        <button class="btn-close" type="button" onclick="$(this).closest('.alert').hide('slow').remove()"></button>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <h2 class="text-center"><b>Victim Application Form</b></h2>
        <center>
            <hr class="bg-navy" width="10%" style="height:2px;opacity:1">
        </center>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <div class="card card-default rounded-0 shadow blur">
                    <div class="card-body container-fluid">
                        <form action="" id="victim-form">
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group mb-3">
                                        <label for="name" class="control-label mx-3">Full Name</label>
                                        <input maxlength="50" placeholder="Enter your name" type="text" class="form-control rounded-pill" id="name" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mb-3">
                                        <label for="contact" class="control-label mx-3">Phone Number</label>
                                        <input maxlength="11" placeholder="Enter your phone number" type="text" class="form-control rounded-pill" id="contact" name="contact">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mb-3">
                                        <label for="email" class="control-label mx-3">Email</label>
                                        <input maxlength="50" placeholder="sample@gmail.com" type="email" class="form-control rounded-pill" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mb-3">
                                        <label for="address" class="control-label mx-3">Address</label>
                                        <input maxlength="50" placeholder = "Bukit Changgang, Banting" type="address" class="form-control rounded-pill" id="address" name="address">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mb-3">
                                        <label for="date" class="control-label mx-3">Date</label>
                                        <input type="datetime-local" class="form-control rounded-pill" id="date" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mb-3">
                                        <label for="goodsavailable_id" class="control-label mx-3">Goods Available at Shelter</label>
                                        <select class="form-control rounded-pill" id="goodsavailable_id" name="goodsavailable_id">
                                            <option value="" selected disabled></option>
                                            <?php 
                                            $needed = $conn->query("SELECT * FROM `goodsavailable_list` where `status` = 1 and delete_flag = 0 order by abs(`name`) asc");
                                            while($row = $needed->fetch_assoc()):
                                            ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group mb-3">
                                        <label for="goodstype" class="control-label mx-3">Goods Type</label>
                                        <select class="form-control rounded-pill" id="goodstype" name="goodstype">
                                            <option value="" selected disabled></option>
                                            <?php 
                                           // $needed = $conn->query("SELECT * FROM `goodsavailable_list` where `status` = 1 and delete_flag = 0 order by abs(`name`) asc");
                                           // while($row = $needed->fetch_assoc()):
                                            ?>
                                            <option value="<?= $row//['id'] ?>"><?= $row//['description'] ?></option>
                                            <?php //endwhile; ?>
                                        </select>
                                    </div>
                                </div>-->
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mb-3">
                                        <label for="quantity" class="control-label mx-3">Quantity</label>
                                        <input placeholder = "Enter your quantity" type="number" class="form-control rounded-pill" name="quantity" id="quantity" required="required" value="<?= isset($quantity) ? $quantity : '' ?>">
                                        <!--select class="form-control rounded-pill" id="quantity" name="quantity">
                                            <option> Select </option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option-->
                                        </select>
                                        <!--<input type="quantity" class="form-control rounded-pill" id="quantity" name="quantity">-->
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                     <div class="form-group mb-3">
                                        <label for="suggestion" class="control-label mx-3">Remark</label>
                                        <textarea maxlength="100" placeholder="Enter your comment" type="text" rows="3" class="form-control" id="suggestion" name="suggestion"></textarea>

                                        <!--<input  class="form-control" id="suggestion" name="suggestion">-->
                                    </div>
                                   <!-- <div class="form-group mb-3">
                                        <label for="suggestion" class="control-label mx-3">Suggestion</label>
                                        <input type="text" class="form-control" id="suggestion" name="suggestion">
                                    </div>-->
                                    <!--<div class="form-group mb-3">
                                        <label for="suggestion" class="control-label mx-3">Suggestion</label>
                                        <textarea type="text" rows="3" class="form-control" id="suggestion"></textarea>-->
                                    </div>
                                </div>
                             <!--div class="clear-fix py-3"></div-->
                            <div class="text-center">
                                <button class="btn btn-primary btn-lg w-50 rounded-pill">Submit</button>
                            </div>   
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function(){
        $('#goodsavailable_id').select2({
            width:'100%',
            placeholder:"Please select here",
            containerCssClass :"form-control rounded-pill"
        }).addClass("form-control rounded-pill")

        /**('#goodstype').select2({
            width:'100%',
            placeholder:"Please select here",
            containerCssClass :"form-control rounded-pill"
        }).addClass("form-control rounded-pill")*/

        $('#victim-form').submit(function(e){
            e.preventDefault()
            var _this = $(this)
            var pop_msg = $('<div>')
            pop_msg.addClass("alert alert-danger rounded-0 err-msg")
            pop_msg.hide()
            $('.err-msg').remove()
            start_loader()
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_victimapp",
                method:'POST',
                data:_this.serialize(),
                dataType:'JSON',
                error:err=>{
                    console.log(err)
                    pop_msg.text("An error occurred.")
                    _this.prepend(pop_msg)
                    pop_msg.show()
                    $('html, body').scrollTop(0)
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload()
                    }else if(!!resp.msg){
                        pop_msg.text(resp.msg)
                        _this.prepend(pop_msg)
                        pop_msg.show()
                        $('html, body').scrollTop(0)
                    }else{
                        pop_msg.text("An error occurred.")
                        _this.prepend(pop_msg)
                        pop_msg.show()
                        $('html, body').scrollTop(0)
                    }
                    end_loader()
                }
            })
        })
    })
</script>
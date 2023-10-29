<style>
  .dropbtn {
  background-color: inherit;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}
  .dropdown {
  position: relative;
  display: inline-block;
}
  .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 150px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: none;}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-navy">
            <div class="container px-4 px-lg-5 ">
                <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="./">
                <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                <?php echo $_settings->info('short_name') ?>
                </a>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link text-white" aria-current="page" href="./">Home</a></li>

                        <div class="dropdown">
                          <li class="nav-item">
                              <a class="nav-link text-white" aria-current="page" >Goods <i class="fas fa-caret-down"></i></a>
                              <li class="dropdown-content">
                                <a href="./?p=goodsAvailable">Goods Available</a> 
                                <a href="./?p=goodsNeeded">Goods Needed</a>
                              </li>
                          </li>
                        </div>

                        <div class="dropdown">
                          <li class="nav-item">
                              <a class="nav-link text-white" aria-current="page">Application <i class="fas fa-caret-down"></i></a>
                              <li class="dropdown-content">
                                <a href="./?p=donatorapp">Donate Goods</a> 
                                <a href="./?p=victimapp">Victim Goods</a>
                              </li>
                          </li>
                        </div>
                        

                        <!--<li class="nav-item"><a class="nav-link text-white" aria-current="page" href="./?p=reservation">Reserve</a></li>-->

                        <!--<li class="nav-item"><a class="nav-link text-white" aria-current="page" href="./?p=tables">Table List</a></li>-->

                        <li class="nav-item"><a class="nav-link text-white" href="./?p=about">About</a></li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <a class="font-weight-bolder text-light mx-2 text-decoration-none" href="./admin">Admin Login</a>
                    </div>
                </div>
            </div>
        </nav>
<script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })

  $('#search-form').submit(function(e){
    e.preventDefault()
     var sTxt = $('[name="search"]').val()
     if(sTxt != '')
      location.href = './?p=products&search='+sTxt;
  })
</script>
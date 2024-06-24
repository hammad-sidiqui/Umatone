<style> 


@font-face {
    font-family: 'NotoSansJP-Light';
    src: URL('/user/assets/fonts/noto-sans-jp/NotoSansJP-Light.otf') format('truetype');
}
body {
 background: #eee;
 font-family: NotoSansJP-Light;
}
.card{
    height: auto;
    margin-top: auto;
    margin-bottom: auto;
    width: 100%;
    background: rgba(255, 215, 108, 0.05);
    border: 2px solid #FFD76C;
    box-sizing: border-box;
    border-radius: 2px;
}

.card input[type="radio"]:checked + .card-body{
    background: #FFD76C66;
}
.card2{
    height: auto;
    margin-top: auto;
    margin-bottom: auto;
    width: 100%;
    background: rgba(255, 215, 108, 0.05);
    border: 2px solid #10E28A;
    box-sizing: border-box;
    border-radius: 2px;
}

.card2 input[type="radio"]:checked + .card-body{
    background: #10E28A66;
}

.container{
  	height: 100vh;
  	align-content: center;
}
input:focus{
	outline: 0 0 0 0  !important;
	box-shadow: 0 0 0 0 !important;
}
.login_btn{
  	color: #406683;
  	background-color: #FFD76C;
  	width: 100%;
}
.login_btn:hover{
	color: #406683;
	background-color: #FF6A62;
}

.form-control{
    width: 100%;
    background: transparent;
    border: 1px solid #D1DCE6;
    box-sizing: border-box;
    border-radius: 6px;
    height:35px;
}
.apply{
    width: 100%;
    background: #FFFFFF;
    border: 3px solid #FF6A62;
    box-sizing: border-box;
    border-radius: 100px;
    color:#FF6A62;
}
.getMyPlan{
    width: 100%;
    background: #FF6A62;
    box-sizing: border-box;
    border-radius: 100px;
    color:#FFFFFF;
    height:35px;
    border: 3px solid #FF6A62;
}
</style>


<!--  -->

<div class="col-12 col-md-4" style="margin:auto">
  <div class="container mt-5">
        <form id="formPlan" method="post" >
        <div class="row d-flex justify-content-center align-items-center">
                <h2 style="margin:20px;text-align: center;">CHOOSE YOUR PLAN</h2>
                <div class="col-md-12">
                        <label style="display: inherit;">
                        
                        <div class="card">
                            <input type="radio" name="check_plan" value="1" hidden/>
                			<div class="card-body" style="padding:6px">
                					<div class="row">
                					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;">
                					        <label><b>7-DAY PLAN</b></label>
                					    </div>
                					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;">
                					        <div style="font-weight: bold;">$9.99 per</div>
                					        <div>7 days</div>
                					    </div>
                					</div>
                			</div>
        		        </div>
        		        </label>
                  </div>
                  <div class="col-md-12 mt-2">
                        
                        <label style="display: inherit;">
                        <div style="background: #10E28A;font-size: 10px;text-align: center;color: #ffffff;">MOST POPULAR</div>
                        <div class="card2">
                            <input type="radio" name="check_plan" value="2" hidden/>
                            
                			<div class="card-body" style="padding:6px">
                					<div class="row">
                					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;">
                					        <label><b>1-MONTH PLAN</b></label>
                					    </div>
                					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;">
                					        <div style="font-weight: bold;">$28.56 per</div>
                					        <div>1 month</div>
                					    </div>
                					</div>
                			</div>
        		        </div>
        		        </label>
                  </div>
                  <div class="col-md-12 mt-2">
                        <label style="display: inherit;">
                        <div class="card">
                            <input type="radio" name="check_plan" value="3" hidden/>
                			<div class="card-body" style="padding:6px">
                					<div class="row">
                					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;">
                					        <label><b>3-MONTH PLAN</b></label>
                					    </div>
                					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;">
                					        <div style="font-weight: bold;">$42.84 per</div>
                					        <div>3 months</div>
                					    </div>
                					</div>
                			</div>
        		        </div>
        		        </label>
                  </div>
              
          </div>
      
        <div class="row d-flex">
            <h3 style="margin:20px 0px 0px 0px">Apply promo code </h3>
            
            <div class="col-md-8 mt-2 ">
                <input name="code" class="form-control "/>
            </div>
            <div class="col-md-4 mt-2 ">
                <input name="code" type="button" class="form-control apply" value="Apply"/>
            </div>
        </div>
        
        <div class="row d-flex ">
            <div class="col-md-12 mt-3 ">
                <input name="code" type="submit" class="form-control getMyPlan" value="Get my plan"/>
            </div>
            
            <div class="col-md-12 mt-3 ">
                <label style="font-size: 10px;line-height: 13px;">To avoid any disruption, the subscription you selected will automatically be extended for a successive renewal period of 1-Month and at the full price of $28.56. To learn more, visit our Cancellation terms.</label>
            </div>
        </div>
        
        </form>
        
        
        

<script src="https://checkout.stripe.com/checkout.js"></script>
<script type="text/javascript">
$( "#formPlan" ).submit(function( event ) {
    
    event.preventDefault();
    
    var handler = StripeCheckout.configure({
        key: 'pk_test_51JmLyNB02dNGS7M59yTqIvWFdklAflQbBt0kmZcPbHwIrzSdSKdn33ykFZ41g96jCrBtgb1L9vRKuE14um0qy5b000xgAsMRFt', // your publisher key id
        locale: 'auto',
        token: function (token) {
          
            $.ajax({
                url:"<?php echo base_url('home/payment'); ?>",
                method: 'post',
                data: { tokenId: token.id, amount: amount,productoId: <?=$idp;?> },
                dataType: "json",
                success: function( response ) {
                    if(response.data.status=="succeeded"){
                        //toastr.warning('Payment completed successfully');
                        window.location.href = "<?= base_url('customer') ?>"
                    }else{
                        window.location.href = "<?= base_url('customer') ?>"
                        //toastr.warning('The payment is invalid');
                    }
                }
            })
            
        }
    });
    
    var plan = "";
    
    if($("input[name='check_plan']:checked").val()==1){
        amount = (9.99*100);
        plan = "7-DAY PLAN";
    }
    if($("input[name='check_plan']:checked").val()==2){
        amount = (28.56*100);
        plan = "1-MONTH PLAN";
    }
    if($("input[name='check_plan']:checked").val()==3){
        amount = (42.84*100);
        plan = "3-MONTH PLAN";
    }
    
    handler.open({
        name: 'Umatone',
        description: plan,
        amount: amount
    });
    
    
});
</script>
  </div>
</div>





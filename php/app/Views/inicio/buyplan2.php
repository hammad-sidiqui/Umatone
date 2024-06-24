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
  	height: auto;
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
.elementor-kit-4 button, .elementor-kit-4 input[type="button"], .elementor-kit-4 input[type="submit"], .elementor-kit-4 .elementor-button{
    color: #406683;
    border-style: solid;
    border-color: #FF6A62;
}

</style>

<script src="https://umatone.com/user/assets/jquery.min.js"></script>
<!--  -->
<div style="width:500px;margin:auto;display:flex;justify-content:center">
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
                					<div class="row" style="display:flex;">
                					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;width:50%;padding:20px">
                					        <label><b>7-DAY PLAN</b></label>
                					    </div>
                					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;width:50%;">
                					        <div style="font-weight: 800;">$9.99 per</div>
                					        <div>7 days</div>
                					    </div>
                					</div>
                			</div>
        		        </div>
        		        </label>
                  </div>
                  <div class="col-md-12 mt-2" style="margin-top:10px">
                        
                        <label style="display: inherit;">
                        <div style="background: #10E28A;font-size: 10px;text-align: center;color: #ffffff;">MOST POPULAR</div>
                        <div class="card2">
                            <input type="radio" name="check_plan" value="2" hidden/>
                            
                			<div class="card-body" style="padding:6px">
                					<div class="row" style="display:flex;">
                					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;width:50%;padding:20px">
                					        <label><b>1-MONTH PLAN</b></label>
                					    </div>
                					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;width:50%;">
                					        <div style="font-weight: 800;">$28.56 per</div>
                					        <div>1 month</div>
                					    </div>
                					</div>
                			</div>
        		        </div>
        		        </label>
                  </div>
                  <div class="col-md-12 mt-2" style="margin-top:10px">
                        <label style="display: inherit;">
                        <div class="card">
                            <input type="radio" name="check_plan" value="3" hidden/>
                			<div class="card-body" style="padding:6px">
                					<div class="row" style="display:flex;">
                					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;width:50%;padding:20px">
                					        <label><b>3-MONTH PLAN</b></label>
                					    </div>
                					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;width:50%;">
                					        <div style="font-weight: 800;">$42.84 per</div>
                					        <div>3 months</div>
                					    </div>
                					</div>
                			</div>
        		        </div>
        		        </label>
                  </div>
              
          </div>
          
        <h5 style="margin:20px 0px 0px 0px">Apply promo code </h5>
      
        <div class="row d-flex" style="display:flex;margin-top:20px">
            <div class="col-md-8 mt-2 " style="width:60%">
                <input name="code" class="form-control "/>
            </div>
            <div class="col-md-4 mt-2 " style="width:40%;text-align:center">
                <input name="code" type="button" class="form-control apply" value="Apply" style="width:90%;line-height: 0px;"/>
            </div>
        </div>
        
        <div class="row d-flex ">
            <div class="col-md-12 mt-3 " style="margin-top:10px">
                <input name="code" type="submit" class="form-control getMyPlan" value="Get my plan" style="line-height: 0px;color:#ffffff"/>
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
    
    let params = new URLSearchParams(location.search);
    var idp = params.get('idp');
    alert(1);
    
    var handler = StripeCheckout.configure({
        key: 'pk_test_51JmLyNB02dNGS7M59yTqIvWFdklAflQbBt0kmZcPbHwIrzSdSKdn33ykFZ41g96jCrBtgb1L9vRKuE14um0qy5b000xgAsMRFt', // your publisher key id
        locale: 'auto',
        token: function (token) {
          
            $.ajax({
                url:"http://umatone.deiby.esy.es/home/payment",
                method: 'post',
                data: { tokenId: token.id, amount: amount,productoId: idp },
                dataType: "json",
                success: function( response ) {
                    alert(2);
                    if(response.data.status=="succeeded"){
                        //toastr.warning('Payment completed successfully');
                        //window.location.href = "https://umatone.com/user/login/customer"
                        window.location.href = "https://umatone.com/user/login/customer?idp="+idp;
                    }else{
                        window.location.href = "https://umatone.com/user/login/customer?idp="+idp;
                       // window.location.href = "https://umatone.com/user/login/customer"
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
</div>

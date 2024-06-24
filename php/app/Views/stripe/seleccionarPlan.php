<?php $this->session = \Config\Services::session();  ?>

<link href="https://umatone.com/user/assets/style/css/app.css" rel="stylesheet">







<script src="https://umatone.com/user/assets/jquery.min.js"></script>



<link href="https://umatone.com/user/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">

<script src="https://umatone.com/user/assets/libs/toastr/build/toastr.min.js"></script>

<!--  -->





<style> 

@font-face {

    font-family: 'NotoSansJP-Light';

    src: URL('/user/assets/fonts/noto-sans-jp/NotoSansJP-Light.otf') format('truetype');

}

body {

 background: transparent;

 font-family: NotoSansJP-Light;

 overflow:hidden;

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

.most-popular-price {
    position: relative;
}

.most-popular-price:before {
    position: relative;
    font-size: 11px;
    background: #ff6a62;
    color: #fff;
    padding: 3px 8px;
    top: -2px;
    content: "Save 50%";
    right: 10px;
}

</style>





<form id="formPlan" method="post" action="https://umatone.com/user/home/index22" >

            

    

        <div class="col-12 col-md-4" style="margin:auto">

            <div class="container mt-5">    

            

                <div class="row d-flex justify-content-center align-items-center">

                        <h2 style="margin:20px;text-align: center;">CHOOSE YOUR PLAN</h2>

                

                        <div class="col-md-12">

                                <label style="display: inherit;">

                                

                                <div class="card">

                                    <input type="radio" name="check_plan" value="price_1LNH2vB02dNGS7M5Jw15XVs9" hidden required/>

                        			<div class="card-body" style="padding:6px">

                        					<div class="row" style="display:flex;">

                        					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;width:50%;padding:20px">

                        					        <span><b>7-DAY PLAN</b></span>

                        					    </div>

                        					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;width:50%;padding:20px">

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

                                    <input type="radio" name="check_plan" value="price_1LNH3ZB02dNGS7M5DZWcSHgK" hidden required/>

                                    

                        			<div class="card-body" style="padding:6px">

                        					<div class="row" style="display:flex;">

                        					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;width:50%;padding:20px">

                        					        <span><b>1-MONTH PLAN</b></span>

                        					    </div>

                        					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;width:50%;padding:20px">

                        					        <div style="font-weight: 800;" class="most-popular-price">$19,98 <del>39,96</del> per</div>

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

                                    <input type="radio" name="check_plan" value="price_1LNH4qB02dNGS7M5kzG9OsQx" hidden required/>

                        			<div class="card-body" style="padding:6px">

                        					<div class="row" style="display:flex;">

                        					    <div class="col-6 col-md-8" style="align-content: center;display: flex;align-items: center;width:50%;padding:20px">

                        					        <span><b>3-MONTHS PLAN</b></span>

                        					    </div>

                        					    <div class="col-6 col-md-4" style="line-height: 1.4;text-align: center;width:50%;padding:20px">

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

                        <input name="code_promo" class="form-control "/>

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

            

             </div>

        </div>

  

        

        </form>

        

        

        <script>

            

        </script>

        

        

   

        

<script src="https://umatone.com/user/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>



<!--

<script src="https://checkout.stripe.com/checkout.js"></script>

<script type="text/javascript">

$( "#formPlan" ).submit(function( event ) {

    

    

    event.preventDefault();

    

    let params = new URLSearchParams(location.search);

    var idp = params.get('idp');

    var keypublica = params.get('key');

    var ema = params.get('ema');

    

    var handler = StripeCheckout.configure({

        key: keypublica, // your publisher key id

        locale: 'en',

        token: function (token) {

          

            $.ajax({

                url:"https://umatone.com/user/home/payment2",

                method: 'post',

                data: { tokenId: token.id, amount: amount,productoId: idp },

                dataType: "json",

                success: function( response ) {

                    if(response.data.status=="succeeded"){

                        //toastr.warning('Payment completed successfully');

                        //window.location.href = "https://umatone.com/user/login/customer"

                        window.location.href = "https://umatone.com/user/login/customer?idp="+idp;

                    }else{

                        

                        toastr.warning('payment status: '+response.data.status);

                        //window.location.href = "https://umatone.com/user/login/customer?idp="+idp;

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



-->

  


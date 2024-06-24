<style> 


@font-face {
    font-family: 'NotoSansJP-Light';
    src: URL('/user/assets/fonts/noto-sans-jp/NotoSansJP-Medium.otf') format('truetype');
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
  border: 3px solid #FFD76C;
  box-sizing: border-box;
  border-radius: 6px;
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

.cuadrado{
    width:100px;
    height:100px;
    padding:5px;
    display: flex;
    align-items: center
}
.titulos{
    width:100px;height:30px;padding:5px;text-align: center;
}

ul.puntos {
  list-style: none;
}

ul.puntos li::before {
  content: "\2022";
  color: #FFD76C;
  font-weight: bold;
  display: inline-block; 
  width: 1em;
  margin-left: -2em;
}

.shoppinglist{
    columns: 2;margin: 40px;line-height;line-height: 1.6;list-style: none;
}
@media (max-width: 600px) {
    .cuadrado{
        width:70px;
        height:70px;
        padding:5px;
        display: flex;
        align-items: center
    }
    .titulos{
        width:70px;height:30px;padding:5px;text-align: center;
    }
    .shoppinglist{
        columns: 1;margin: 5px;line-height;line-height: 1.6;list-style: none;
    }
}


</style>



<div class="col-11 col-md-12" style="margin:0px;background:#B2D8F4;padding-bottom: 70px;width: 100%;">
  <div class="row mt-5">
      <div class="col-12 col-md-8" style="margin:auto;">
        <h1 style="text-align: center;margin: 20px;font-weight: bold;"><?=$titulo?></h1>
        
        <h1 style="text-align: center;margin: 20px;font-weight: bold;color:#406683">
            <span style="vertical-align: text-top;">
                <i class="fa fa-angle-left mr-3 flecha1" style="font-size: 20px;margin:2px;cursor:pointer; color: #ffffff; cursor:pointer" onclick="pagWeek(-1)" ></i>
            </span>
            <span class="titleWeek">Week 1</span>
            <span style="vertical-align: text-top;">
                <i class="fa fa-angle-right ml-3 flecha2" style="font-size: 20px;margin:2px;cursor:pointer; color: #406683; cursor:pointer" onclick="pagWeek(1)" ></i>
            </span>
        </h1>
        <div style=" overflow:auto;padding: 10px;text-align: center;">
            <div style="display: inline-flex; justify-content: center;">
                <div >
                    <div class="titulos">
                    </div>
                    <div class="cuadrado">
                        Breakfast
                    </div>
                    <div class="cuadrado">
                        1st snack
                    </div>
                    <div class="cuadrado">
                        2st snack
                    </div>
                    <div class="cuadrado">
                        Dinner
                    </div>
                </div>
                <?=$plan?>
              
            </div>
        </div> 
       </div> 
  </div>
</div>





<div class="col-11 col-md-12" style="margin:auto;background:#ffffff;padding-bottom: 70px;">
  <div class="row mt-5">
      <div class="col-12 col-md-8" style="margin:auto">
          <h1 style="text-align: center;margin: 20px;font-weight: bold;">Shopping list</h1>
          <div class="row">
              <div class="col-12 col-md-12" style="background: rgba(255, 215, 108, 0.2);border: 2px solid #FFD76C;box-sizing: border-box;border-radius: 6px;">
                  <ul class="shoppinglist" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;height: 400px;">
                      
                  <li>
                      
                    
                    <ul class="puntos">
                        <?php
                        if($ingredientes->code==200){ 
                            foreach($ingredientes->data as $key){
                                echo '<li style="font-weight: 900;">'.$key->descripcion.'</li>';
                            }
                        } ?>
                      
                    </ul>
                  </li>
                  
                </ul>
                
                 <div style="text-align:center">  
                <i class="fa fa-angle-down m-3 flecha3" style="font-size: 20px;margin:2px;cursor:pointer; color: #406683; cursor:pointer; margin:auto" onclick="flecha3()"></i>
                <i class="fa fa-angle-up m-3 flecha4" hidden style="font-size: 20px;margin:2px;cursor:pointer; color: #406683; cursor:pointer; margin:auto" onclick="flecha4()"></i>
                 </div>  
              </div>  
          </div> 
          
          
          
      </div>
  </div>
</div>




<div class="col-11 col-md-12" style="margin:auto;background:#ffffff;padding-bottom: 70px;">
  <div class="row mt-5">
      <div class="col-12 col-md-8" style="margin:auto">
          <h1 style="text-align: center;margin: 20px;font-weight: bold;">Recommendations</h1>
          <p style="text-align: center;font-weight: 900;">This is your meal plan that we customized for you. Always consult your doctor following any nutrition or exercise plan. Your personalized meal plan contains dishes besed on your choice. Click on a dish to see the recipe. We calculated the food according to your parameters. In order to benefit from a well-balanced diet properly, check our tips below.</p>
          <div class="row mt-4">
              <div class="col-12 col-md-4 mt-3" >
                  <div style="background: rgba(255, 215, 108, 0.2);border: 2px solid #FFD76C;box-sizing: border-box;border-radius: 6px;padding: 20px 20px;height: 290px;"> 
                    <h3 style="font-weight: bold;">Sleep</h3>
                    <p>We strongly recommend falling asleep before 11 pm. You should sleep at least 7 hours to recover physically and mentally. This will reduce the stress you feel and infuse power to your body.</p>
                  </div> 
              </div>  
              <div class="col-12 col-md-4 mt-3" >
                  <div style="background: rgba(255, 215, 108, 0.2);border: 2px solid #FFD76C;box-sizing: border-box;border-radius: 6px;padding: 20px 20px;height: 290px;"> 
                  <h3 style="font-weight: bold;">Meals frequency</h3>
                  <p>You should not feel hunger, but also eating too often may be harmful to the program. That`s why we recommend eating every 2 -3 hours.</p>
                  </div> 
              </div> 
              <div class="col-12 col-md-4 mt-3" >
                  <div style="background: rgba(255, 215, 108, 0.2);border: 2px solid #FFD76C;box-sizing: border-box;border-radius: 6px;padding: 20px 20px;height: 290px;"> 
                  <h3 style="font-weight: bold;">Alcohol</h3>
                  <p>You should abstain from alcohol when following the plan. If you are in a siruation you cannot refuse an offer to drink, please limit yourself with a glass of red wine.</p>
                  </div>
              </div>  
              <div class="col-12 col-md-4 mt-3" >
                  <div style="background: rgba(255, 215, 108, 0.2);border: 2px solid #FFD76C;box-sizing: border-box;border-radius: 6px;padding: 20px 20px;height: 290px;"> 
                  <h3 style="font-weight: bold;">Drinks</h3>
                  <p>We recommend drinking a glass of warm lemon water just after waking up. This will help boost your metabolism. Consume your daily water norm evenly. Note that other beverages such as tea, coffee or juice are not counted as water</p>
                  </div>
              </div> 
              <div class="col-12 col-md-4 mt-3" >
                  <div style="background: rgba(255, 215, 108, 0.2);border: 2px solid #FFD76C;box-sizing: border-box;border-radius: 6px;padding: 20px 20px;height: 290px;"> 
                  <h3 style="font-weight: bold;">Allergies</h3>
                  <p>If you have any medical restrictions or allergies to the ingredients in your meal plan, please contact us. Our team will provide you with a safe substitute.</p>
                  </div>
              </div> 
              <div class="col-12 col-md-4 mt-3" >
                  <div style="background: rgba(255, 215, 108, 0.2);border: 2px solid #FFD76C;box-sizing: border-box;border-radius: 6px;padding: 20px 20px;min-height: 290px;height: auto;"> 
                  <h3 style="font-weight: bold;">Physical activity</h3>
                  <p>Any meal program becomes more efficient when combined with fifness, running or at least regular walking. We provide an  individual list of home exercises to boost your metabolism. These exercises are essential for weight loss and should be done on a regular basis, at least 5 times a week to achieve your goals.</p>
                  </div> 
              </div> 
          </div>   
          
      </div>
  </div>
</div>



<div style="padding: 50px;text-align: center;">

<a style="position: initial;border: 3px solid #FFD76C;box-sizing: border-box;border-radius: 100px;padding: 5px;width: 150px;display: inline-block;text-align: center;" href="#!" onclick="cancelSuscription();">Cancel subscription</a>
</div>


<div class="modal fade bd-example-modal-sm" id="Recipe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="contenidoModal">
        
      
    </div>
  </div>
</div>


<link href="<?= base_url('assets/libs/toastr/build/toastr.min.css'); ?>" rel="stylesheet">
<script src="<?= base_url('assets/libs/toastr/build/toastr.min.js'); ?>"></script>

<script>
    function showRecipe(idr){
        $.ajax({
            url: '<?= base_url('customer/showRecipe') ?>/'+idr,
            type: 'POST',
            success: function (data) {
                $('#contenidoModal').html(data);
               $("#Recipe").modal("show");
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
    
    var pagW = 1;
    pagWeek(0);
  
    function pagWeek(idp){
        
        $('.flecha1').css('color','#406683');
        $('.flecha2').css('color','#406683');
        
        pagW = pagW+idp;
        
        if(pagW<=1){
            $('.flecha1').css('color','#ffffff');
            pagW=1;
        }
        if(pagW>=<?=$semanas?>){
            $('.flecha2').css('color','#ffffff');
            pagW=<?=$semanas?>;
        }
        if(<?=$semanas?>==1){
            $('.flecha1').css('color','#ffffff');
            $('.flecha2').css('color','#ffffff');
        }
        if(idp<1){
            var pagA = pagW+1;
        }else{
            var pagA = pagW-1;
        }
        
        //alert(pagA);
        $('.week'+pagA).css('display','none');
        $('.week'+pagW).css('display','block');
        $('.titleWeek').html('Week '+pagW);
        
    }
    
    
    function flecha3(){
        $('.shoppinglist').css('height','auto');
        $('.flecha3').attr('hidden',true);
        $('.flecha4').attr('hidden',false);
    }
    
    function flecha4(){
        $('.shoppinglist').css('height','400px');
        $('.flecha3').attr('hidden',false);
        $('.flecha4').attr('hidden',true);
    }
    
    
    function cancelSuscription(){
        
         $.ajax({
            url: '<?= base_url('customer/cancelSuscription') ?>',
            type: 'POST',
            success: function (data) {
                toastr.warning('Subscription has been canceled');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
    
        
</script>




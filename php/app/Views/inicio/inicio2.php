<style> 





@font-face {

    font-family: 'NotoSansJP-Light';

    src: URL('/user/assets/fonts/noto-sans-jp/NotoSansJP-Medium.otf') format('truetype');

}



h3{

    font-family: NotoSansJP-Light;

    line-height:33px;

    font-weight: 700;

    color: #406683;

    margin-bottom:8px;

}

h5{

    font-size: 13px;

    color: #406683;

    font-weight: 700;

    font-size: 20px;

}

h4{

    color: #406683;

    font-weight: 700;

}



body {

 background: #eee;

 font-family: NotoSansJP-Light;

}



#regForm {

 background-color: #ffffff;

 margin: 0px auto;

 font-family: NotoSansJP-Light;

 padding: 40px;

 border-radius: 10px;

 font-size:14px;

}



.btn-lg{

    padding: 17px 22px;

    font-weight: 700;

}



input {

 padding: 17px 22px;

 width: 100%;

 font-size: 16px;

 font-family: NotoSansJP-Light;

 border: 2px solid #F1F2F3;

 border-radius: 6px;

 outline:0; 

 font-weight: 700;

}



::-webkit-input-placeholder { color: #f1f2f3; }



input.invalid {

 background-color: #ffdddd;

 border: 1px solid #FF6A62;

}













.tab {

 display: none

}



button {

 background-color: #4CAF50;

 color: #406683;

 border: none;

 padding: 17px 20px;

 font-size: 14px;

 font-family: NotoSansJP-Light;

 cursor: pointer;

}



button:hover {

 opacity: 0.8

}





.step {

 height: 8px;

 width: 5%;

 background-color: #f1f2f4;

 border: none;

 display: inline-block;

}



.step.active {

  background-color: #10e289;

}



.step.finish {

 background-color: #10e289

}



.all-steps {

 text-align: center;

 margin-bottom: 30px

}



.thanks-message {

 display: none

}













.container {

 display: block;

 position: relative;

 padding-left: 35px;

 margin-bottom: 12px;

 cursor: pointer;

 font-size: 22px;

 -webkit-user-select: none;

 -moz-user-select: none;

 -ms-user-select: none;

 user-select: none

}



.container input[type="radio"] {

 display: none;

 opacity: 0;

 cursor: pointer

}







#nextBtn{

  width: 100%;

  background: #ffd76d;

  border-radius: 6px;

  outline:0; 

  font-weight: 700;

  font-size: 16px;

  margin-top: 8px;

}

/* Switch button */



.btn-default.btn-on{width:100%;background-color: #F1F2F3;border-radius: 6px;}

.btn-default.btn-off{width:100%;background-color: #F1F2F3;border-radius: 6px;}

.btn-default.btn-off.danger{width:100%;background-color: #ffdddd;border: 1px solid #FF6A62;}





.btn-default.btn-on.active{width:100%;background-color: #ffd76d;color: white;border: 1px solid #ffd76d;}

.btn-default.btn-off.active{width:100%;background-color: #ffd76d;color: white;border: 1px solid #ffd76d;}







.checkbox .cr {

    position: relative;

    display: inline-block;

    border: 1px solid #a9a9a9;

    border-radius: .25em;

    width: 1.3em;

    height: 1.3em;

    float: left;

    margin-right: .5em;

    font-size: 14px;

}

.checkbox .cr .cr-icon {

    position: absolute;

    font-size: .8em;

    line-height: 0;

    top: 50%;

    left: 20%;

}



.checkbox .cr .cr-icon .danger{width:100%;background-color: #ffdddd;border: 1px solid #FF6A62;}

.checkbox label input[type="checkbox"] {

    display: none;

}

.checkbox label input[type="checkbox"] + .cr > .cr-icon {

    transform: scale(3) rotateZ(-20deg);

    opacity: 0;

    transition: all .3s ease-in;

}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon {

    transform: scale(1) rotateZ(0deg);

    opacity: 1;

}

.checkbox label input[type="checkbox"]:disabled + .cr {

    opacity: .5;

}









.radio label{

    width:100%;

    font-size: 14px;

    margin: 5px 0px;

}



.radio label input[type="radio"] + .cr-icon {

    transform: scale(1);

    transition: all .3s ease-in;

    background: #F1F2F3;

    border-radius: 6px;

    width:100%;

    padding: 17px 22px;

    font-weight: 700;

    font-size: 18px;

}

.radio label input[type="radio"]:checked + .cr-icon {

    transform: scale(1) rotateZ(0deg);

    background: rgba(255, 215, 108, 0.2);

    border: 1px solid #FFD76C;

    box-sizing: border-box;

    padding: 17px 22px;

    font-weight: 700;

    font-size: 18px;

}

.radio label input[type="radio"]:checked + .cr-icon.invalid {

    transform: scale(1) rotateZ(0deg);

    background: rgba(255, 215, 108, 0.2);

    border: 1px solid #FFD76C;

    box-sizing: border-box;

    padding: 17px 22px;

    font-weight: 700;

    font-size: 18px;

}



.radio label input[type="radio"] + .cr-icon.invalid {

    transform: scale(1) rotateZ(0deg);

    background: #ffdddd;

    border: 1px solid #FF6A62;

    box-sizing: border-box;

    padding: 17px 22px;

    font-weight: 700;

    font-size: 18px;

}











.radio label input[type="checkbox"] {

    display:none;

}



.radio label input[type="checkbox"] + .cr-icon {

    transform: scale(1);

    transition: all .3s ease-in;

    background: #F1F2F3;

    border-radius: 6px;

    width:100%;

    padding: 17px 22px;

    font-weight: 700;

    font-size: 18px;

}

.radio label input[type="checkbox"]:checked + .cr-icon {

    transform: scale(1) rotateZ(0deg);

    background: rgba(255, 215, 108, 0.2);

    border: 1px solid #FFD76C;

    box-sizing: border-box;

    padding: 17px 22px;

    font-weight: 700;

    font-size: 18px;

}

.radio label input[type="checkbox"]:checked + .cr-icon.invalid {

    transform: scale(1) rotateZ(0deg);

    background: rgba(255, 215, 108, 0.2);

    border: 1px solid #FFD76C;

    box-sizing: border-box;

    padding: 17px 22px;

    font-weight: 700;

    font-size: 18px;

}



.radio label input[type="checkbox"] + .cr-icon.invalid {

    transform: scale(1) rotateZ(0deg);

    background: #ffdddd;

    border: 1px solid #FF6A62;

    box-sizing: border-box;

    padding: 17px 22px;

    font-weight: 700;

    font-size: 18px;

}



p{

    color: #406683;

}



label{

    color: #406683;

    font-weight: 500;

}

</style>







<!--  -->

<div class="col-12">

  <div class="container mt-5">

      <div class="row d-flex justify-content-center align-items-center">

          <div class="col-md-12">

              <form id="regForm" action="" method="post" >



                <div class="row d-flex justify-content-center align-items-center">



                    <div class="tab">

                        <h1>Do you want to lose weight?</h1>

                        <div class="row">

                          <div class="col-12 col-md-6" style="position: relative">

                              <label class="btn btn-default step-1" onclick="nextPrev(1)" style="background:#3aa1ee; border-radius:5px; position: absolute;right: 30px;top: 170px;color:#ffffff;display: flex;align-content: center;align-items: center;padding: 17px 22px;font-weight: 500;font-size: 18px;"><input type="radio" value="Yes" name="pes"><span style="margin: auto;">Lose weight</span></label>

                            <img src="<?=base_url('assets/img/img1.jpg')?>" alt="" style="width:100%">

                          </div>

                          <div class="col-12 col-md-6 mt-6 m-md-0" style="position: relative">

                              <label class="btn btn-default step-1" onclick="nextPrev(1)" style="background:#10e287; border-radius:5px; position: absolute;left: 30px;top: 170px;color:#ffffff;display: flex;align-content: center;align-items: center;width:179px;padding: 17px 22px;font-weight: 500;font-size: 18px;"><input type="radio" value="No" name="pes"><span style="margin: auto;">Maintain weight</span></label>

                            <img src="<?=base_url('assets/img/img2.jpg')?>" alt="" style="width:100%">

                          </div>

                        </div>



                        <div class="checkbox mt-6 mt-md-3">

                            <label style="font-size: 1em">

                                <input type="checkbox" value="1" name="check1" >

                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>

                                By continuing I agre with <a href="https://umatone.com/?page_id=25/#4TP">Terms of Service</a>, <a href="https://umatone.com/?page_id=25/#3TP">Privacy Policy</a>, <a href="https://umatone.com/?page_id=25/#2TP">Money-Back Policy</a>, <a href="https://umatone.com/?page_id=25/#4TP">Subcription terms</a>, <a href="https://umatone.com/?page_id=25/#1TP">Cookie policy</a>

                            </label>

                        </div>

                        <div class="checkbox mt-3">

                            <label style="font-size: 1em">

                                <input type="checkbox" value="2" name="check2" >

                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>

                                I would like to receive updates about products, services, and special offers from Umatone via email.

                            </label>

                        </div>

                        

                        <span id="mensaje"></span>

                        

                    </div>



                    <div class="col-md-6" id="quiz" hidden>

                        <div class="row retroceder"><div class="col" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-left align-self-center" style="font-size: 25px;color: gray;"></i> Previous step</div> <div class="col" style="text-align:right"><span id="numPaso">1</span>/15</div></div>

                        <div class="all-steps" id="all-steps"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span>

                        </div>



                        <div class="tab">

                            <h3>Select your gender</h3>



                            <div class="" id="status" data-toggle="buttons" style="width:100%;margin-bottom: 20px;margin-top: 20px;">

                                

                                <div class="row">

                                    <div class="col-6">

                                        <label class="btn btn-default btn-off btn-lg" onclick="nextPrev(1)">

                                        <input type="radio" value="Man" name="gen">Man</label>

                                    </div>

                                    <div class="col-6">

                                        <label class="btn btn-default btn-off btn-lg" onclick="nextPrev(1)">

                                        <input type="radio" value="Woman" name="gen">Woman</label>

                                    </div>

                                </div>

                              

                            </div>

                        </div>

                        <div class="tab">

                            <h3>What is your desired weight?</h3>



                            <div class="btn-group" id="status" data-toggle="buttons" style="width:100%;margin-bottom: 20px;margin-top: 20px;">

                                <label class="btn btn-default btn-off btn-lg active">

                                <input type="radio" value="Imperial" name="check_per" checked >Imperial</label>

                                <label class="btn btn-default btn-off btn-lg">

                                <input type="radio" value="Metric" name="check_per">Metric</label>

                                          

                            </div>



                            <h4>Desired weight</h4>

                            <p class="ico" style="position: relative;">

                              <input type="text" placeholder="00 (kg)" name="pes1" onKeyPress="return soloNumeros(event)" maxlength="3">

                              <span  class="" style="position: absolute;right:15px;top: 15px;"></span>

                            </p>

                        </div>

                        <div class="tab">

                          <h3>Let’s check your body measures</h3>

                          <div class="btn-group" id="status" data-toggle="buttons" style="width:100%;margin-bottom: 20px;margin-top: 20px;">

                            <label class="btn btn-default btn-off btn-lg active">

                            <input type="radio" value="Imperial" name="check_per1" id="check41" checked>Imperial</label>

                            <label class="btn btn-default btn-off btn-lg">

                            <input type="radio" value="Metric" name="check_per1" id="check42">Metric</label>

                          </div>

                          <h4>Age (years)</h4>

                          <p class="ico" style="position: relative;">

                            <input type="text" placeholder="00 (years)" name="eda" onKeyPress="return soloNumeros(event)" maxlength="3">

                            <span  class="" style="position: absolute;right:15px;top: 15px;"></span>

                          </p>



                          <div class="row">

                            <div class="col">

                              <h4>Height <span class="ocultar4">(ft)</span></h4>

                              <p class="ico" style="position: relative;">

                                <input type="text" placeholder="00 (ft)" name="alt" onKeyPress="return soloNumeros(event)" maxlength="3">

                                <span  class="" style="position: absolute;right:15px;top: 15px;"></span>

                              </p>

                            </div>

                            <div class="col ocultar4">

                              <h4>Height (inch)</h4>

                              <p class="ico" style="position: relative;">

                                <input type="text" placeholder="00 (inch)" name="anc" onKeyPress="return soloNumeros(event)" maxlength="3">

                                <span  class="" style="position: absolute;right:15px;top: 15px;"></span>

                              </p>

                            </div>

                          </div>





                          <h4>Current</h4>

                          <p class="ico" style="position: relative;">

                            <input type="text" placeholder="00 (kg)" name="pess" onKeyPress="return soloNumeros(event)" maxlength="3">

                            <span  class="" style="position: absolute;right:15px;top: 15px;"></span>

                          </p>



                        </div>

                        <div class="tab">

                          <h3>What is your body type?</h3>

                          <h4>Each body type has a specific metabolic structure</h4>

                            <div class="radio">

                                <label>

                                    <input type="radio" name="o5" value="Pear-shaped">

                                    <div class="cr-icon">

                                    <h5>Pear-shaped</h5>

                                    Naturally slimmer shoulders and thicker thighs

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o5" value="Square-shaped">

                                    <div class="cr-icon">

                                    <h5>Square-shaped</h5>

                                    Naturally wide shoulders and thighs

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o5" value="Hourglass">

                                    <div class="cr-icon">

                                    <h5>Hourglass</h5>

                                    Wide bust and hips, a narrow waist

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o5" value="Apple-shape">

                                    <div class="cr-icon">

                                    <h5>Apple-shape</h5>

                                    Naturally wide torso and broad shoulders

                                    </div>

                                </label>

                            </div>

                        </div>

                        <div class="tab">

                          <h3>Ok, how does your typical day look like?</h3>

                          <div class="radio">

                                <label >

                                    <input type="radio" name="o6" value="At the office">

                                    <div class="cr-icon">

                                    At the office

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o6" value="Daily long walks">

                                    <div class="cr-icon">

                                    Daily long walks

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o6" value="Physical work">

                                    <div class="cr-icon">

                                    Physical work

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o6" value="Mostly at home">

                                    <div class="cr-icon">

                                    Mostly at home

                                    </div>

                                </label>

                            </div>

                        </div>

                        <div class="tab">

                          <h3>Behavior change vs. Restrictive dieting</h3>

                          <h4>For us – it is all about habits and finding a balance not restricting and stressing yourself</h4>

                          <div class="checkbox mt-2" style="text-align:center">

                              <img src="<?=base_url('assets/img/img3.jpg')?>" alt="" style="width:60%">

                          </div>



                        </div>

                        <div class="tab">

                          <h3>Does any of this describes you?</h3>

                          <div class="radio">

                                <label >

                                    <input type="checkbox" name="o7[]" value="I eat later at night">

                                    <div class="cr-icon">

                                    I eat later at night

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o7[]" value="I don`t get enough sleep">

                                    <div class="cr-icon">

                                    I don`t get enough sleep

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o7[]" value="I can`t give up eating sweets">

                                    <div class="cr-icon">

                                    I can`t give up eating sweets

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o7[]" value="I love soft drinks">

                                    <div class="cr-icon">

                                    I love soft drinks

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o7[]" value="I consume a lot of salt">

                                    <div class="cr-icon">

                                    I consume a lot of salt

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o7[]" value="None of the above">

                                    <div class="cr-icon">

                                    None of the above

                                    </div>

                                </label>

                            </div>

                        </div>

                        <div class="tab">

                          <h3>Do you workout?</h3>

                          <h4>Even if not, we need to know in order to personalize your meal plan in a way that you reach your goals </h4>

                          <div class="radio">

                                <label >

                                    <input type="radio" name="o8" value="Almost none">

                                    <div class="cr-icon">

                                    Almost none

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o8" value="I walk">

                                    <div class="cr-icon">

                                    I walk

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o8" value="1-2 times a week">

                                    <div class="cr-icon">

                                    1-2 times a week

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o8" value="3-4 times a week">

                                    <div class="cr-icon">

                                    3-4 times a week

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o8" value="5-7 times a week ">

                                    <div class="cr-icon">

                                    5-7 times a week 

                                    </div>

                                </label>

                            </div>

                        </div>

                        <div class="tab">

                          <h3>How about your energy level during the day?</h3>

                          <div class="radio">

                                <label >

                                    <input type="radio" name="o9" value="I maintain a good level all day">

                                    <div class="cr-icon">

                                    I maintain a good level all day

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o9" value="I feel exhausted before lunch">

                                    <div class="cr-icon">

                                    I feel exhausted before lunch

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o9" value="I feel sluggish after lunch">

                                    <div class="cr-icon">

                                    I feel sluggish after lunch

                                    </div>

                                </label>

                            </div>

                        </div>

                        <div class="tab">

                          <h3>How much do you sleep?</h3>

                          <div class="radio">

                                <label >

                                    <input type="radio" name="o10" value="I Less than 5 hours">

                                    <div class="cr-icon">

                                    I Less than 5 hours

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o10" value="7-8 hours">

                                    <div class="cr-icon">

                                    7-8 hours

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o10" value="5-6 hours">

                                    <div class="cr-icon">

                                    5-6 hours

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o10" value="More thean 8 hours">

                                    <div class="cr-icon">

                                    More thean 8 hours

                                    </div>

                                </label>

                            </div>

                        </div>

                        <div class="tab">

                          <h3>Do you have any dietary restrictions or allergies?</h3>

                          

                                

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o11" value="I'm lactose intolerant">

                                    <div class="cr-icon">

                                    I'm lactose intolerant

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o11" value="I don't eat gluten">

                                    <div class="cr-icon">

                                    I don't eat gluten

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o11" value="I'm vegetarian">

                                    <div class="cr-icon">

                                    I'm vegetarian

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o11" value="I'm vegan">

                                    <div class="cr-icon">

                                    I'm vegan

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="radio" name="o11" value="None of the above">

                                    <div class="cr-icon">

                                    None of the above

                                    </div>

                                </label>

                            </div>

                        </div>

                        <div class="tab">

                          <h3>Mark the vegetables you want to include</h3>

                          <div class="radio">

                                <label >

                                    <input type="checkbox" name="o12[]" value="Tomatoes">

                                    <div class="cr-icon">

                                    Tomatoes

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o12[]" value="Zucchini">

                                    <div class="cr-icon">

                                    Zucchini

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o12[]" value="Spinach">

                                    <div class="cr-icon">

                                    Spinach 

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o12[]" value="Broccoli">

                                    <div class="cr-icon">

                                    Broccoli 

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o12[]" value="Cucumber">

                                    <div class="cr-icon">

                                    Cucumber

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o12[]" value="Pepper">

                                    <div class="cr-icon">

                                    Pepper

                                    </div>

                                </label>

                            </div>



                        </div>

                        <div class="tab">

                          <h3>Mark the meat & fish you want to include:</h3>

                          <div class="radio">

                                <label >

                                    <input type="checkbox" name="o13[]" value="Turkey">

                                    <div class="cr-icon">

                                    Turkey

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o13[]" value="Beef">

                                    <div class="cr-icon">

                                    Beef

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o13[]" value="Chicken">

                                    <div class="cr-icon">

                                    Chicken  

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o13[]" value="Pork">

                                    <div class="cr-icon">

                                    Pork  

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o13[]" value="Fish">

                                    <div class="cr-icon">

                                    Fish

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o13[]" value="Seafood">

                                    <div class="cr-icon">

                                    Seafood

                                    </div>

                                </label>

                            </div>

                            <div class="radio">

                                <label >

                                    <input type="checkbox" name="o13[]" value="None of the above">

                                    <div class="cr-icon">

                                    None of the above

                                    </div>

                                </label>

                            </div>



                        </div>

                        <div class="tab">

                            <div class="cargando">

                              <h3>We are almost done preparing your meal plan</h3>

                              <div class="mt-3 text-center">

                                <script src="<?=base_url('assets/libs/lottie/lottie-player.js')?>"></script><lottie-player src="<?=base_url('assets/libs/lottie/lf20_bkhdojtm.json')?>" background="transparent" speed="4" style="width: 60%;margin:auto;margin: 22px auto;" autoplay></lottie-player>

                              </div>

                            </div>

                          

                            <div class="planes" style="display:none">

                              <h3>Your suggested meal plan is:</h3>

                              <div class="mt-3 text-center">

                              <div class="row plans">

                                  

                              </div>

                              </div>

                            </div>

                        </div>

                        

                        <div class="tab">

                          <h3>Enter your email to get your personal meal plan </h3>

                          <h4 style="font-size: 18px;line-height: 33px;">We respect your privacy and are committed to protecting your personal data. We’ll email you a copy of your results for convenient access.</h4>

                          <p class="ico" style="position: relative;">

                              <input type="text" placeholder="Email" name="ema">

                              <span  class="" style="position: absolute;right:15px;top: 15px;"></span>

                          </p>



                        </div>

                        

                        <div class="thanks-message" id="text-message"> 

                            <h3>Do you want to receive emails with special offers, weight loss tips, recipes and free gifts?</h3> 

                            

                            <button class="mt-3" type="submit" style="background:#FF6A62;width:100%;font-size: 16px;font-weight: 500;color: #ffffff;" onclick="$('#regForm').attr('onsubmit','return true');">Yes, I`m in</button>

                            <p style="margin-top: 10px;font-weight: bold;color: #406683;">I know everything about weight loss</p> 

                        </div>

                        <div style="overflow:auto;" id="nextprevious">

                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Continue</button>

                        </div>

                      </div>

                  </div>

              </form>

          </div>

      </div>

  </div>

</div>









<script type='text/javascript'>//your javascript goes here

var currentTab = 0;



showTab(currentTab);



function showTab(n) {

    var x = document.getElementsByClassName("tab");

    x[n].style.display = "block";

    if (n == 0) {

        $('#prevBtn').css('display','none');

        $("#quiz").attr("hidden",true);

    } else {

        $('#prevBtn').css('display','inline');

        $("#quiz").attr("hidden",false);

        

    }

    

    var i, x=document.getElementsByClassName("step");

    for (i=0; i < x.length; i++) {

        x[i].className=x[i].className.replace(" active", "" );

    } 

    x[n].className +=" active" ;

    

}







function nextPrev(n) {



    var seguir = true;

    if(n>0){

        

        if(!validateForm()){

            seguir = false;

        } 

    }

    if(seguir == true){

        var x = document.getElementsByClassName("tab");

 

        x[currentTab].style.display = "none";

        currentTab = currentTab + n;

    

        $('#numPaso').html(currentTab);

        if(currentTab==2){

$('#nextBtn').css('display', 'none');

}

        if(currentTab >= 14){

            

            if(currentTab==14){

                $('#nextBtn').css('display', 'none');

            }

            $('#nextBtn').css('display', 'block');

            $(".retroceder").css('display', 'none');

            $("#all-steps").css('display', 'none');

            

            $('#nextBtn').html('Get my plan');

        }

      

        if (currentTab >= 16) {

        

            $("#nextprevious").css('display', 'none');

            $("#all-steps").css('display', 'none');

            $("#register").css('display', 'none');

            $(".retroceder").css('display', 'none');

        

            $("#text-message").css('display', 'block');

            

        }

        showTab(currentTab);

    }

    

}



function mostrarPlan() {

    $('.cargando').css('display','none');

    $('.planes').css('display','block');

}



function validateForm() {



    var x, y, i, valid = true;

    if(currentTab==13){

        let player = document.querySelector("lottie-player");

        player.stop();

        player.play();

        

        setTimeout(mostrarPlan, 4000);

        var formData = new FormData();

        formData.append('plan',$('input[name=o11]:checked').val());



        $.ajax({

            url: '<?= base_url('home/selectPlan') ?>',

            type: 'POST',

            success: function (data) {

              $('.plans').html(data);

            },

            data: formData,

            cache: false,

            contentType: false,

            processData: false

        });

    }

    

    

    $(".tab:eq("+currentTab+") input").each(function(){

        $('#mensaje').html('');

        
        if ($(this).attr('type')=='text' && $(this).val()=="" ) {

            if($(this).attr('name')=="anc" && $('input[name=check_per1]:checked').val()!="Metric"){

                $(this).next().attr("class", "fa fa-times");

                $(this).next().css('color', 'red');

                $(this).addClass(" invalid");

                valid=false;

            }

             if($(this).attr('name')!="anc"){

                $(this).next().attr("class", "fa fa-times");

                $(this).next().css('color', 'red');

                $(this).addClass(" invalid");

                valid=false;

            }

                

        }

        

        if ($(this).attr('type')=='text' && $(this).val()!="" ) {

            $(this).next().attr("class", "fa fa-check");

            $(this).next().css('color', 'green');

            $('.cr').css('background', '#ffffff');

            $(this).removeClass(' invalid');

        }


        if ($(this).attr('type')=='radio' && $('input[name='+$(this).attr('name')+']:checked').length==0) {

            $(this).parent().addClass('danger');

            $(this).next().addClass(' invalid');

            valid=false;

        }else{

            $(this).parent().removeClass('danger');

            $(this).next().removeClass(' invalid');

        }


        if ($(this).attr('type')=='checkbox') {

            if ($('input[name="check1"]:checked').length==0) {
                $(this).next().addClass(' invalid');
                $('.btn.step-1').removeAttr('onclick','nextPrev(1)');
                valid=false;

            }else{
                $(this).next().removeClass(' invalid');
                $('.btn.step-1').attr('onclick','nextPrev(1)');
            }


            if($('input[value="1"]').attr('name','check1') && $('input[value="1"]').prop('checked')==false ){

                $('#mensaje').html('<div class="row mt-2"><div class="col-12 col-md-6"><div class="alert alert-danger" role="alert" style="padding: 6px;border: 1px solid #FF6A62;">To continue please accept our terms and policies</div></div></div>');
                valid=true;

            }

        }

        
if ($('input[name="check1"]:checked').length==0) {
                $('.btn.step-1').removeAttr('onclick','nextPrev(1)');
                valid=false;

            }
   	});

 

   	if (valid) {

        document.getElementsByClassName("step")[currentTab].className +=" finish" ;

    }     
    return valid;

};


 $(document).bind('DOMSubtreeModified', function () {
    if ($('input[name="check1"]:checked')) {
        $('.btn.step-1').attr('onclick','nextPrev(1)');
    } 
});

$('input[value="2"]').attr('name','check2');


$('input[name=check_per]').on('change', function() {

    if($(this).val()=="Metric"){

        $('input[name=pes1]').attr('placeholder','00 (kg)');

    }else{

        $('input[name=pes1]').attr('placeholder','00 (lb)');

    }

});



$('#check41').on('change', function() {

    if (this.checked) {

        $('.ocultar4').attr('hidden',false);

        $('input[name=alt]').attr('placeholder','00 (ft)');

        $('input[name=pess]').attr('placeholder','00 (lb)');

    }

});

$('#check42').on('change', function() {

    if (this.checked) {

        $('.ocultar4').attr('hidden',true);

        $('input[name=alt]').attr('placeholder','00 (cm)');

        $('input[name=pess]').attr('placeholder','00 (Kg)');

    }

});



var envio = 0;

$( "#regForm" ).submit(function( event ) {

    event.preventDefault();

	var formData = new FormData($('#regForm')[0]);

    

    if(envio==0){

        envio = 1;

        $.ajax({

            url: '<?=base_url('home/email2');?>',

            type: 'POST',

            success: function (data) {

                if(data==0){

                    

                }else{

                    window.location.href = data;

                }

                

            },

            data: formData,

            cache: false,

            contentType: false,

            processData: false

        });

    }

        

});



function soloNumeros(e)



{

	var key = window.Event ? e.which : e.keyCode

	return ((key >= 48 && key <= 57) || (key==8))

}



</script>


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
</style>


<!--  -->

<div class="col-12 col-md-8" style="margin:auto">
  <div class="container mt-5">
      <div class="row d-flex justify-content-center align-items-center">
            <h1 style="text-align: center;margin: 20px;font-weight: bold;"><?=$titulo?></h1>
            <?=$plan?>
      </div>
  </div>
</div>


<link href="<?= base_url('assets/libs/toastr/build/toastr.min.css'); ?>" rel="stylesheet">
<script src="<?= base_url('assets/libs/toastr/build/toastr.min.js'); ?>"></script>


<script>
function verPlan(ref,ruta,idd){
    event.preventDefault();
    
    var formData = new FormData();
    formData.append("ref", ref);
    formData.append("idd", idd);

    $.ajax({
        url: '<?= base_url('customer/planState') ?>',
        type: 'POST',
        success: function (data) {
            if(data=="active"){
                location.href=ruta;
            }
            if(data=="canceled"){
                toastr.warning('Subscription has been canceled');
            }
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
    
}
    
</script>




<?php 
$this->session = \Config\Services::session(); 
$usuario = $this->session->get('logUmatone');
$usuario = $usuario['data'][0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="/style/img/icons/icon-48x48.png" />
    <link href="https://pictogrammers.github.io/@mdi/font/5.4.55/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">
	<title>Umatone</title>

	<link href="<?=base_url('assets/style/css/app.css')?>" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="<?=base_url('assets/style/js/app.js')?>"></script>
  <script src="<?=base_url('assets/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js');?>"></script>



</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar ">
				<a class="sidebar-brand text-center" href="/user/admin/customers">
           <span class=""><img src="<?=base_url('assets/img/UmantoneHorizontal.png')?>" style="width:100%"></span>
        </a>

				<ul class="sidebar-nav">
                    <?php
                    if(isset($menu)){
                        for($i=0;$i<count($menu);$i++){
                            $act = "";
                            if($activo==$i){
                                $act = "active";
                            }
                            echo '<li class="sidebar-item '.$act.'">
                						<a class="sidebar-link" href="'.$menu[$i]['url'].'">
                                          <i class="align-middle" data-feather="'.$menu[$i]['ico'].'"></i> <span class="align-middle">'.$menu[$i]['nom'].'</span>
                                        </a>
                					</li>';
                        }
                    }

                    ?>
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>


				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative" hidden>
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator" id="puntonotificacion">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="list-group" id="notificaciones">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted"><?= lang('idioma.txtMostrarNotificaciones') ?></a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div id="notificaciones" class="list-group" >
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="<?=base_url('assets/style/img/default/cultura-letras.jpg')?>" class="avatar img-fluid rounded-circle" >
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="<?=base_url('assets/style/img/avatars/avatar-2.jpg')?>" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="<?=base_url('assets/style/img/avatars/avatar-4.jpg')?>" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="<?=base_url('assets/style/img/avatars/avatar-3.jpg')?>" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <img src="<?=$usuario['imagen'] ?>" class="avatar img-fluid rounded mr-1" /> <span class="text-dark" style="display: inherit;width: 150px;text-overflow: ellipsis;overflow: clip;"><?= $usuario['usuario']  ?></span>
                          </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="<?=base_url('admin/profile/form')?>"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="<?=base_url('login/salir')?>"><i class="align-middle mr-1" data-feather="log-out"></i> log out</a>

							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0" id="cuerpoPagina">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3 id="titulo"><strong><?= $titulo ?></strong></h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1" hidden>
							<nav aria-label="breadcrumb" >
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">Inicio</a></li>
									<li class="breadcrumb-item"><a href="#">contenido</a></li>
									<li class="breadcrumb-item active" aria-current="page">contenido 2</li>
								</ol>
							</nav>
						</div>
					</div>

					<div class="row" id="contenido">
						<?= $contenido ?>
					</div>


				</div>
			</main>

			<footer class="footer" hidden>
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-12 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>nombre empresa</strong></a> &copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>


</body>

<div class="modal fade"  id="modalcarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog"  role="document" style="padding-top:20px;margin-top:10%">
       <div class="box__input modal-content" style="background:#ffffff;padding:10px;">
            <div class="text-center" id="campo" style="width: 100%; min-height: 300px; background:#ffffff;" >

                <img src="<?= base_url('assets/img/cloud_load.gif') ?>" style="width:80%">
                <br>
                <label for="file" class="text-muted"><span id="porcentagecarga" class="box__dragndrop"></span></label>
                <br>
                <button type="button" onclick="cerrarModalCarga()" class="btn " style="background:#BBC2CD;color:#003169;font-weight: bold;">Cancel.</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade"  id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog"  role="document" style="padding-top:20px;margin-top:10%">

        <div class="modal-content" style="background:#E9E9E9">
            <div style="border-bottom:0;text-align: center;position: absolute;width:100%;top: -25px;">
                  <div style="border-radius:50px;height:50px;align-items: center; display: flex;justify-content: center; width:50px;z-index: 3;margin:0 auto;background:#003169">
                   <i class="mdi mdi-alert-outline" style="font-size: 30px;margin:0 auto;color:white"></i>
                  </div>
            </div>
            <div style="text-align: center;margin-top:30px">
               <h5 style="margin-top:5px;color: #003169;font-weight: bold;">Alert</h5>

            </div>
            <div class="modal-body text-center pt-3" style="padding-top:0px;color: #003169;">
           <p>
           <span>  You can't revert this. Do you want to continue?
                <span id="textModal"></span ></span >
           </p>
            </div>
            <div class="modal-footer"style="border-top:0">
            <button type="button" onclick="cerrarModalEliminar()" class="btn " style="background:#BBC2CD;color:#003169;font-weight: bold;">No, Cancel.</button>
            <button type="button" onclick="confirmarEliminar()" class="btn" data-dismiss="modal" style="background:#003169;color:white;font-weight: bold;">Yes, delete it.</button>
            </div>
        </div>
    </div>
</div>









<link href="<?= base_url('assets/libs/toastr/build/toastr.min.css'); ?>" rel="stylesheet">
<script src="<?= base_url('assets/libs/toastr/build/toastr.min.js'); ?>"></script>


<!-- paginación -->
<?php if (isset($paginacion)) { ?>
<script>

var pagina_actual= 1;
var contenido = "";
setInterval('paginacion()',1000);

function paginacion(){
    tipotabla = '<?=$tipoTabla?>';

    var select=$('#session_max_rows').val();
    var pal = $('#buscar').val();

    var parametro={"tipo_tabla":tipotabla,"pal":pal,"pag":pagina_actual,"numero":select};
    $.ajax({
        data:parametro,
        url:   '<?= $paginacion ?>',
        type:  'post',
        encoding:"UTF-8",

        success:  function (response) {

            response=JSON.parse(response);

            var cccc = JSON.stringify(response);

            if(contenido!=cccc){
                contenido=cccc;
                //undefined

                $('#tbody').html(response.tabla);
                $('#mbody').html("");
                if(response.tabla==""){
                    $('#mbody').html("There are no records to show");
                }

                $('#pagination').html(response.paginar);

            }

        }
    });

}

function buscarpagina(index){
    pagina_actual=index;
    paginacion();
}
</script>
<?php } ?>





<!-- notificaciones -->
<?php
if (isset($notificaciones)) {
?>
<script type="text/javascript">

var lim = 10;
notificaciones(0);
setInterval('notificaciones(0)',1000);
var notii = "";

function notificaciones(lim1){

    lim = lim+lim1;
    url1 = '<?= $notificaciones ?>'+lim;
    $.ajax({
        url:   url1,
        type:  'post',
        success:  function (response) {
           response=JSON.parse(response);

           var cccc = JSON.stringify(response);

            if (response.noti!="NO") {
                if(notii!=cccc){
                    notii=cccc;

                    $("#notificaciones").html(response.noti);

                    $("#puntonotificacion").html(response.numnoti);

                }
            }else{
                $("#puntonotificacion").html(0);
                $("#notificaciones").html("<div style='text-align:center; padding:5px'>No hay notificaciones</div>");
            }
        }
    });
}
</script>
<?php
}
?>

<?php
if($this->session->get('notificacion')!=null){
  echo $this->session->get('notificacion');
  $this->session->remove('notificacion');
}
?>

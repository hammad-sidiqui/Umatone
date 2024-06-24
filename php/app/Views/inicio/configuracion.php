

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="<?=base_url('assets/libs/imageUploader/image-uploader.css')?>">

<form id="formUsuario" method="post" enctype="multipart/form-data" >
<div class="row">

    <div class="col-md-8">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="account" role="tabpanel">

                <div class="card">
                  <div class="card-body">
                        <div id="accordion2" class="according accordion-s2">
                            <a class="card-link collapsed" href="<?= base_url('admin/config/category') ?>" >Categorias</a>
                            <br><br>
                            <a class="collapsed card-link" href="<?= base_url('admin/config/activity') ?>">Actividades</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


</div>
</form>

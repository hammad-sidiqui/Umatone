<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Consulta;
use CodeIgniter\API\ResponseTrait;

class RestConsulta extends ResourceController
{
    protected $modelName = 'App\Models\Consulta';
    protected $format    = 'json';
    use ResponseTrait;

    //retorna dependido de paramentros

    public function consulta()
    {

        $tabla      = $this->request->getPost('tabla');
        $funcion    = $this->request->getPost('funcion');

        if($funcion=="delete"){
            if(isset($_POST['registro_id'])){
                $registro_id = $this->request->getPost('registro_id');
                $this->eliminarImagenes($tabla,$registro_id);
            }
        }

        $tabla_id   = $this->request->getPost('tabla_id');
        $datos      = $this->request->getPost('datos');
        $condicion  = $this->request->getPost('condicion');

        $consulta = $this->model->query($tabla,$tabla_id,$funcion,$datos,$condicion);

        if (!$consulta) {
            return $this->genericResponse(null,"Error de consulta",400);
        }

        return $this->genericResponse($consulta,"",200);
    }

    public function eliminarImagenes($tabla,$idd)
    {

        $this->cons = new Consulta();
        $condicionconte  = "tabla like '$tabla' and registro_id=$idd";

        if($tabla=="contenido"){
            $condicionconte  = "contenido_id=$idd";
        }

        $consultaconte = $this->cons->query('contenido','contenido_id','findAll','',$condicionconte);

        foreach($consultaconte as $key){
            if(file_exists($key['ruta'])){
                unlink($key['ruta']);
            }
        }

        $consulta = $this->cons->query('contenido','contenido_id','delete','',$condicionconte);
    }

    public function subirImagenes()
    {
        date_default_timezone_set('America/Bogota');
        $this->forma1 = date('Y-m-d H:i');
        $this->forma2 = date("Y-m-d");
        $this->forma3 = date("Y");

        if($imagefile = $this->request->getFiles())
        {
            foreach($imagefile['images'] as $img)
            {
                if ($img->isValid() && ! $img->hasMoved()) {

                        $tabla      = 'contenido';
                        $tabla_id   = 'contenido_id';

                        $funcion    = 'insert';
                        $condicion  = '';

                        if(isset($_POST['actualizar'])){
                            if($_POST['actualizar']=="si"){
                                
                                $idr = $_POST['registro_id'];
                                $tab = $_POST['tabla'];

                                $condicion  = "registro_id=$idr and tabla like '$tab' ";
                                $imagen = $this->model->query('contenido','contenido_id','findAll',null,$condicion);

                                if($imagen!=array()){
                                    $funcion    = 'update';
                                    foreach($imagen as $key){
                                        if(file_exists($key['ruta'])){
                                            unlink($key['ruta']);
                                        }
                                    }
                                }
                                
                            }
                        }
                        
                        $idd = (int)$_POST['registro_id'];
                        $newName = $idd.'_'.$img->getRandomName();

                        $ruta      =  $_POST['ruta'].'/'.$newName;
                        $datos      =  array(
                                            'tabla'      =>$_POST['tabla'],
                                            'registro_id'=>$_POST['registro_id'],
                                            'ruta'       =>$ruta,
                                            'formato'    =>$_POST['formato'],
                                            'categoria'  =>$_POST['categoria'],
                                            'creado_id' =>$_POST['creado_id'],
                                            'fec_creacion'=>$this->forma1,
                                       );

                        $consulta = $this->model->query($tabla,$tabla_id,$funcion,$datos,$condicion);

                        $img->move($_POST['ruta'], $newName);
                }
            }

            return $this->genericResponse(1,"",200);
        }

    }

    public function tabla()
    {
        $tabla    = $this->request->getPost('tabla');
        $buscar   = $this->request->getPost('buscar');
        $pagina   = $this->request->getPost('pagina');
        $limite   = $this->request->getPost('limite');
        $select   = $this->request->getPost('select');

        $consulta = $this->model->table($tabla,$buscar,$pagina,$limite,$select);

        if (!$consulta) {
            return $this->genericResponse(null,"Error de consulta",400);
        }

        return $this->genericResponse($consulta,"",200);
    }


    private function genericResponse($data, $msj, $code)
    {

        if ($code == 200) {
            return $this->respond(array(
                "data" => $data,
                "code" => $code
            )); //, 404, "No hay nada"
        } else {
            return $this->respond(array(
                "msj" => $msj,
                "code" => $code
            ));
        }
    }


}

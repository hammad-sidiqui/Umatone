<?php namespace App\Controllers;

class Customer extends BaseController
{


    public function __construct()
    {
        $this->session = session();
        
        if($this->session->get('logUmatone')==null){
                header("Location: ".base_url('login/customer'));
		        exit();
        }else{
            $datos = $this->session->get('logUmatone');
            if(isset($datos['data'][0]['perfil'])){
                header("Location: ".base_url('login/customer'));
		        exit();
            }
        }

        date_default_timezone_set('Europe/Bucharest');
        $this->forma1 = date('Y-m-d H:i');
        $this->forma2 = date("Y-m-d");
        $this->forma3 = date("Y");

    }
    
    public function ddd($function = "")
	{
	    $usuario = $this->session->get('logUmatone'); 
        $idc = $usuario['data'][0]['cliente_id'];
        
        $consulta = [
            'tabla' => 'cliente_plan',
            'tabla_id' => 'cliente_plan_id',
            'funcion' => 'findAll',
            'datos' => null,
            'condicion' => "cliente_id = '$idc' and estado like 'succeeded' and fec_fin>'$this->forma1' ",
        ];
        $consulta = $this->query($consulta);
        
        print_r('<pre>');
        print_r($consulta);
        
        print_r("___________________________________________________________");
        
        $usuario = $this->session->get('logUmatone'); 
        $idc = $usuario['data'][0]['cliente_id'];
        
        $consulta = [
            'tabla' => 'cliente_plan',
            'funcion' => 'findAll',
            'select' => null,
            'datos' => null,
            'condicion' => "cliente_id = '$idc' and estado like 'succeeded' and fec_fin>'$this->forma1' ",
            'pagina' => null,
            'limite' => null,
        ];
        $consulta = $this->Consultar($consulta);
        
        print_r('<pre>');
        print_r($consulta);
	    
	    
	}
	

	public function index($function = "")
	{

	    if($function == ""){
	        $datos['activo']   ="0";

	
	        $datos['titulo']    ="Your suggested plan is:";


            $datos['urlCrear']  = base_url('admin/events/form');
            $datos['urlEditar'] =base_url('admin/events/form');
            $datos['urlEliminar']=base_url('admin/events/eliminar');
            
            
            $usuario = $this->session->get('logUmatone'); 
            $idc = $usuario['data'][0]['cliente_id'];
            
            $ema= $usuario['data'][0]['correo'];
            
            $consulta = [
                'tabla' => 'cliente_plan',
                'funcion' => 'findAll',
                'select' => null,
                'datos' => null,
                'condicion' => "cliente_id = '$ema' and (estado like 'succeeded' or estado like 'complete'  ) and fec_fin>'$this->forma1' ",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            
            
            $ppp="";
            
            if($consulta['code']==200){
                $datos['plan']=$consulta['data'];
                
                 $img = base_url('assets/img/UmatoneTarget.png');
                
                foreach($consulta['data'] as $key){
                    
                    $idp = $key['plan_id'];
                    
                    $consulta2 = [
                        'tabla' => 'plan',
                        'funcion' => 'findAll',
                        'select' => null,
                        'datos' => null,
                        'condicion' => "plan_id = '$idp' ",
                        'pagina' => null,
                        'limite' => null,
                    ];
                    $consulta2 = $this->Consultar($consulta2);
                    
                    $idpp = $consulta2['data'][0];
                    
                    $consultaImg = [
                        'tabla' => 'contenido',
                        'funcion' => 'findAll',
                        'select' => null,
                        'datos' => null,
                        'condicion' => "tabla like 'plan' and registro_id='$idp' limit 1 ",
                        'pagina' => null,
                        'limite' => null,
                    ];
                    
                    $consultaImg = $this->Consultar($consultaImg);
                    
                    if($consultaImg['code']==200){
                        $img = base_url($consultaImg['data'][0]['ruta']);
                    }
                    
                    
                    $ppp .= '<div class="col-md-4 mt-3">
                                <div class="card">
                        			<div class="card-body">
                                        <div class="mt-3 mb-3" style="text-align:center">
                                          <h3>'.$idpp['nombre'].'</h3>
                                          <img src="'.$img.'" style="width: 60%;">
                                        </div>
                        				<form method="post" onsubmit="verPlan('."'".$key['referencia_pago']."'".','."'".base_url('customer/details/'.$idpp['plan_id'])."'".','.$idpp['plan_id'].')">
                        					<div style="margin: 4px;text-align: center;">
                        					    <input type="text" name="idp" hidden value="'.$idpp['plan_id'].'" />
                                                <label>'.$idpp['descripcion'].'</label>
                        					</div>
                        					<div class="mt-3">
                        						<input type="submit" value="Details" class="btn login_btn">
                        					</div>
                        
                        				</form>
                        			</div>
                		        </div>
                          </div>';
                }
            }
            
            if($ppp==""){
                $datos['titulo']    ="<div class='mt-6'>You don't have any plan, you can choose your suggested plan by <a href='https://umatone.com/user/'>taking the quiz</a></div>";
            }
            
            $datos['plan']=$ppp;

            $datos['contenido'] = view('inicio/plan',$datos);
    	    //vistas
    		return view('inicio/body',$datos);
	    }
	}
	
	public function planState()
	{
	    header('Access-Control-Allow-Origin: *');
        
        require 'vendor/autoload.php';
        
        $ref = $_POST['ref'];
        $id = $_POST['idd'];
        
        
        $consulta = [
            'tabla' => 'pagos',
            'funcion' => 'findAll',
            'select' => null,
            'datos' => null,
            'condicion' => "pago_id=1",
            'pagina' => null,
            'limite' => null,
        ];
        $consulta = $this->Consultar($consulta);
        $key = $consulta['data'][0]['clave_prueba_1'];
        if($consulta['data'][0]['modo']==1){
            $key = $consulta['data'][0]['clave_real_1'];
        }
        
        
         \Stripe\Stripe::setApiKey($key);
         
         
         
        $checkout_session = \Stripe\Subscription::retrieve($ref);
        
        $newdata = [
            'id'  => $id,
            'ref'  => $ref,
            'estado'=>$checkout_session->status,
        ];
        
        $this->session->set('sesionPlan',$newdata);

        
        echo $checkout_session->status;
	}
	
	public function cancelSuscription()
	{
	    header('Access-Control-Allow-Origin: *');
        
        require 'vendor/autoload.php';
        
        $consulta = [
            'tabla' => 'pagos',
            'funcion' => 'findAll',
            'select' => null,
            'datos' => null,
            'condicion' => "pago_id=1",
            'pagina' => null,
            'limite' => null,
        ];
        $consulta = $this->Consultar($consulta);
        $key = $consulta['data'][0]['clave_prueba_1'];
        if($consulta['data'][0]['modo']==1){
            $key = $consulta['data'][0]['clave_real_1'];
        }
        
        \Stripe\Stripe::setApiKey($key);
         
        $sespla = $this->session->get('sesionPlan');
        
        \Stripe\Subscription::update(
          $sespla['ref'],
          [
            'cancel_at_period_end' => true,
          ]
        );
        echo 1;
	}

    public function details($idd=0)
    {
            $sespla = $this->session->get('sesionPlan');
            
            if($sespla['id']==$idd && $sespla['estado']=="active"){
                 $datos['activo']   ="0";
    
    	        $datos['titulo']    =  "My meal plan";
                
                $consulta = [
                    'tabla' => 'plan_receta',
                    'funcion' => 'findAll',
                    'select' => null,
                    'datos' => null,
                    'condicion' => "plan_id = '$idd' order by dia ",
                    'pagina' => null,
                    'limite' => null,
                ]; 
                $consulta = $this->consultar($consulta);
                
                
                $ppp="";
                
                $numSem = 0;
                $semana = 1;
                $recetas_id = "0";
                if($consulta['code']==200){
                    
                    $numSemana = 0;
                    $plan = "";
                    $k=1;
                    foreach($consulta['data'] as $key){
                        
                        $kk = 0;
                        $imagenes = "";
                        
                        while($kk<4){
                            $img = base_url('assets/img/UmatoneTarget.png');
                            
                            $id1 = 0;
                            if($kk==0){$id1 = $key['breakfast'];}
                            if($kk==1){$id1 = $key['lunch'];}
                            if($kk==2){$id1 = $key['snack'];}
                            if($kk==3){$id1 = $key['dinner'];}
                            
                            $recetas_id .= ",".$id1;
                            
                            $consultaImg = [
                                'tabla' => 'contenido',
                                'funcion' => 'findAll',
                                'select' => null,
                                'datos' => null,
                                'condicion' => "tabla like 'recetas' and registro_id='$id1' limit 1 ",
                                'pagina' => null,
                                'limite' => null,
                            ];
                        
                            $consultaImg = $this->consultar($consultaImg);
                            if($consultaImg['code']==200){
                                $img = base_url($consultaImg['data'][0]['ruta']);
                            }
                            
                            $imagenes .= '<div class="cuadrado" style="cursor:pointer" data-idd="'.$id1.'" onclick="showRecipe('.$id1.')"><img src="'.$img.'" style="width: 100%;border-radius: 6px;"></div>';
                            
                            $kk++;
                        }
                        
                        
                        
                        $plan .= '<div class="week'.$semana.'" style="display:none"><div class="titulos">Day '.$k.'</div>'.$imagenes.'</div>';
                            
                        $k++;
                        
                        $numSemana++;
                        if($numSemana==7){
                            $numSemana = 0;
                            $semana++;
                            $numSem++;
                        }
                        
                    }
                }else{
                    $plan = "You don't have any plans";
                }
                
                
                
                $consulta = [
                    'tabla' => 'lista_compras',
                    'tabla_id' => 'lista_compras_id',
                    'funcion' => 'findAll',
                    'datos' => null,
                    'condicion' => "plan_id=$idd",
                ];
                $datos['ingredientes'] = $this->query($consulta);
                
                
                
                $datos['plan']=$plan;
                
                
                $consulta = [
                    'tabla' => 'cliente_plan',
                    'funcion' => 'find',
                    'select' => null,
                    'datos' => null,
                    'condicion' => "plan_id = '$idd' order by cliente_plan_id desc limit 1 ",
                    'pagina' => null,
                    'limite' => null,
                ]; 
                $consulta = $this->consultar($consulta);
                
                if($consulta['code']==200){
                    $dias = $consulta['data'][0]['dias'];
                    if($dias==7){
                        $numSem = 1;
                    }
                    if($dias==30){
                        $numSem = 3;
                    }
                }
                
                
                $datos['semanas']=$numSem;
                
                
    
                $datos['contenido'] = view('inicio/detalles',$datos);
        	    //vistas
        		return view('inicio/body',$datos);
            }else{
                header("Location: ".base_url('customer'));
		        exit();
            }
        
    	       
	    

    }

    public function showRecipe($idd=0){
        
        $img = base_url('assets/img/UmatoneTarget.png');
        $consulta = [
            'tabla' => 'recetas',
            'tabla_id' => 'receta_id',
            'funcion' => 'find',
            'datos' => null,
            'condicion' => "receta_id = '$idd'",
        ];
        $consulta = $this->query($consulta);
        
        if($consulta->code==200){
            $idrr = $consulta->data[0];
            
            $consultaImg = [
                'tabla' => 'contenido',
                'tabla_id' => 'contenido_id',
                'funcion' => 'findAll',
                'datos' => null,
                'condicion' => "tabla like 'recetas' and registro_id='$idd' limit 1",
            ];
            $consultaImg = $this->query($consultaImg);
            if($consultaImg->code!=400){
                $img = base_url($consultaImg->data[0]->ruta);
            }
            
            
            $lista = [
                'tabla' => 'nutricion',
                'tabla_id' => 'nutricion_id',
                'funcion' => 'findAll',
                'datos' => null,
                'condicion' => "receta_id='$idd'",
            ];
            $lista = $this->query($lista);
            $lista1 = "";
            if($lista->code==200){
                foreach($lista->data as $key){
                    $nutri = explode(' ',$key->descripcion,2);
                    $lista1 .= '<div class="col-3" style="background: rgba(255, 215, 108, 0.2);border: 2px solid #FFD76C;padding:3px;text-align: center;"><div style="color:#282C2F"><b>'.$nutri[1].'</b></div><div style="color:#406683">'.$nutri[0].'</div></div>';
                }
            }
            
            $lista = [
                'tabla' => 'ingredientes',
                'tabla_id' => 'ingrediente_id',
                'funcion' => 'findAll',
                'datos' => null,
                'condicion' => "receta_id='$idd'",
            ];
            $lista = $this->query($lista);
            $lista2 = "";
            if($lista->code==200){
                foreach($lista->data as $key){
                    $lista2 .= '<li>'.$key->nombre.' <span style="float:right">'.$key->cantidad.' '.$key->medida.'</span></li>';
                }
            }
            
            
            $lista = [
                'tabla' => 'instrucciones',
                'tabla_id' => 'instruccion_id',
                'funcion' => 'findAll',
                'datos' => null,
                'condicion' => "receta_id='$idd'",
            ];
            $lista = $this->query($lista);
            $lista3 = "";
            if($lista->code==200){
                foreach($lista->data as $key){
                    $lista3 .= '<li>'.$key->descripcion.'</li>';
                }
            }
            
            $modal = '<div class="modal-header"  style="height:230px;background-image: url('.$img.');background-position: center;background-repeat: no-repeat;background-size: 100%;position: relative;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 38px;height: 38px;right: 10px;top: 10px;background: rgba(255, 255, 255, 0.6);display: initial;border: 0px;border-radius: 100%;position: absolute;">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-danger mb-3" style="line-height:1px">'.$idrr->categoria.'</h4>
                <h3 style="font-weight: bold;">'.$idrr->nombre.'</h3>
                
                <h4 class="mt-3">Nutritional information</h4>
                <div class="container-fluid">
                <div style="overflow: auto;">
                    <div style="display: inline-flex;flex-wrap: nowrap;">
                    '.$lista1.'
                    </div>
                </div>
                </div>
                <h4 class="mt-3">Essential ingredients</h4>
                <ul class="puntos">
                   '.$lista2.'
                </ul>
                <h4>Cooking</h4>
                <ul class="puntos">
                  '.$lista3.'
                </ul>
            </div>';
            
        }
            
        
        echo $modal;
        
        exit();
    }



	//--------------------------------------------------------------------

}

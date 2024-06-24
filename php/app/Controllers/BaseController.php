<?php
namespace App\Controllers;
use App\Models\Consulta;
/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		$this->session = \Config\Services::session();

        $this->api = 'https://umatone.com/user/';
	}


	public function query($enviar)
	{
	    $postdata = http_build_query($enviar);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header' =>
                    "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

    	$datos2 = file_get_contents($this->api.'api/restconsulta/consulta',false,$context);
        $datos2 = json_decode($datos2);

    	return $datos2;

	}


    public function table($enviar)
    {
        $postdata = http_build_query($enviar);

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header' =>
                    "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);

        $datos2 = file_get_contents($this->api.'api/restconsulta/tabla',false,$context);
        $datos2 = json_decode($datos2);

        return $datos2;

    }
    
    
    public function Consultar($datos)
    {
        $this->modCon = new Consulta();
        $consulta = $this->modCon->consultar($datos['tabla'],$datos['funcion'],$datos['select'],$datos['datos'],$datos['condicion'],$datos['pagina'],$datos['limite']);
        
        if (!$consulta) {
            return array(
                "data" => 'Error en la consulta',
                "code" => 400
            ); 
        }
        return array(
            "data" => $consulta,
            "code" => 200
        ); 
    }


	public function paginacion($datos,$campos,$botones2,$validarBotones,$paginas,$indexp,$atributos){
	    
       
        $icon  ='<i class="%s" style="font-size: 12px;margin:2px;cursor:pointer; color: %s" data="%s"></i>';
        
        $li    ="";
        $tabla ='';
        
        $fila1='<td class="checkboxmasiva" style="text-align:left;vertical-align: middle; border:0;min-width:18px;width:18px; padding-top:14px; display:none"><input class="checkboxMasivo"  type="checkbox"  name="checkboxmasiva[]" value="%s"></td>';


            if(isset($atributos['style'])){
                $atributos['style']=explode("&",$atributos['style']);
            }
            if(isset($atributos['date'])){
                $atributos['date']=explode("&",$atributos['date']);
            }

            foreach ($datos as $dato) {

                $filas=$fila1;
                if(isset($atributos['tabla'])){
                    if($atributos['tabla']=="cargasPendientes"){
                        $filas= sprintf($fila1,$dato->carga_id);
                    }
                }

                $ktabla=0;

                foreach ($campos as $campo) {
                    $styletd="";
                    $datet="";
                    if(isset($atributos['style'])){
                            if(count($atributos['style'])==1){
                                $arraystyle=explode("/",$atributos['style'][0]);
                                if($arraystyle[0]=="-1"){
                                    $styletd=$arraystyle[1];
                                }
                            if($arraystyle[0]==$ktabla){
                                $styletd=$arraystyle[1];
                            }
                        }else{
                            for ($i = 0; $i <count($atributos['style']); $i++) {
                                $arraystyle=explode("/",$atributos['style'][$i]);
                                if($arraystyle[0]=="-1"){
                                    $styletd=$arraystyle[1];
                                }
                                if($arraystyle[0]==$ktabla){
                                    $styletd=$arraystyle[1];
                                }
                            }
                        }
                    }

                    if(isset($atributos['date'])){
                        for ($i = 0; $i <count($atributos['date']); $i++) {
                            $arraydate=explode("/",$atributos['date'][$i]);
                            if($arraydate[0]=="-1" || $arraydate[0]==$ktabla){
                                $arraydateval=explode(",",$arraydate[1]);
                                for ($i2 = 0; $i2 <count($arraydateval); $i2++) {
                                    if($i2==0){
                                        $indesdata=$arraydateval[$i2];
                                        $datet=$dato->$indesdata;

                                    }else{
                                                      // $datet=$datet."&".;
                                    }
                                }
                            }
                        }

                        if($datet!=""){
                            $datet='data="'.$datet.'"';
                        }
                    }

                    if(isset($atributos['tablaCamposEncodado'])){
                        $camposEncodado = $atributos['tablaCamposEncodado'];
                        $qqq=0;
                        for($i=0;$i<count($camposEncodado);$i++){
                            if($camposEncodado[$i]==$campo){
                                $qqq=1;
                            }
                        }
                        if($qqq == 1){
                            $filas=$filas.'<td class ="seleccionarPlaylist" style="vertical-align: middle;padding-left:10px; '.$styletd.'"   '.$datet.   '>'.  htmlentities(base64_decode($dato->$campo), ENT_QUOTES,"UTF-8").'</td>';
                        }else{
                            $filas=$filas.'<td class ="seleccionarPlaylist" style="vertical-align: middle;padding-left:10px; '.$styletd.'"   '.$datet.   '>'.  htmlentities($dato->$campo, ENT_QUOTES,"UTF-8").'</td>';
                        }
                    }else{

                        if(isset($atributos['hrefPos']) && $atributos['hrefPos']==$ktabla ){

                            $ddd = $atributos['hrefCampo'];
                            $filas=$filas.'<td class ="seleccionarPlaylist" style="vertical-align: middle;padding-left:10px; '.$styletd.'"   '.$datet.   '><a href="'.$atributos['hrefUrl'].'/'.$dato->$ddd.'">'.  htmlentities($dato->$campo, ENT_QUOTES,"UTF-8").'</a></td>';
                        }else{
                            $filas=$filas.'<td class ="seleccionarPlaylist" style="vertical-align: middle;padding-left:10px; '.$styletd.'"   '.$datet.   '>'.  htmlentities($dato->$campo, ENT_QUOTES,"UTF-8").'</td>';
                        }
                    }

                    $ktabla++;

                }

                $k=0;
                for ($i = 0; $i < count($botones2); $i++) {
                    $botonesinterno="";
                    $dataArray="";
                        for ($i2 = 0; $i2 < count($botones2[$i]); $i2++) {

                            if (isset($botones2[$i][$i2]['data'])) {

                                for ($i3 = 0; $i3 < count($botones2[$i][$i2]['data']); $i3++) {
                                    $indexdata=$botones2[$i][$i2]['data'][$i3];
                                    if (isset($dato->$indexdata)) {
                                        if($i3==0){
                                            $dataArray=$dato->$indexdata;
                                        }else{
                                            $dataArray=$dataArray."&".$dato->$indexdata;
                                        }
                                    }
                                }
                            }

                            if (isset($botones2[$i][$i2]['definido'])) {
                                $botonesinterno=$botonesinterno.sprintf($icon,$botones2[$i][$i2]['definido'],$botones2[$i][$i2]['color'],$dataArray);
                            }else{
                                if($validarBotones[$k]!=""){
                                    $indexd=$validarBotones[$k];
                                    if (isset($dato->$indexd) && $dato->$indexd!=""){
                                        $indexd=$dato->$indexd;
                                        if (isset($botones2[$i][$i2][$indexd]['icon'])){
                                            $botonesinterno=$botonesinterno.sprintf($icon,$botones2[$i][$i2][$indexd]['icon'],$botones2[$i][$i2][$indexd]['color'],$dataArray);
                                        }
                                    }else{
                                        $botonesinterno=$botonesinterno.sprintf($icon,$botones2[$i][$i2]['vacio']['icon'],$botones2[$i][$i2]['vacio']['color'],$dataArray);
                                    }
                                }else{
                                    $botonesinterno=$botonesinterno.sprintf($icon,$botones2[$i][$i2]['true'],$botones2[$i][$i2]['color'],$dataArray);
                                }
                            }
                            $k++;
                        }
                        $filas=$filas.'<td style="text-align: center;'.$styletd.'">'.$botonesinterno.'</td>';

                    }
                $tabla.=' <tr>'.$filas.'</tr>';
            }
            
            $li_a2='<li class="page-item %s" onclick="%s"><a class="page-link" style="padding:0;"  >%s</a></li>';
            $li_a='<li class="page-item %s" onclick="%s"><a class="page-link"  >%s</a></li>';

            $li_Anterior=sprintf($li_a2,'','buscarpagina('.($indexp - 1).')','<i class=" mdi  mdi-chevron-left" style="font-size: 21px; color: #003169"></i>');
            $li_Siguiente=sprintf($li_a2,'','buscarpagina('.($indexp + 1).')','<i class="mdi  mdi-chevron-right" style="font-size: 21px; color: #003169"></i>');
            if($indexp==1){
                $li_Anterior=sprintf($li_a2,'disabled','','<i class=" mdi  mdi-chevron-left" style="font-size: 21px; color:#003169"></i>');
            }
            if($indexp==$paginas){
                $li_Siguiente=sprintf($li_a2,'disabled','','<i class="mdi  mdi-chevron-right" style="font-size: 21px; color: #003169"></i>');
            }
            $paginastotalf=$paginas;
            $iniciaindex=0;
            if($paginas>6){
                if(($indexp-3)>0){
                    $iniciaindex=$indexp-3;
                }
            }
            if($paginas>=($iniciaindex+5)){
                $paginastotalf=$iniciaindex+5;
            }
            for ($i = $iniciaindex; $i <$paginastotalf ; $i++){
                $li_active=$indexp == $i + 1 ? 'active' : '';
                $li.=sprintf($li_a,$li_active,'buscarpagina('.($i + 1).')',$i + 1);
            }
            if($indexp>7 && $paginas>7){
                $li=sprintf($li_a,'','buscarpagina(1)',1).sprintf($li_a,'','','...').$li;
            }
            if($paginas>5 && ($paginas>($indexp+2))){
                $li.=sprintf($li_a,'','','...');

                if(($iniciaindex+5+25)<$paginas){
                    $li.=sprintf($li_a,'','buscarpagina('.($iniciaindex+5+25).')',($iniciaindex+5+25));
                }else{
                    $li.=sprintf($li_a,'','buscarpagina('.($paginas).')',$paginas);
                }
            }

            if($li==""){

                $li=$indexp =sprintf($li_a,'active','','1');

            }
            $datosr["paginar"] =$li_Anterior.$li.$li_Siguiente;
            $datosr["tabla"] =$tabla;
            return $datosr;
    }

}

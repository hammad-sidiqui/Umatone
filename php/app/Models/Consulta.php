<?php namespace App\Models;

use CodeIgniter\Model;

class Consulta extends Model
{

    protected $table            = 'usuarios';
    protected $primaryKey       = 'usuario_id';
    protected $allowedFields    =[];


    public function query($tabla=null,$key=null,$funcion=null,$data=null,$where=null){

      $this->table=$tabla;
      $this->primaryKey = $key;

      if($data!=null){
          $this->allowedFields =array_keys($data);
          if($where!=null){
              return $this->where($where)->set($data)->$funcion();
          }else{
              return $this->$funcion($data);
          }
      }else{
          if($where!=null){
              if($funcion!="delete"){
                  return  $this->where($where)->$funcion();
              }else{
                  return $this->where($where)->$funcion();
              }
          }else{
              return $this->$funcion();
          }
      }
    }

    public function table($tabla='',$buscar='',$limit=0, $offset=0,$select = ''){
        
        $order = "";
        
        if($tabla=="cliente_plan"){
            $order = "order by  cliente_plan_id desc";
        }
        
        $datos['consulta'] =  $this->db->query("SELECT *$select from $tabla as dd  $buscar $order limit $limit,$offset ")->getResult();

        $total  = $this->db->query("SELECT * from $tabla as dd  $buscar")->getResult();
        $datos['total']  = count($total);
        return $datos;
            
    }
    
    
    public function consultar($tabla=null,$funcion=null,$select = null,$data=null,$condicion='',$pag=0, $lim=0){
        
        
        
        if($tabla=="cliente_plan"){$tabla_id="cliente_plan_id";}
        if($tabla=="plan"){$tabla_id="plan_id";}
        if($tabla=="contenido"){$tabla_id="contenido_id";}
        if($tabla=="plan_receta"){$tabla_id="plan_receta_id";}
        if($tabla=="quiz"){$tabla_id="quiz_id";}
        if($tabla=="usuarios"){$tabla_id="usuario_id";}
        if($tabla=="clientes"){$tabla_id="cliente_id";}
        if($tabla=="pagos"){$tabla_id="pago_id";}
        
        $this->table=$tabla;
        $this->primaryKey = $tabla_id;
        
        
        
        if($funcion=="tabla"){
            $datos['consulta'] =  $this->db->query("SELECT *$select from $tabla $condicion limit $pag,$lim ")->getResult();
    
            $total  = $this->db->query("SELECT * from $tabla $condicion")->getResult();
            $datos['total']  = count($total);
            return $datos;
        }else{
            if($data!=null){
                  $this->allowedFields =array_keys($data);
                  if($condicion!=null){
                      return $this->where($condicion)->set($data)->$funcion();
                  }else{
                      return $this->$funcion($data);
                  }
            }else{
                
                if($select==null){
                    $select="";
                }
                   if($condicion!=null){
                      return $this->select($select)->where($condicion)->$funcion();
                  }else{
                      return $this->select($select)->$funcion();
                  }
            }
        }
        
            
            
    }
    
    
    
    


}

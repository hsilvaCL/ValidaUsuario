<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario{
    var $idusuario;
    var $nombre;
    var $nomusuario;
    var $clave;
    var $dbQuery;
    
    public function __construct($usu="",$pwd="") {
        $this->nomusuario=$usu;
        $this->clave=$pwd;
    }
    
    public function VerificaAcceso(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;

        $clavemd5=md5($this->clave);
        
        $sql="SELECT * FROM acceso"
             ." WHERE nomusuario='$this->nomusuario' and pwdusuario='$clavemd5'";
        
        $resultado=$db->query($sql);
        
       
        if($resultado->num_rows>=1){
            $row = $resultado->fetch_row();
            $this->idusuario=$row[0];
            $this->nombre=$row[3];
            return true;
        }
        else{
            return false;
        }
            
    }
    public function Listado(){
        if (!$this->dbQuery){
            $oConn=new Conexion();
            if($oConn->Conectar())
                $db=$oConn->objconn;            
            else
                return false;
            $sql="SELECT * FROM acceso";
            $this->dbQuery=$db->query($sql);
        }
        
        $row=$this->dbQuery->fetch_assoc();
        
        if (!$row) return null;
        $oUsu=new Usuario();
        $oUsu->idusuario=$row["IDACCESO"];
        $oUsu->nombre=$row["NOMBRE"];
        $oUsu->nomusuario=$row["NOMUSUARIO"];
        return $oUsu;
         
    }
    
    public function ListadoArreglo(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;
       
        $sql="SELECT * FROM acceso";
        
        $resultado=$db->query($sql);
        
         $i=0;
         while($row = $resultado->fetch_assoc()){
               $oUsu=new Usuario();
               $oUsu->idusuario=$row["IDACCESO"];
               $oUsu->nombre=$row["NOMBRE"];
               $oUsu->nomusuario=$row["NOMUSUARIO"];
             $arrUsuarios[$i]=$oUsu;
             $i++;
         }
         if (isset($arrUsuarios)) return $arrUsuarios; else return null;
        
    }
}

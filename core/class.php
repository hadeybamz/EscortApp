<?php

class Excort{
    
  public $id,$cname, $pname, $etype, $reqdate, $reqtime, $arrdept, $pickup, $flight, $dest,$active=FALSE;
  
  function __construct($id,$cname, $pname, $etype, $reqdate, $reqtime, $arrdept, $pickup, $flight, $dest){
    $this->id=$id;
    $this->cname=$cname;
    $this->pname=$pname;
    $this->etype=$etype;
    $this->reqdate=$reqdate;
    $this->reqtime=$reqtime;
    $this->arrdept=$arrdept;
    $this->pickup=$pickup;
    $this->flight=$flight;
    $this->dest=$dest;
  }
  public function __toString(){
    return $this->reqdate;
  }
  public function isNew(){
    if($this->id>0){
      return FALSE;
    }else{
      return TRUE;
    }
  }
  public function isActive(){
    return $this->active;
  } 
}

?>
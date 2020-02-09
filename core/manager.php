<?php
  
  include "class.php";

   //excorttb manager
  class ExcortManager{
    public $response = [];
    
    public function saveExcorts($excorts){
           if(!$excorts->isNew()){
              $this->updateExcorts($excorts);
           }else{
              $this->createNewExcorts($excorts);
           }
    }
    public function viewExcorts($excorts){
           if($excorts===0){
              $this->listExcorts();
           }else{
              $this->selectExcorts($excorts);
           }
      return $this->response;
    }
    private function listExcorts(){
    //implement select
       include 'connect.php';
       $select_stmt = $conn->query("SELECT * FROM excorttb order by id desc");
       while($row = $select_stmt->fetch_assoc()){
          $this->response[] = $row;
          }
       $conn->close();
    }
    private function selectExcorts($excorts){
    //implement select
       include 'connect.php';
       $view_stmt=$conn->query("SELECT * FROM excorttb WHERE arrdept='$excorts'");
       while($row = $view_stmt->fetch_assoc()){
        $this->response[] = $row;
      }
       $conn->close();
    }
    private function createNewExcorts($excorts){
           //insert into excorts table
      include 'connect.php';
      $insert_stmt="INSERT INTO excorttb (cname, pname, etype, reqdate, reqtime, arrdept, pickup, flight, destination)
      VALUES ('".$excorts->cname."', '".$excorts->pname."', '".$excorts->etype."', '".$excorts->reqdate."', '".$excorts->reqtime."', '".$excorts->arrdept."', '".$excorts->pickup."', '".$excorts->flight."', '".$excorts->dest."')";
      $conn->query($insert_stmt);
      $conn->close();
    }
    private function updateExcorts(Excorts $excorts){
      //update of ariticle
      include 'connect.php';
      $update_stmt="UPDATE excorts SET full_name='$excorts->full_name',emails='$excorts->emails',password='$excorts->password',privilege='$excorts->privilege' WHERE ID='$excorts->id'";
      $conn->query($update_stmt);
      $conn->close();       
    }
  } 

?>
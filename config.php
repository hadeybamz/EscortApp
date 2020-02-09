<?php 
  require('core/manager.php');

  if(isset($_POST['submit'])){
    $cname = $_POST["cname"];
    $pname = $_POST["pname"];
    $etype = $_POST["etype"];
    $reqdate = $_POST["reqdate"];
    $reqtime = $_POST["reqtime"];
    $arrdept = $_POST["arrdept"];
    $pickup = $_POST["pickup"];
    $flight = $_POST["flight"];
    $dest = $_POST["destination"];

    $Excort= new Excort(0,$cname, $pname, $etype, $reqdate, $reqtime, $arrdept, $pickup, $flight, $dest);
    
    $mgr=new ExcortManager();
    $mgr->saveExcorts($Excort);
    header("Location: index.php?msg=Added Successfully");
   
  }
  $conn->close();

?>
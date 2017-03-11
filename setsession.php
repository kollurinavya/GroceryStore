<?php 
session_start();

$num = $_POST['count'];
$id = $_POST['prod_id'];
$name = $_POST['prod_name'];
$cost = $_POST['prod_cost'];
$row = array(row=>$num,id =>$id,name=>$name,cost=>$cost);

$_SESSION[$num] = $row;
$_SESSION['total'] = $num;

?>
<?php
require_once 'connection.php';
include_once 'class.user.php';
$user = new USER(getConnection());
// $user->register("admin","admin");
if($user->is_loggedin()!="")
{
 $user->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
 $uname = $_POST['txt_uname_email'];

 $upass = $_POST['txt_password'];

 if($user->login($uname,$upass))
 {
  $user->redirect('index.php');
 }
 else
 {
  echo "Wrong Details !";
 }
}
?>

 <?php
require_once 'connection.php';
include_once 'class.user.php';
$user = new USER(getConnection());
// $user->register("admin","admin");
if($user->is_loggedin()!="")
{
 $user->redirect('login.php');
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
 {?>
   <!DOCTYPE html>
   <html lang="en">

     <head>
             <title>Mobile Care</title><meta charset="UTF-8" />
             <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     		<link rel="stylesheet" href="css/bootstrap.min.css" />
     		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
             <link rel="stylesheet" href="css/maruti-login.css" />
     </head>

       <body>
           <div id="logo">
               <img src="img/login-logo.png" alt="" />
           </div>
           <div id="loginbox">
               <form id="loginform" class="form-vertical" method="post" action="loginprocess.php">

   				 <div class="control-group normal_text"><h3>Mobile Care Login</h3></div>
             <div>
             <p style="font-size:24px">&nbsp; </p>
             <p style="font-size:24px;text-align:center;color:#CC0033">Invalid username or password!</p>
             <p style="font-size:24px">&nbsp; </p>
             <div class="span5">  </div>
               <center><a href="login.php" class="btn btn-success " style="font-size:24px">try again</a></center>
              <span></span>
             </div>
               </form>

           </div>

           <script src="js/jquery.min.js"></script>
           <script src="js/maruti.login.js"></script>
       </body>

   </html>

  <?php
  }
}
?>

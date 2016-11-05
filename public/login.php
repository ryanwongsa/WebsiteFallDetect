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
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="Username" name="txt_uname_email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="txt_password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">



                    <span style="margin:25%"><input type="submit" class="btn btn-success" name="btn-login" style="font-size:24px;width:50%" /></span>

                </div>
            </form>

        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/maruti.login.js"></script>
    </body>

</html>

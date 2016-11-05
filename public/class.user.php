<?php

class USER
{
    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

    public function register($uname,$upass)
    {

       try
       {

   		$salt= md5(uniqid(mt_rand(),true));

		$new_password = password_hash($upass.$salt, PASSWORD_BCRYPT);
         $stmt = $this->db->prepare("INSERT INTO admin(`S/N`,UserID,password,salt)
                                                       VALUES(:id,:uname,:upass,:salt)");


           $stmt->bindparam(":uname", $uname);
           $stmt->bindparam(":salt", $salt);
           $stmt->bindparam(":upass", $new_password);
          //  echo $uname.' '.$salt.' '.$new_password;
		   $newID=TRUE;
		   $x=6;
				do{

					$charset="OV3e9amXGijkPnYzQZ-uv56s0xN7W_J8bdBhlCfgD1HIrtULSoMwEyA4K2RpTcFq";
					$rand_id = $charset[rand(0,strlen($charset)-1)];
					for($i=0;$i<($x-1);$i++){
						$rand_id .= $charset[rand(0,strlen($charset)-1)];
					}
					 $db1 = getConnection();
					$id=$rand_id;
					$qry = "SELECT * FROM admin WHERE `S/N`=?";
					$code = $db1->prepare($qry);

					$code->bindParam(1, $id, PDO::PARAM_STR);
					$row = $code->fetch(PDO::FETCH_ASSOC);
						if(!$row){
								$newID=FALSE;
						}
				}while($newID);

		$stmt->bindparam(":id", $id);


        $stmt->execute();

           return $stmt;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
    }

    public function login($uname,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM admin WHERE UserID=:uname  LIMIT 1");
          $stmt->execute(array(':uname'=>$uname));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {

             if(password_verify($upass.$userRow['salt'], $userRow['password']))
             {
                $_SESSION['user_session'] = $userRow['S/N'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }

   public function redirect($url)
   {
       header("Location: $url");
   }

   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>

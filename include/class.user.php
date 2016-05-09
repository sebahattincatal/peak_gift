<?php 
	include "db_config.php";

	class User
	{
		public function __construct()
		{
			$db = new DB_con();
		}

		/*** user create function ***/
		public function reg_user($name, $surname, $password, $email)
		{
			$password = md5($password);

			// user check
			$check = mysql_query("SELECT * FROM user WHERE email='$email'") or die(mysql_error());
			
			$count_row = mysql_num_rows($check);

			// user create
			if ($count_row == 0)
			{
				$result = mysql_query("INSERT INTO user SET name = '$name', surname = '$surname', password = '$password', email = '$email'") or die(mysql_error());
        		
        		return $result;
			} else { 
				return false;
			}
		}


		/*** user login function ***/
		public function check_login($email, $password)
		{
        	$password = md5($password);
			
			// user check
        	$result = mysql_query("SELECT id from user WHERE email='$email' and password='$password'");
        	$user_data = mysql_fetch_array($result);
        	$count_row = mysql_num_rows($result);
		
	        if ($count_row == 1) {
	            $_SESSION['login'] = true;
	            $_SESSION['uid'] = $user_data['id'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}

    	/*** user get name function***/
    	public function get_fullname($uid)
    	{
	        $result = mysql_query("SELECT name FROM user WHERE id = $uid");
	        $user_data = mysql_fetch_array($result);
	        echo $user_data['name'];
    	}

    	/*** user get name function***/
    	public function get_surname($uid)
    	{
	        $result = mysql_query("SELECT surname FROM user WHERE id = $uid");
	        $user_data = mysql_fetch_array($result);
	        echo $user_data['surname'];
    	}

    	/*** user get name function***/
    	public function get_email($uid)
    	{
	        $result = mysql_query("SELECT email FROM user WHERE id = $uid");
	        $user_data = mysql_fetch_array($result);
	        echo $user_data['email'];
    	}

    	/*** user get gifts function ***/
    	public function get_gifts($uid)
    	{
	        $expired = date('Y-m-d', mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")));

	        $result = mysql_query("SELECT gifts_id FROM user_gifts WHERE user_id = $uid AND expired_on >= '$expired'");
	        
	        if ($result) 
			{
				while ($satir = mysql_fetch_row($result)) 
				{
					foreach ($satir as $deger) 
					{
						$gift = mysql_query("SELECT name FROM gifts WHERE id = '$deger'");
						
						if ($gift) 
						{
							while ($satir = mysql_fetch_row($gift)) 
							{
								foreach ($satir as $deger) 
								{
									echo $deger."  ";
								}
							}
						}
						
					}
				}
			}

			mysql_free_result($result);
    	}

  
    	/*** session start function ***/
	    public function get_session()
	    {
	        return $_SESSION['login'];
	    }

	    /*** user logout function ***/
	    public function user_logout() 
	    {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	    /*** get all user function***/
	    public function get_all_users($uid)
	    {
			$result = mysql_query("SELECT id, name, surname, email FROM user WHERE id != $uid");

			if ($result) 
			{
				while ($satir = mysql_fetch_row($result)) 
				{
					echo "<tr>";
					foreach ($satir as $deger) 
					{
						echo "<td><a href='gifts.php'>".$deger."</a></td>";	
					}

					echo "</tr>";
				}
			}

			mysql_free_result($result);

	    }

	    /*** get all user email function ***/
	    public function get_all_email($uid)
	    {
	    	$result = mysql_query("SELECT id, email FROM user WHERE id != $uid");

	    	if ($result) 
			{
				echo "<option selected='selected' value=''> Kullanıcı Seç..!</option>";

				while ($cdrow = mysql_fetch_array($result)) 
				{
		            $email = $cdrow["email"];
		            $id = $cdrow['id'];

					echo "<option value='$id'> $email </option>";
	            }
			}

			mysql_free_result($result);
	    }

	    /*** get all user gifts funcion ***/
	    public function get_all_gifts()
	    {
	    	$result = mysql_query("SELECT * FROM gifts");

	    	if ($result) 
			{
				echo "<option selected='selected' value=''> Hediye Seç..!</option>";

				while ($cdrow = mysql_fetch_array($result)) 
				{
		            $name = $cdrow["name"];
		            $id = $cdrow['id'];

					echo "<option value='$id'> $name  </option>";
	            }
			}

			mysql_free_result($result);
	    }

	    /*** send gift function***/
	    public function gifts_send($id, $uid, $gift_id)
	    {
	    	$expired = date('Y-m-d', mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")));

			// user check
			$check = mysql_query("SELECT * FROM gifts_send_user WHERE gift_send_user = '$uid' AND created_on = '$expired'") or die(mysql_error());
			
			$count_row = mysql_num_rows($check);

			if ($count_row == 0) 
			{
				$mysqldate = date("Y-m-d H:i:s");

				$expired_week = date('Y-m-d H:i:s', mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 7, date("Y")));

				$expired_day = date('Y-m-d H:i:s', mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y")));

				$result = mysql_query("INSERT INTO user_gifts SET user_id = '$id', gifts_id = '$gift_id', created_on = '$mysqldate', expired_on = '$expired_week'") or die(mysql_error());

				$result1 = mysql_query("INSERT INTO gifts_send_user SET user_id = '$id', gift_send_user = '$uid', gifts_id = '$gift_id', created_on = '$mysqldate', expired_on = '$expired_day'") or die(mysql_error());

				// user create
				if ($result && $result1)
				{
	        		return true;
				} else { 
					return false;
				}
			} else {

				return false;
			}		
	    }

	    /*** user gift claim function ***/
	    public function gift_claim($id, $uid, $gift_id)
	    {
	    	$check = mysql_query("SELECT * FROM gift_require WHERE claim_user_id = '$uid'") or die(mysql_error());


	    	$count_row = mysql_num_rows($check);


			if ($count_row >= 0) 
			{
				$result = mysql_query("INSERT INTO gift_require SET user_id = '$id', claim_user_id = '$uid', gift_id = '$gift_id'") or die(mysql_error());

				// user gift claim create
				if ($result)
				{
	        		return true;
				} else { 
					return false;
				}
			} 
	    }
	}
?>
<?php
	include("authconfig.php");
	define("DBHOST", $dbhost);
	define("DBUSER", $dbusername);
	define("DBPASS", $dbpass);
	define("DBNAME", $dbname);
	define("AUTHTEAM", "authteam");
	class auth {
		//CONNECT TO MYSQL
		 function connect(){
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			$SelectedDB = mysql_select_db(DBNAME) or die("Could not select database: " . mysql_error());
			return $connection;
		}
		// AUTHENTICATE
		function authenticate($username, $password) {

			$safeUsername = addslashes($username);
			$safePassword = addslashes($password);
			$query = "SELECT * FROM  people  WHERE uname='$safeUsername' AND passwd=MD5('$safePassword') AND status <> 'inactive'";
			$UpdateRecords = "UPDATE  people  SET lastlogin = NOW(), logincount = logincount + 1 WHERE uname='$safeUsername'";
			 $this->connect();
			$result = mysql_query($query); 
			$numrows = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			// CHECK IF THERE ARE RESULTS
			if ($numrows == 0) {
				return 0;
			}
			else {
				$Update = mysql_query($UpdateRecords);
				return $row;
			}
		} 
		// GET FULL NAME FOR CREDIT CARD
		function fullname($id,$type) {
			
		 
			$query = "SELECT * FROM  people WHERE id='$id'";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());

			$SelectedDB = mysql_select_db(DBNAME) or die("Could not select database: " . mysql_error());
			$result = mysql_query($query); 
			
			$numrows = mysql_num_rows($result);
			$row = mysql_fetch_object($result);
			if($type == 1)
			$row=$row->fullname;
			if($type == 2){
			$query = "SELECT * FROM  authteam WHERE id='$row->team'";
			
			$result = mysql_query($query); 
			
			$numrows = mysql_num_rows($result);
			$row = mysql_fetch_object($result);
			$row=$row->teamname;}
			if ($numrows == 0) {
				return 0;
			}
		   
			else {
				return $row;
			}
		} //end fonction

		
		function memberview($id) {
			

			$query = "SELECT * FROM  people WHERE id='$id'";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());

			$SelectedDB = mysql_select_db(DBNAME) or die("Could not select database: " . mysql_error());
			$result = mysql_query($query); 
			
			$numrows = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			
			// CHECK IF THERE ARE RESULTS
			
			
			if ($numrows == 0) {
				return 0;
			}
		   
			else {
				return $row;
			}
		} //end fonction

		// display el members data
		function display($id,$search) {

			
			if(!$search)
			$query = "SELECT * FROM people WHERE accid = $id";
			else if($search == "email")
			$query = "SELECT * FROM people WHERE email='$id'";
			else 
			$query = "SELECT * FROM people WHERE accid = $id and fullname like '%$search%'";
		
			
			
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction
		

		
			// used in the initial login screen
		function page_check($username, $password) {

			// Make the username and password safe by adding slashes
			$safeUsername = addslashes($username);
			$safePassword = addslashes($password);

			$query = "SELECT * FROM  people WHERE uname='$safeUsername' AND passwd=MD5('$safePassword') AND status <> 'inactive'";

			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			
			$numrows = mysql_num_rows($result);
			$row = mysql_fetch_array($result);

			// CHECK IF THERE ARE RESULTS
			
			if ($numrows == 0) {
				return false;
			}
			else {
		
				return $row;
			}
		} // End: function page_check	
		function user_check($id) {
			$query = "SELECT * FROM  people WHERE id=$id";

			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			
			$numrows = mysql_num_rows($result);
			$row = mysql_fetch_array($result);

			// CHECK IF THERE ARE RESULTS
			
			if ($numrows == 0) {
				return false;
			}
			else {
		
				return $row;
			}
		} // End: function page_check
			// modify password
			
		function modify_password($username, $newpasswd, $team, $level, $status, $id){

			// Make the username and password safe by adding slashes
			$safeUsername = addslashes($username);
			$safePassword = addslashes($newpasswd);

				// If $password is blank, make no changes to the current password
			 if (!trim($newpasswd == ''))
			 $qUpdate = "UPDATE  people  SET passwd=MD5('$safePassword') WHERE id='$id'";
	  
			if (trim($level)=="") {
				return "blank level";
			}
			elseif (($username=="sa" AND $status=="inactive")) {
				return "sa cannot be inactivated";
			}
			elseif (($username=="admin" AND $status=="inactive")) {
				return "admin cannot be inactivated";
			}
			else {
				$connection = mysql_connect(DBHOST, DBUSER, DBPASS);
				$SelectedDB = mysql_select_db(DBNAME);
				$result = mysql_query($qUpdate); 
				return 1;
			}
			
		} // End: function modify_password
		
		
		// MODIFY USERS
		function modify_user($id,$fullname,$password, $status, $Company, $Phone, $Address , $Dateofbirth, $email) {

			// Make the username and password safe by adding slashes
			
			$safePassword = addslashes($password);

				// If $password is blank, make no changes to the current password
			 if (trim($password == ''))
			{
				$qUpdate = "UPDATE  people  SET  fullname='$fullname', Company='$Company', Phone='$Phone' ,email='$email' WHERE id='$id'";
			  }
			  else
			  {
					$qUpdate = "UPDATE  people  SET passwd=MD5('$safePassword'), fullname='$fullname', status= '$status' ,email='$email' ,Company='$Company',Address='$Address',Dateofbirth='$Dateofbirth', Phone='$Phone' WHERE id='$id'";
						  
				}



			
				$connection = mysql_connect(DBHOST, DBUSER, DBPASS);
				$SelectedDB = mysql_select_db(DBNAME);
				$result = mysql_query($qUpdate); 
				return 1;
			
			
		} // End: function modify_user
		
		// DELETE USERS
		function delete_user($id) {
		
			$qDelete = "DELETE FROM  people  WHERE id='$id'";
		  
			
		

			$connection = mysql_connect(DBHOST, DBUSER, DBPASS);
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($qDelete); 
		
			return mysql_error();
			
		} // End: function delete_user
		
		// ADD USERS
		function add_user($fullname, $username, $password, $team, $status, $Company, $Phone, $email , $Address , $Dateofbirth) {
			// Make the username and password safe by adding slashes
			$safeUsername = addslashes($username);
			$safePassword = addslashes($password);

			$qUserExists = "SELECT * FROM people  WHERE uname='$safeUsername'";
					
			$qInsertUser = "INSERT INTO  people (fullname,accid, uname, passwd, team, status, lastlogin, logincount,Company, Phone, email, Address, Dateofbirth)
								   VALUES ('$fullname',1,'$safeUsername', MD5('$safePassword'), '$team',  '$status', '', 0,'$Company','$Phone','$email','$Address' ,'$Dateofbirth')";
			
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS);
			
			// Check if all fields are filled up
			if (trim($username) == "") { 
				return "blank username";
			}
			// password check added 09-19-2003
			else if (trim($password) == "") {
				return "blank password";
			}

			
			// Check if user exists
			$SelectedDB = mysql_select_db(DBNAME);
			
			$user_exists = mysql_query($qUserExists);

			if (mysql_num_rows($user_exists) > 0) {
				return "username exists";
			}
			else {
				// Add user to DB			
		
		
				// REVISED CODE
				$SelectedDB = mysql_select_db(DBNAME);
				$result = mysql_query($qInsertUser); 

				return mysql_affected_rows();
			}
		} // End: function add_user


		// *****************************************************************************************
		// ************************************** G R O U P S ************************************** 
		// *****************************************************************************************
	   // show all team data
		function displayt() {

			
			
			$query = "SELECT * FROM  authteam ";

			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
			
		} // End: function 
		// ADD TEAM
		function add_team($teamname, $teamlead) {
			$status="active";
			$qGroupExists = "SELECT * FROM " . AUTHTEAM . " WHERE teamname='$teamname'";
			$qInsertGroup = "INSERT INTO " . AUTHTEAM . "(teamname, teamlead, status) 
								   VALUES ('$teamname', '$teamlead', '$status')";
			
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS);
			
			// Check if all fields are filled up
			if (trim($teamname) === "") { 
				return "blank team name or incorrect case";
			}
			
			// Check if group exists
		
			
			// REVISED CODE
			$SelectedDB = mysql_select_db(DBNAME);
			$group_exists = mysql_query($qGroupExists); 

			if (mysql_num_rows($group_exists) > 0) {
				return "group exists";
			}
			else {
				// Add user to DB
				// OLD CODE - DO NOT REMOVE
				// $result = mysql_db_query(DBNAME, $qInsertGroup);

				// REVISED CODE
				$SelectedDB = mysql_select_db(DBNAME);
				$result = mysql_query($qInsertGroup); 

				return mysql_affected_rows();
			}
		} // End: function add_group
		
		// MODIFY TEAM
		function modify_team($id,$teamname, $teamlead, $status) {
			$qUpdate = "UPDATE " . AUTHTEAM . " SET teamname='$teamname' ,teamlead='$teamlead', status='$status'
						WHERE ID='$id'";
			//$qUserStatus = "UPDATE " . people . " SET status='$status' WHERE team='$teamname'";

			if ($teamname == "Admin" AND $status=="inactive") {
				return "Admin team cannot be inactivated.";
			}
			elseif ($teamname == "Ungrouped" AND $status=="inactive") {
				return "Ungrouped team cannot be inactivated.";
			}
			else {		
				$connection = mysql_connect(DBHOST, DBUSER, DBPASS);
				
	

				// REVISED CODE
				$SelectedDB = mysql_select_db(DBNAME);
			//hi	//$userresult = mysql_query($qUserStatus); 
		
		

				// REVISED CODE
				$result = mysql_query($qUpdate); 
		
				return 1;
			}
			
		} // End: function modify_team

		// DELETE TEAM
		function delete_team($id) {
			$qDelete = "DELETE FROM  AUTHTEAM WHERE id=$id";
			// $qUpdateUser = "UPDATE  people  SET team='Ungrouped' WHERE team='$teamname'";	
			
			// if ($teamname == "Admin") {
				// return "Admin team cannot be deleted.";
			// }
			// elseif ($teamname == "Ungrouped") {
				// return "Ungrouped team cannot be deleted.";
			// }
			// elseif ($teamname == "Temporary") {
				// return "Temporary team cannot be deleted.";
			// }

			$connection = mysql_connect(DBHOST, DBUSER, DBPASS);
			// OLD CODE - DO NOTE REMOVE
			// $result = mysql_db_query(DBNAME, $qUpdateUser);

			// REVISED CODE
			$SelectedDB = mysql_select_db(DBNAME);
			//$result = mysql_query($qUpdateUser); 
			

			// OLD CODE - DO NOT REMOVE
			// $result = mysql_db_query(DBNAME, $qDelete);
			
			// REVISED CODE
			$result = mysql_query($qDelete); 

			return mysql_error();
			
		} // End: function delete_team
		// *****************************************************************************************
		// ************************************** banks ******************************************** 
		// *****************************************************************************************
		
		
		   // show all credit card info
			function displaycard() {

			
			
			$query = "SELECT * FROM  creditinfo";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction 
		// show all account  info
			function displayacc($type) {

			
			
			$query = "SELECT * FROM  account where acctype= $type";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query);
			
			return $result;
			
		} // end fonction
		
		function delete_card($id) {

			$query = "delete  FROM  creditinfo where id ='$id'";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction	
		function add_card($pid,$name,$Credit,$total,$date,$code) {

			$con = mysql_connect("localhost","root",""); 
			mysql_select_db("inventory", $con);
			$query=("insert into creditinfo values('','$pid','$name','$Credit','$total','$date','$code')");
			mysql_query($query);
			
		} // end fonction
		
		
		
		
		
		function add_supplier($fullname,$team, $status, $Company, $Phone, $Address , $Dateofbirth) {
			
			$qUserExists = "SELECT * FROM  people  WHERE fullname='$fullname'";
													
			$qInsertUser = "INSERT INTO  people (fullname,accid,team, status, lastlogin, logincount,Company, Phone, Address, Dateofbirth)
								   VALUES ('$fullname',2,'$team', '$status', '', 0,'$Company','$Phone','$Address' ,'$Dateofbirth')";

			$connection = mysql_connect(DBHOST, DBUSER, DBPASS);
			
			
			
			
			
			// Check if user exists
			$SelectedDB = mysql_select_db(DBNAME);
			
			$user_exists = mysql_query($qUserExists);

			if (mysql_num_rows($user_exists) > 0) {
				return "username exists";
			}
			else {
				// Add supplier to DB		
					
				$SelectedDB = mysql_select_db(DBNAME);
				$result = mysql_query($qInsertUser); 

				return mysql_affected_rows();
			}
		} // End: function add_supplier
		
		// *****************************************************************************************
		// ************************************** stock ******************************************** 
		// *****************************************************************************************
		
		
		   // show all credit card info
			function displaystock1($search,$search2) {

			if($search2=="id")
			$query = "SELECT * FROM  stock where stockid='$search'";
			else
			if($search2=="related")
			$query = "SELECT * FROM  stock where categorie='$search' order by rand() LIMIT 6";
			else
			if($search2=="last")
			$query = "select * from stock ORDER by stockid DESC Limit 3";
			else
			if($search2=="sn")
			$query = "SELECT * FROM stock where sn ='$search'";
			else
			if($search == 'All' && $search2=='All')
			$query = "SELECT * FROM  stock ";
			else
			if($search == 'All')
			$query = "SELECT * FROM  stock where cost < '$search2'";
			 else
			if($search2 =='All')
			$query = "SELECT * FROM  stock where categorie='$search'";
			else
			$query = "SELECT * FROM  stock where categorie='$search' and cost < '$search2'"; 
			
			return $query;
			
		} // end fonction	
		function displaystock($search,$search2) {

			if($search2=="id")
			$query = "SELECT * FROM  stock where stockid='$search'";
			else
			if($search2=="related")
			$query = "SELECT * FROM  stock where categorie='$search' order by rand() LIMIT 6";
			else
			if($search2=="last")
			$query = "select * from stock ORDER by stockid DESC Limit 3";
			else
			if($search2=="sn")
			$query = "SELECT * FROM stock where sn ='$search'";
			else
			if($search == 'All' && $search2=='All')
			$query = "SELECT * FROM  stock ";
			else
			if($search == 'All')
			$query = "SELECT * FROM  stock where cost < '$search2'";
			 else
			if($search2 =='All')
			$query = "SELECT * FROM  stock where categorie='$search'";
			else
			$query = "SELECT * FROM  stock where categorie='$search' and cost < '$search2'"; 
			
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction
		

		   // show all credit card info
			function searchstock($name) {

			
			$query = "SELECT * FROM  stock where name like '%$name%'"; 

			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction	 

		// show all credit card info
			function insertstock($name, $info, $sn, $categorie,$package, $cost,$whouse ,$filepath) {
			$query = "INSERT INTO stock (name,info,sn,categorie,package,cost,whouse ,  pix) VALUES ('$name', '$info ', '$sn', '$categorie','$package', '$cost','$whouse' ,'$filepath')";
			
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
		
			
		} // end fonction
		
		function delete_stock($id) {

			$query = "delete  FROM  stock where stockid ='$id'";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction
		
				function displayinvoice($id) {

			
			
			$query = "SELECT * FROM  invoice where typeid='$id'";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction
		
		function delete_invoice($id) {

			$query = "delete  FROM  invoice where id ='$id'";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction
			 function displaycat() {

		
			$query = "SELECT * FROM  categorie ";
			$connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die("Could not connect to database: " . mysql_error());
			
			$SelectedDB = mysql_select_db(DBNAME);
			$result = mysql_query($query); 
			return $result;
			
		} // end fonction
	
	} // End: class auth
?>

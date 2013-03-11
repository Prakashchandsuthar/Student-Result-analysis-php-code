<?php
session_start();
?>

<!DOCTYPE html PUBLIC ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enter details</title>
<link href="fonts.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
table.menu {
	font-size:100%;
	position:absolute;
	visibility:hidden;
	width: 177px;
	background-color: #E5E5E5;
}
-->
</style>


<script type="text/javascript">
function showmenu(elmnt)
{
document.getElementById(elmnt).style.visibility="visible"
}
function hidemenu(elmnt)
{
document.getElementById(elmnt).style.visibility="hidden"
}
</script>

<SCRIPT LANGUAGE="JavaScript">

function put() 
{
var x, y, z,e,f;
x = document.form['En_no'].value;
e='.jpg';
z='Images/';
document.form['img'].value =  z+x+e;

}


</script>

<link href="../fonts.css" rel="stylesheet" type="text/css" />
</head>
<?php
if(!isset($_SESSION['userid'])&&!isset($_SESSION['password']))
{ ?>
<CENTER>
<H1><font color="red">YOU DONT HAVE ACCESS TO THIS PAGE.........................SORRY</font></H1>
</CENTER>
<?php }
else
{
$rfclass=$_POST["rfclass"];
$sem=$_POST["sem"];
$year=$_POST["year"];
$name="$rfclass$sem$year";
//echo"$name";

$conn = mysql_connect("localhost","root","") or("error");
mysql_select_db("result_analysis",$conn);
$sql= "CREATE DATABASE $name";
mysql_query($sql,$conn);


$sqldt = "CREATE TABLE dtname(name varchar(40))";
mysql_query($sqldt,$conn);

$sql1 = "INSERT into dtname values('$name')";
$result1=mysql_query($sql1,$conn);

//$rfclass$sem$year(id integer, name varchar(20))";
//mysql_query($sql,$conn);


$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);

$sql= "SELECT * FROM dtname";
$result=mysql_query($sql, $db_link);

 $num=mysql_num_rows($result);


?>


<html>
<style type = "text/css">
body{background-image :url(bag.jpg);}
</style>

<body>
<center>
<table>
<tr>
<th>
 
<img src="m.jpg" height="100" width="100" alt="logo"  />

</th> 

<TH>

<img src="resultan.jpg" height="90" width="700" alt="logo"  />
</TH>
</center>
</table>
<hr />
<hr/>










<div align="center"></div>
<table width="754" border="0" align="center" cellpadding="0" cellspacing="2">
 
  <tr class="gray">
    <td align="left" valign="top" class="white"><table width="99%" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td width="4%" valign="top">&nbsp;</td>
        <td width="96%" align="left" valign="top">
		
<form id="form" name="form" method="post" action= "ins.php" > 
	
 <table border="1">
		 <tr>
                  <select name="menu">
                               <?php 
                                 
		for($i=$num;$i>=1;$i--) $row = mysql_fetch_array($result, MYSQL_ASSOC) ?>
		
		 	<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>
		
		 
		
 </select>
                     </tr>
	</table>		  		    
       <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
            <tr>
              <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">Enter The Details</font> </p>
                </td>
            </tr>
           
            <tr>
       
                <table width="300%" border="0" cellpadding="2" cellspacing="2" class="text_black">
                       <center>
                        <tr>
                          <td height="355"><table width="50%" border="0" cellspacing="2" cellpadding="2">
  


                            <tr>
 <td>Exam Name :  <input name="examname" type="text" class="menu" id="name" maxlength="255" /><br><br>
</td>
</tr>
                            <tr>
                              <td width="50%"> Subject Name<br></td>
                               <table>
<tr>
                              <td>1 <input name="sub1" type="text" class="menu" id="name" maxlength="255" /><br><br></td>

                            </tr>
<tr>
                              <td>2 <input name="sub2" type="text" class="menu" id="name" maxlength="255" /><br><br></td>

                            </tr>
<tr>
                              <td>3 <input name="sub3" type="text" class="menu" id="name" maxlength="255" /><br><br></td>

                            </tr>
<tr>
                              <td>4 <input name="sub4" type="text" class="menu" id="name" maxlength="255" /><br><br></td>

                            </tr>
<tr>
                              <td>5 <input name="sub5" type="text" class="menu" id="name" maxlength="255" /><br><br></td>

                            </tr>

<tr>
                 <td>maximum marks:<input name="maxmarks" type="text" size="4"class="menu" id="name" maxlength="4" /></td> </tr>
<tr>
                    <td>Passing marks:<input name="passmarks" type="text"size="4" class="menu"id="name"maxlength="4"/><br></td></tr>
</table></center>

</tr>
                    
  </table>
                          
                            <p>
                              <label>
                                <input name="next" type="submit" class="menu" value="NEXT" />
                              </label>
                              <label>
                                <input name="Submit23" type="reset" class="menu" value="Reset" />
                              </label>

                            </p>
                        </tr>
    
                </form>
				    
			
                   </td>
        </tr>
            
            </table>          
    </td></tr>
</table>      </td>
  </tr>
  <tr class="black">
    <td align="center" valign="top" class="text_white"> </td>
  </tr>
</table>
</body>
</html>
<?php
}
?>



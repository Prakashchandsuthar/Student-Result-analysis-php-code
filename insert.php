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

<html>
<style type = "text/css">
body{background-image :url(bag.jpg);}
</style>
<?php 
if(!isset($_SESSION['userid'])&&!isset($_SESSION['password']))
{ ?>
<CENTER>
<H1><font color="red">YOU DONT HAVE ACCESS TO THIS PAGE.........................SORRY</font></H1>
</CENTER>
<?php }
else
{
$db1=$_SESSION['db1'];
$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);

$sql6= "SELECT * FROM exname";
$result6=mysql_query($sql6, $db_link);

 $num=mysql_num_rows($result6);

$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);

$sql9= "SELECT * FROM dtname";
$result9=mysql_query($sql9, $db_link);

 $num1=mysql_num_rows($result9);
$db_link = mysql_connect("localhost","root", "");
mysql_select_db('$db1',$db_link);

$sqlsubjects= "SELECT * FROM subjects";
$resultsubjects=mysql_query($sqlsubjects, $db_link);

 $numsubjects=mysql_num_rows($resultsubjects);

?>




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
		
<form id="form" name="form" method="post" action= "in1.php" > 
			  		    
       <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
            <tr>
              <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">Enter The Details</font> </p>
                </td>
            </tr>
           
            <tr>
              

                <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
                 
                        <tr>
                          <td height="355"><table width="95%" border="0" cellspacing="2" cellpadding="2">
  
                                <select name="ex">
                               <?php 
                                 
		for($i=$num;$i>=1;$i--) $row = mysql_fetch_array($result6, MYSQL_ASSOC) ?>
		
		 	<option value= <?php echo $row['exam'];?>><?php echo $row['exam'];?></option>
		
		 
		
 </select>
<select name="menu">
                               <?php 
                                 
		for($i=$num1;$i>=1;$i--) $row = mysql_fetch_array($result9, MYSQL_ASSOC) ?>
		
		 	<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>
		
		 
		
 </select>


                            <tr>
                              
       


                     <table border="border">






<tr>      
<th>ID
</th><?php 
for($i=$numsubjects;$i>=1;$i--)$row = mysql_fetch_array($resultsubjects, MYSQL_ASSOC) ?>
<th><?php echo $row['s1']; ?>
</th>
<th><?php echo $row['s2']; ?>
</th>
<th><?php echo $row['s3']; ?>
</th>
<th><?php echo $row['s4']; ?>
</th>
<th><?php echo $row['s5']; ?>
</th>
    
</tr>            
           
    
    <tr>  <td><input name="id" type="text" class="menu" id="name" maxlength="255" /></td>

                           
                              <td><input name="sub1" type="text" class="menu" id="name" maxlength="255" /></td>

                           
                              <td><input name="sub2" type="text" class="menu" id="name" maxlength="255" /></td>

                            
                              <td><input name="sub3" type="text" class="menu" id="name" maxlength="255" /></td>

                          

                              <td><input name="sub4" type="text" class="menu" id="name" maxlength="255" /></td>

                            <td><input name="sub5" type="text" class="menu" id="name" maxlength="255" /></td>

</tr>

  
</table>


  
        <br />
                            <p>
                              <label><br><br>
                               <input name="next" type="submit" class="menu" value="NEXT" />
                              </label>
                              <label>
                            <a href="exit.php"><input type="button" name="id" value="FINISH"></a>
                              </label><br>

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
<?php
}
?>
</html>

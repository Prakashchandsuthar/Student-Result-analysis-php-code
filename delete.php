<?php
session_start();
?>
<!DOCTYPE html PUBLIC ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome Administrator</title>
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
$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$sql= "SELECT * FROM dtname";
$result=mysql_query($sql, $db_link);

 $num=mysql_num_rows($result);

if(!isset($_SESSION['userid'])&&!isset($_SESSION['password']))
{ ?>
<CENTER>
<H1><font color="red">YOU DONT HAVE ACCESS TO THIS PAGE.........................SORRY</font></H1>
</CENTER>
<?php }
else
{
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
</table>
</center>
<hr />
<hr/>




<div align="center"></div>
<table width="754" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  bgcolor="purple" width="750" height="18" align="center" valign="top" class="yellow"><span class="gray"></td>
  </tr>
<form id="form" name="form" method="post" action= "del1.php" >
  <tr class="white">
    <td align="left" valign="top" class="white"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="4%" valign="top">&nbsp;</td>
        <td width="96%" align="left" valign="top">
    <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">

                </td>
            </tr>
 
          <tr>
              
     <table width="95%" border="0" cellpadding="4" cellspacing="15" class="text_black">
 
	 <tr>
                  Choose The Database :<select name="menu">
                               <?php 
                                 
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
		<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>
		<?php } ?>
</select>

               
       
  <p>
                              <label><br>
                                <input name="next" type="submit" class="menu" value="NEXT" />
                              </label>
</p>
 
            
                          
                            </table>
                 
  
</body>
<?php
}
?>
</html>				    













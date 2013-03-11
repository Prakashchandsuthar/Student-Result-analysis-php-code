
<!DOCTYPE html PUBLIC ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Choose The Report</title>
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
<form id="form" name="form" method="post" action= "subreport.php" >


  <tr class="white">
    <td align="left" valign="top" class="white"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="4%" valign="top">&nbsp;</td>
        <td width="96%" align="left" valign="top">
    <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
  <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">Enter The Details</font> </p>
                </td>
            </tr>
 
          <tr>
              
  <center>   <table width="95%" border="0" cellpadding="4" cellspacing="15" class="text_black">
 
	 <tr>
                  Choose The Database :<select name="menu">
                               <?php 
                                 
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
		<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>
		<?php } ?>
</select>

		               
       
  <p>
                              <label><br>
                                <input name="subreport" type="submit" class="menu" value="SUBJECT REPORT" />
                              </label>
</p>
</form>


  
                          
                           <tr>
     



            
  <?php
$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$sql2= "SELECT * FROM dtname";
$result2=mysql_query($sql2, $db_link);

 $num=mysql_num_rows($result2);


?>


<div align="center"></div>
<table width="754" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  bgcolor="purple" width="750" height="18" align="center" valign="top" class="yellow"><span class="gray"></td>
  </tr>
<form id="form" name="form" method="post" action= "studentreport.php" >
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
                                 
		while($row = mysql_fetch_array($result2, MYSQL_ASSOC)) { ?>
		<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>
		<?php } ?>
</select>

               
                    
                            </table>
                 
  <p>
                              <label><br>
                                <input name="studentreport" type="submit" class="menu" value="STUDENT REPORT" />
                              </label>
</p>
</form>




  <?php
$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$sql= "SELECT * FROM dtname";
$result=mysql_query($sql, $db_link);

 $num=mysql_num_rows($result);


?>


<div align="center"></div>
<table width="754" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  bgcolor="purple" width="750" height="18" align="center" valign="top" class="yellow"><span class="gray"></td>
  </tr>
<form id="form" name="form" method="post" action= "overallreport.php" >


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
                                <input name="overallreport" type="submit" class="menu" value="OVERALL REPORT" />
                              </label>
</p>
</form>

</tr>
  
                   

<div align="center"></div>
<table width="754" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  bgcolor="purple" width="750" height="18" align="center" valign="top" class="yellow"><span class="gray"></td>
  </tr>
<form id="form" name="form" method="post" action= "subreport.php" >


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
 
	

	<p>
                              <label><br>
                               <a href="logon.php"><input name="finish" type="button" class="menu" value="FINISH" /></a>
                              </label>
</p>	               
       
  
</form>

</tr>       
                            </table></center>





</body>

</html>				    













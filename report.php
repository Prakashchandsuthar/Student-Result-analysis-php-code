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
$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$sql= "SELECT * FROM dtname";

$result=mysql_query($sql, $db_link);
$num=mysql_num_rows($result);
echo"$result";
echo"$num";
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
		
<form id="form" name="form" method="post" action= "report2.php" > 
			  		    
       <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
            <tr>
              <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">Enter The Details</font> </p>
                </td>
            </tr>
           
            <tr>
              
                <table width="95%" border="0" align="center" cellpadding="2" cellspacing="5" class="text_black">
                 
                        <tr>
                          <td height="250"><table width="50%" align="center" border="0" cellspacing="5" cellpadding="2">
                            <tr>          
                              <td>Choose Database</td>
                              <td><label>
                                <select name="dbase">
		<?php
		for($i=0;$i<$num;$i++) 
		 $row = mysql_fetch_array($result, MYSQL_ASSOC) ;
		                        if($i==2){?>          
		<option value=<?php echo $row['name'];?> selected="selected"><?php echo $row['name'];?></option>
		<?php}else
		{?>
		<option value=<?php echo $row['name']; ?>><?php echo $row['name']; ?></option>
		<?php
		}	
		?>


 </select>
		</label>

		</td>
                                   
                            <br><br><br> 
                            </tr>
                            <p>
                            

                            </p>
                        </tr>
     
              
				    
			
                   </td>
        </tr>
             
            </table>  <label>
                           <center>    <br><br><br><br><br><br> <input name="next" type="submit" class="menu" value="NEXT" /></center>
                              </label>        
    </td></tr>  </form>
</table>      </td>
  </tr>
  <tr class="black">
    <td align="center" valign="top" class="text_white"> </td>
  </tr>
</table>
</body>
</html>
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
$db1=$_POST["db1"];
$exm1=$_POST["exm"];
$_SESSION['dbname']="$db1";
$_SESSION['exm']="$exm1"
/*$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$sql= "SELECT * FROM dtname";
$result=mysql_query($sql, $db_link);
$num=mysql_num_rows($result);
*/?>
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
		
<form id="form" name="form1" method="post" action= "subrep.php" > 
			  		    
       <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
            <tr>
              <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">Choose Following Report</font> </p>
                </td>
            </tr>
           
            <tr>
              
                <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
                 
                        <tr>
                          <td height="355"><table width="95%" border="0" cellspacing="2" cellpadding="2">
                            <p>
                              <label><br><br>
                                <input name="subrep" type="submit" class="menu" value="SUBJECT REPORT" />
                              </label>

                            </p>
                        </tr>
    
                </form>
<form id="form" name="form2" method="post" action= "sturep.php" > 
			  		    
       <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">   
            <tr>
              
                <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
                 
                        <tr>
                          <td height="355"><table width="95%" border="0" cellspacing="2" cellpadding="2">
                            <p>
                              <label><br><br>
                                <input name="sturep" type="submit" class="menu" value="STUDENT REPORT" />
                              </label>

                            </p>
                        </tr>
    
                </form>
         </td>
        </tr>
            
            </table>          
    </td></tr>
</table> 
	<form id="form" name="form3" method="post" action= "" > 
			  		    
       <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">   
            <tr>
              
                <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
                 
                        <tr>
                          <td height="355"><table width="95%" border="0" cellspacing="2" cellpadding="2">
                            <p>
                              <label><br><br>
                                <input name="ovrep" type="submit" class="menu" value="OVERALL REPORT" />
                              </label>

                            </p>
                        </tr>
    
                </form>			    
         </td>
        </tr>
            
            </table>          
    </td></tr>
</table> 			
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

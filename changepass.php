<?php
session_start();
?>
<!DOCTYPE html PUBLIC ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change password</title>
<link href="fonts.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
table.menu {
	font-size:100%;
	position:absolute;
	visibility:hidden;
	width: 177px;
	background-color:#E5E5E5;
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



<link href="../fonts.css" rel="stylesheet" type="text/css" />
</head>


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
<?php
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
<div align="center"></div>
<table width="754" border="0" align="center" cellpadding="0" cellspacing="2">
  <tr>
    <td width="750" height="18" align="center" valign="top" class="yellow"><span class="yellow"></td>
  </tr>
   <tr class="white">
    <td align="left" valign="top" class="white"><table width="99%" border="0" align="center" cellpadding="5" cellspacing="0">
           <td width="4%" valign="top">&nbsp;</td>
        <td width="96%" align="left" valign="top"><table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
          <tr class="yellow">
            <td bgcolor="purple"><p class="text_black_huge"><font color="white">FILL THE FOLLOWING FIELD</p>
           
          </tr>
          <tr>
            <td><form id="form1" name="form1" method="post" action="changepassconf.php">
              <label><br>OLD PASSWORD
                 <input name="oldpass" type="password" class="menu" id="oldpass" size="25" maxlength="255" />
                </label>
              <p>
                <label><br>NEW PASSWORD
                <input name="newpass" type="password" class="menu" id="newpass" size="25" maxlength="255" />
                </label>
              </p>
              <p>
                <label><br>
                <input name="Submit" type="submit" class="menu" value="CHANGE" />
                </label>
                <label>
                <input name="Submit2" type="reset" class="menu" value="Reset" />
                 </label><br><br>
               <a href="logon.php"><b><font size="3"><center>Go back</center></font></b></a>

              </p>
            </form>
            </td>
          </tr>
          
        </table>          
          <p align="justify" class="text_black_huge">&nbsp;</p>
          </td>
      </tr>
    </table>      </td>
  </tr>
  <tr class="black">
    <td align="center" valign="top" class="text_white">&nbsp;</td>
  </tr>
</table>
</body>
<?php
}
?>
</html>

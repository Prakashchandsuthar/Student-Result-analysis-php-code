




<!DOCTYPE html PUBLIC ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Result</title>
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


$dtbase=$_POST["dtbase"];
$exam=$_POST["exn"];

$conn = mysql_connect("localhost","root", "");
mysql_select_db($dtbase,$conn);

$sqlname="SELECT * from passstud"."_"."$exam ORDER BY total DESC";
$resultname=mysql_query($sqlname, $conn);
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
		
<form id="form" name="form" method="post" action= "" > 
			  		    
       <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
            <tr>
              <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">Report For <?php echo"$exam";?></font> </p>
                </td>
            </tr>
           
            <tr>
              

                <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
                 
 
			
                    <tr>
                              
       <br><br>


                     <table border="border" width="600" cellspacing="2" cellpadding="5">


		 
		<tr>
			<td><h3><?php echo"RANK"; ?></h3> </td>
                                                     <td><h3><?php echo"ID"; ?></h3> </td>
	
                                                     <td><h3><?php echo"Total";?></h3></td>
                                                      <td><h3><?php echo"Percentage";?></h3></td>

		 </tr>          
                                
		<?php $i=1;
		 while($row = mysql_fetch_array($resultname, MYSQL_ASSOC)) { ?>
	                      <tr>     
                                                    <td><h3><?php echo"$i"; $i++; ?></h3></td> 
                                                          
                                                  <td><h3><?php echo $row['id']; ?></h3></td> 
		 	<td><h3><?php echo $row['total']; ?></h3></td>
                                                    <td><h3><?php echo $row['percent']; ?></h3></td> 
                                          </tr>
                                       <?php } ?>
   
		
    

  
</table>
<br>

              





  
        <br />
                            <p>
                            
                               
                              <label>
                            <a href="index.php"><input type="button" name="id" value="FINISH"></a>
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

</html>





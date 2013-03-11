


<!DOCTYPE html PUBLIC ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Choose The Subject</title>
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
if(is_resource($conn))
$sqlname="SELECT * from examnames WHERE  name= '$exam'";
$resultname=mysql_query($sqlname, $conn);
$sqlrl="SELECT * from $exam";
$resultrl=mysql_query($sqlrl, $conn);



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
		
<form id="form" name="form" method="post" action= "up3.php" > 
			  		    
       <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
            <tr>
              <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">Result For <?php echo"$exam";?></font> </p>
                </td>
            </tr>
           
            <tr>
              

                <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
                 
                     <table border="border" width="600">
            <select name="database">
           <option value=<?php echo"$dtbase";?>><?php echo"$dtbase";?></option>
          </select>
       <table border="border" width="600">
            <select name="exmn">
           <option value=<?php echo"$exam";?>><?php echo"$exam";?></option>
          </select>

              <br>
<br>
   Choose The ID :<select name="rollno">
                               <?php 
                                 
		while($row = mysql_fetch_array($resultrl, MYSQL_ASSOC)) { ?>
		
<option value= <?php echo $row['id'];?>><?php echo $row['id'];?></option>
<?php } ?>

</select>


               <br>
<br>
   Choose The Subject :<select name="subname">
                               <?php 
                                 
		$row = mysql_fetch_array($resultname, MYSQL_ASSOC) ?>
		
<option value= <?php echo $row['s1'];?>><?php echo $row['s1'];?></option>
<option value= <?php echo $row['s2'];?>><?php echo $row['s2'];?></option>
<option value= <?php echo $row['s3'];?>><?php echo $row['s3'];?></option>
<option value= <?php echo $row['s4'];?>><?php echo $row['s4'];?></option>
<option value= <?php echo $row['s5'];?>><?php echo $row['s5'];?></option>
		

</select>



			
		 </tr>
		         
           
    <tr>
   Enter marks: <input type="text" name="marks">
</tr>   
  
</table>
<br>

              







  
        <br />
                            <p>
                            
                               
                              <label>
                            <input type="submit" name="id" value="UPDATE">
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





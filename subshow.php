


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
$database=$_POST["database"];
$exmn=$_POST["exmn"];
$subname=$_POST["subname"];
$conn = mysql_connect("localhost","root", "");
mysql_select_db($database,$conn);

$sqlname="SELECT * from examnames WHERE  name= '$exmn'";
$resultname=mysql_query($sqlname, $conn);

$conn = mysql_connect("localhost","root", "");
mysql_select_db($database,$conn);

$sqlqa="SELECT * from $exmn"; 

$resultqa=mysql_query($sqlqa, $conn);
$num=mysql_num_rows($resultqa);

$sqlmarks="SELECT maxmarks,passmarks from examnames WHERE name= '$exmn'";
$resultmarks=mysql_query($sqlmarks, $conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db($database,$conn);
$sql12= "DROP TABLE del";
$resultdb=mysql_query($sql12, $conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$sql23="DROP TABLE del";
$result23=mysql_query($sql23, $conn);


function avg($n,$m)
{
$a=($n/$m)*100;
return $a;

}
		
			
                                                     
class checkpass
{
public static $count=0;
 function check($m1,$pm)
{

if($m1<$pm)
{
$f="F";
echo"F";
return $f;
}
else
{
$f="P";
echo"P";
return $f;
//$this->count++;

}
}
}
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
              <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">Result For <?php echo"$subname";?></font> </p>
                </td>
            </tr>
           
            <tr>
              

                <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
               <tr>
                              
       <br><br>


                     <table border="border" width="300">

 <?php 
     $row = mysql_fetch_array($resultmarks, MYSQL_ASSOC); ?>
                                      <?php $mm= $row['maxmarks'];?>
                                                   <?php $pm= $row['passmarks'];?>
		
		<tr>
			<td><h4><?php echo"ID"; ?></h4></td>
			<td><h4><?php echo"$subname"; ?></h4></td>
		                 <td><h4><?php echo"Result";?></h4></td>
                                
		<?php $count=0;$var=0;
		 while($row = mysql_fetch_array($resultqa, MYSQL_ASSOC)) { ?>
		 <tr>
		 	<td> <?php echo $row['id']; ?> </td>

			<td> <?php echo $row[$subname]; ?> </td>
                                                                 <?php $m1=$row[$subname];?>          
                                                     <?php $ch=new checkpass();?>
                                                      <td><?php $p=$ch->check($m1,$pm);?></td>
                                                  <?php
                                                       if($p=="P")
                                                        {
                                                          $count++;  
                                                       if($m1>$var)
                                                        {
                                                        $var=$m1;
                                                       }
                                                     }
                                                    } ?>
                                                       

		                  </tr>
		                  </tr>            
           
   
                                                        

			
  
</table>


            

                  <h4> No Of Student Appeard: <?php echo"$num";?></h4> 
                     <h4> No Of Student Passed:<?php echo"$count";?></h4>
                                <h4>Passing %=<?php echo avg($count,$num); ?></h4>
  <?php
$conn = mysql_connect("localhost","root", "");
mysql_select_db($database,$conn);
$sqla="SELECT * from $exmn "; 
$resulta=mysql_query($sqla, $conn);
$num=mysql_num_rows($resultqa);
                      


                                while($row = mysql_fetch_array($resulta, MYSQL_ASSOC)) { ?>
		 
		 	<?php $sid= $row['id']; ?> 
 			<?php $sb= $row[$subname]; ?> 
                                                       <?php if($var==$sb)
                                                        {
                                                          echo"TOPPER ID =$sid"; ?>
                                                           <br>
                                                         <?php 
                                                          echo"MARKS=$sb";
                                                         }                   
		              	 }?>

                            <p>
                            
                               
                              <label>
                            <a href="reportr.php"><input type="button" name="id" value="FINISH"></a>
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





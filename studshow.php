




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


$dtbase=$_POST["dtbase"];
$exam=$_POST["exn"];
$reportid=$_POST["reportid"];

$conn = mysql_connect("localhost","root", "");
mysql_select_db($dtbase,$conn);
if(is_resource($conn))
$sqlname="SELECT * from examnames WHERE  name= '$exam'";
$resultname=mysql_query($sqlname, $conn);

$conn = mysql_connect("localhost","root", "");
mysql_select_db($dtbase,$conn);
$sqlqa="SELECT * from $exam WHERE id= '$reportid'";
$resultqa=mysql_query($sqlqa, $conn);

$sqlmarks="SELECT maxmarks,passmarks from examnames WHERE name= '$exam'";
$resultmarks=mysql_query($sqlmarks, $conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db($dtbase,$conn);
$sql12= "DROP TABLE del";
$resultdb=mysql_query($sql12, $conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$sql23="DROP TABLE del";
$result23=mysql_query($sql23, $conn);


function per($tt,$mm)
{
$mmm=5*$mm;
$perc=($tt/$mmm)*100;
echo"Percentage= $perc";echo"%";
}


function pass($s11,$s12,$s13,$s14,$s15,$pm)
{
$count=0;
if($s11<$pm)
{

$count++;
}
if($s12<$pm)
{
$count++;
}
if($s13<$pm)
{
$count++;
}
if($s14<$pm)
{
$count++;
}
if($s15<$pm)
{
$count++;
}

 echo"failed subjects=$count";

}


function total($m1,$m2,$m3,$m4,$m5)
{
$sum=0;
$sum=$sum+$m1;
$sum=$sum+$m2;
$sum=$sum+$m3;
$sum=$sum+$m4;
$sum=$sum+$m5;
return $sum;

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
              <td bgcolor="purple"><p class="text_black_huge"><font size="5" font color="white">ID=<?php echo"$reportid"; ?></font> </p>
                </td>
            </tr>
           
            <tr>
              

                <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">
                 
           


                            <tr>
                              
       <br><br>


                     <table border="border" width="600">

   <?php 
		 $row = mysql_fetch_array($resultname, MYSQL_ASSOC) ?>
		<tr>
			
			<td> <?php echo $row['s1']; ?> </td>
                                                                   <?php $s11= $row['s1']; ?>
			<td> <?php echo $row['s2']; ?> </td>
<?php $s12= $row['s2']; ?>
			<td> <?php echo $row['s3']; ?> </td>
<?php $s13= $row['s3']; ?>
			<td> <?php echo $row['s4']; ?> </td>
<?php $s14= $row['s4']; ?>
			<td> <?php echo $row['s5']; ?> </td>
<?php $s15= $row['s5']; ?>
		 </tr>
                                
		<?php 
		 $row = mysql_fetch_array($resultqa, MYSQL_ASSOC)  ?>
		 <tr>
		 	
			<td> <?php echo $row[$s11]; ?> </td>
                                                                     <?php $m1=$row[$s11]; ?>
			<td> <?php echo $row[$s12]; ?> </td>
                                                                   <?php $m2=$row[$s12]; ?>
			<td> <?php echo $row[$s13]; ?> </td>
                                                                <?php $m3=$row[$s13]; ?>
			<td> <?php echo $row[$s14]; ?> </td>
                                                             <?php $m4=$row[$s14]; ?>
			<td> <?php echo $row[$s15]; ?> </td>
                                                              <?php $m5=$row[$s15]; ?>
			
		 </tr>
		</tr>            
           
    
    

  
</table>


  <?php 
		 $row = mysql_fetch_array($resultmarks, MYSQL_ASSOC) ?>
		
			<?php $mm= $row['maxmarks'];  ?>
                                                        
                                                      <?php $pm= $row['passmarks']; ?>
			

	
<?php pass($m1,$m2,$m3,$m4,$m5,$pm); ?>
<br>
<?php $tt=total($m1,$m2,$m3,$m4,$m5);?>
 <?php echo"Total= $tt";?><br>
 <?php per($tt,$mm);?>                                        








  
        <br />
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





<html>
<?php
$conn = mysql_connect("localhost","root", "");
mysql_select_db($result_analysis,$conn);
$sql= "select * from del";
$resultdb=mysql_query($sql, $conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db($dtname,$conn);

$sql= "DROP TABLE del";
$result=mysql_query($sql, $conn);
if(!$result)
{
echo"no such record found";

}
else
{
echo"deleted succesfully";
}?>
 <table width="95%" border="0" cellpadding="4" cellspacing="15" class="text_black">
  
 <tr>
                  <select name="dtbase">
                               <?php 
                                 
		$row = mysql_fetch_array($resultdb, MYSQL_ASSOC) ?>
		<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>
		
</select>
  
</html>





<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<p>&nbsp;</p>
<hr>
<table width="950" border="0" align="center" cellspacing="1" cellpadding="3">
  <tr> 
    <td width="85%" height="229"> 
      <form name="form2" method="post" action="viewshoppingcart.php">
        <table width="100%" border="5" align="center" cellspacing="0" cellpadding="3">
          <tr bgcolor=#cccccc> 
            <td ><center><b>Serial No.</b></center></td>
            <td ><center><b>Product ID</b></center></td>
            <td ><center><b>Title</b></center>  </td>
            <td ><center><b>Author</b></center> </td>
            <td width="200"> 
              <center><b>Description</b></center>
            </td>
            <td> 
              <center><b>Price</b></center>
            </td>
            <td> 
              <center><b>Action</b></center>
            </td>
          </tr>
          <tr> 
            <td colspan="7">&nbsp;</td>
          </tr>
<?php
$database="books";
$hostname="";
$dbusername="root";
$dbpassword="";

$connect=mysqli_connect($hostname,$dbusername,$dbpassword);
$dbselect=mysqli_select_db($database);



$serialcount=0;

$query="select productid from neworder where customerid='".$customerid."'";
$result=mysqli_query($sqlconnect,$query);
while($row=mysqli_fetch_array($result))
{
//--check for any changes to the cart.
  if (isset($$row["productid"]))
  {
   if ($$row["productid"]==1)
   {
    $deletequery="delete from neworder where productid=".$row["productid"];
    $deleteresult= mysqli_query($deletequery);
   }
  }
}


//--display detailed product listing for all products in the shopping cart.

$query="select productid from neworder where customerid='".$customerid."'";
$result=mysqli_query($sqlconnect,$query);
while($row=mysqli_fetch_array($result))
{

  $proquery="select productid,name,author,price,description from products where productid='".$row["productid"]."'";
  $proresult=mysqli_query($proquery);
  if($pro=mysqli_fetch_array($proresult))  
   {
    
    echo " <tr> ";
    echo "    <td > ";
    echo "     <center>" .  ++$serialcount . "</center>";
    echo "    </td>";
    echo "    <td><center>".$pro["productid"]."</center></td>";
    echo "    <td><center>".$pro["name"]."</center></td>";
    echo "    <td><center>".$pro["author"]."</center></td>";
    echo "    <td> ";
    echo "      <center>".$pro["description"] . "</center>";
    echo "    </td>";
    echo "    <td> ";
    echo "       <div align=\"right\"> $".$pro["price"]."</div>";
    echo "    </td>";
    echo "    <td> ";
    echo "      <center> ";
    echo "       <input type=\"checkbox\" name=\"".$pro["productid"]."\" value=\"1\">Remove ";
    echo "       <input type=\"hidden\" name=\"category\" value=\"".$category."\">";
    echo "       <input type=\"hidden\" name=\"customerid\" value=\"".$customerid."\">";
    echo "      </center>";
    echo "    </td>";
    echo " </tr>";
    $carttotal+=$pro["price"];
   }
}
echo "     <tr> ";
echo "      <td colspan=\"4\">&nbsp;</td>";
echo "      <td ><b>Total</b></td>";
echo "      <td > ";
echo "          <div align=\"right\"><b>$".$carttotal."</b></div>";
echo "      </td>";
echo "      <td>&nbsp;</td>";
echo "  </tr>";
?>
          <tr> 
            <td colspan="7" >
	        <div align="right"> 
                   <input type="submit" name="Submit" value="Make Changes">
                </div>
            </td>
          </tr>
        </table>
        </form>
      
    </td>
    <td width="15%" height="229"> 
          <p><a href="login.html">log out</a></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
<?php
    echo  " <p><a href=\"personalsettings.php?customerid=".$customerid."&category=".$category."\">Personal Settings</a></p> ";
?>      
    
<?php
 echo "<p><a href=\"mainpage.php?category=".$category."&customerid=".$customerid."\">Product catalog</a></p>";
?>      
      <p>&nbsp;</p>
    </td>
  </tr>
</table>
<?php
echo "    <center><a href=\"confirmorder.php?customerid=".$customerid."&category=".$category."\"><h2>Confirm Order</a></h2></center>";
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

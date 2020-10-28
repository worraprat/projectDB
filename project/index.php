<!-- <?php require'./connect.php'; 
session_start();
ob_start();

if(!isset($_SESSION['username'])){
    $username='user';
}else{
    $username=$_SESSION['username'];
}

?> -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<ul>

  <li><a class="active">Home</a></li>
  <li><a>ProductVender</a></li>
  <li><a>Scale</a></li>
  <li><a>xxxx</a></li>
  <li><a>xxxx</a></li>
  <li><c><a href="login.php">Logout</a></c></li>
  <li><b><?php echo $username  ?></b></li>
</ul>


</div>
<?php
session_start();
require'./connect.php';
$sql="SELECT sum(quantityOrdered), products.productCode , productVendor , productScale,productName,MSRP
FROM orderdetails JOIN products on products.productCode=orderdetails.productCode
GROUP BY productCode  
ORDER BY sum(quantityOrdered) DESC limit 10";
$result=mysqli_query($connect,$sql);
if(isset($_POST["add_product"])){
      if(isset($_SESSION["shopping_cart"]))
      {
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           if(!in_array($_GET["id"], $item_array_id))
           {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'               =>     $_GET["id"],
                     'item_name'               =>     $_POST["hidden_name"],
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_quantity'          =>     $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
                echo '<script>window.location="cart.php"</script>';
           }
      }
      else
      {
           $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }
if(isset($_GET['action'])){
  if($_GET['action']=="delete"){
  foreach ($_SESSION['shopping_cart'] as $key => $value) {
    if($value['item_id']==$_GET['id']){
        unset($_SESSION['shopping_cart'][$key]);
        echo '<script>alert("ลบเรียบร้อย")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
}
?>

    <br><br><div class="container" style="width:900px;">
    <?php
    echo"<center><h2>Best Saler</h2></center>";
        while($row=mysqli_fetch_array($result)){
    ?>
    <div class="col-md-6" style="position:static;">
        <form method="post" action="cart.php?action=add&id=<?php echo $row['productCode'];?>">
        <div style="border:1px solid #127989;background-color: #F2F2F2;border-radius:5px;padding:15px;">
        <h4 class="text-info"style="margin-left:10px;margin-top:8px;font-size:15px;">ProductVender : <?php echo $row['productVendor'];?></h4>
          <h4 class="text-info"style="margin-left:10px;font-size:15px;">Name : <?php echo $row['productName'];?></h4>
          <h4 class="text-success"style="margin-left:10px;font-size:15px;">Price: <?php echo number_format($row['MSRP'],2);?> Baht</h4>
          <h4 class="text-info"style="margin-left:10px;font-size:15px;">Scale : <?php echo $row['productScale'];?></h4>
          <input type="hidden" name="hidden_name" value="<?php echo $row['productName'];?>"/>
        </div>
        </form><br>
    </div>
    <?php
        }
    ?>

</body>
</html>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the side navigation */
.sidenav {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #686868;
  overflow-x: hidden;
  font-size:10.5px;
  margin-top:46.5px
}


/* Side navigation links */
.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.sidenav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the content */
.content {
  padding-left:30px;
  padding-top:60px;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  width: 100%;
  
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  float: left;
  
}

li a:hover:not(.active) {
  background-color: #111;
}

li b {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  float: right;
  
}
li c {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  float: right;
  
}

li c:hover:not(.active) {
  background-color: #A43733;
}


.active {
  background-color: #289E96;
}
</style>



<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>first page</h1>
    <?php /*  $random=rand(100,200); 
    echo $random;//var_dump($username);
    echo "welcome ".$_SESSION['username'];
    $username=$_SESSION['username'];
    $showpointsql="select point from users where username='$username' ";
    $result=mysqli_query($connect,$showpointsql); $showpoint=mysqli_fetch_array($result);
    echo "<br>point =".$showpoint[0]."<br>"; 
    //unset($_SESSION['username']);
    */?>
    <a href="profile.php">profile</a><br>
    <a href="cart.php">cart</a>
    <a href="login.php">log out</a>
</body>
</html> -->
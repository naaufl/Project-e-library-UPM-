<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['lectlogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$brw=$_POST['brw'];
$status=$_POST['status'];
$bookid=intval($_GET['bookid']);
$sql="update  tblbook set  Borrowers=:brw, Availability=:status where id=:bookid";
$query = $dbh->prepare($sql);
$query->bindParam(':brw',$brw,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Book updated successfully";
header('location:listbook.php');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Asking for Borrow</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
 
<div class="panel-body">
<form role="form" method="post">
<?php 
$bookid=intval($_GET['bookid']);
$sql="SELECT * from tblbook where id=:bookid";
$query=$dbh->prepare($sql);
$query-> bindParam(':bookid',$bookid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               
  ?> 
<div >
<label>Title</label><br>
<?php echo htmlentities($result->Title);?>
</div>

<div >
<label>Location</label><br>
<?php echo htmlentities($result->Location);?>
</div>
<label>Name <span style="color:red;">*</span></label>
<input class="form-control" type="text" name="brw" value="<?php echo htmlentities($result->Borrowers);?>"  />
</div>
<div class="form-group">
<label>Status ( select unavailable to book )</label>
<?php if($result->Availability==1) {?>
 <div class="radio">
 <div class="radio">
<label>
<input type="radio" name="status" id="status" value="1" checked="checked">Return
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="status" id="status" value="0">Borrow
</label>
</div>
<?php } else { ?>
<div class="radio">
<label>
<input type="radio" name="status" id="status" value="0" checked="checked">Borrow
</label>
</div>
 <div class="radio">
<label>
<input type="radio" name="status" id="status" value="1">Return
</label>
</div>
<?php } ?>
</div>
<?php }} ?>



<button type="submit" name="update" class="btn btn-info">Borrow </button>



                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

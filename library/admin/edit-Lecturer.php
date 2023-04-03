<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$Lectid=intval($_GET['Lectid']);
$lecturer=$_POST['lecturer'];
$username=$_POST['username'];
$mobnum=$_POST['mobnum'];
$sql="update  tbllecturers set FullName=:lecturer, UserName=:username, MobileNumber=:mobnum where id=:Lectid";
$query = $dbh->prepare($sql);
$query->bindParam(':lecturer',$lecturer,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':Lectid',$Lectid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Lecturer info updated successfully";
header('location:manage-Lecturer.php');



}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="lecturer" content="" />
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
                <h4 class="header-line">Edit Lecturer</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Lecturer Info
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Lecturer Name</label>
<?php 
$Lectid=intval($_GET['Lectid']);
$sql = "SELECT * from  tbllecturers where id=:Lectid";
$query = $dbh -> prepare($sql);
$query->bindParam(':Lectid',$Lectid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>   
<div class="form-group">
<input class="form-control" type="text" name="lecturer" value="<?php echo htmlentities($result->FullName);?>" required />
</div>

<div class="form-group">
<label>UserName</label>
<input class="form-control" type="text" name="username" value="<?php echo htmlentities($result->UserName);?>" required />
</div>

<div class="form-group">
<label>Mobile Number</label>
<input class="form-control" type="text" name="mobnum" value="<?php echo htmlentities($result->MobileNumber);?>" required />
</div>
<?php }} ?>
</div>

<div class="form-group">
<button type="submit" name="update" class="btn btn-info">Update </button>
</div>
                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
    <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
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
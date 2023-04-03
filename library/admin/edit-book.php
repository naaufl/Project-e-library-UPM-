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
$title=$_POST['title'];
$lecturer=$_POST['lecturer'];
$location=$_POST['location'];
$borrowers=$_POST['borrowers'];
$bookid=intval($_GET['bookid']);
$sql="update tblbook set Title=:title, LecturesID=:lecturer, Location=:location, Borrowers=:borrowers, where id=:bookid";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':lecturer',$lecturer,PDO::PARAM_STR);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':borrowers',$borrowers,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$_SESSION['msg']="Book info updated successfully";
header('location:manage-books.php');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>UPM E-Library</title>
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
                <h4 class="header-line">Edit Book</h4>
                
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
$sql = "SELECT tblbook.Title, tbllecturers.FullName, tblbook.location, tblbook.Borrowers, tbllecturers.id as lectid, tblbook.id as bookid from  tblbook  join tbllecturers on tbllecturers.id=tblbook.LecturesID where tblbook.id=:bookid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="form-group">
<label>Title<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="title" value="<?php echo htmlentities($result->Title);?>" required />
</div>



<div class="form-group">
<label> LecturerName<span style="color:red;">*</span></label>
<select class="form-control" name="lecturer" required="required">
<option value="<?php echo htmlentities($result->lectid);?>"> <?php echo htmlentities($lectname=$result->FullName);?></option>
<?php 
$sql1 = "SELECT * from  tbllecturers ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$result1=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($result1 as $ret)
{           
if($lectname==$ret->FullName)
{
continue;
} else{

    ?>  
<option value="<?php echo htmlentities($ret->id);?>"><?php echo htmlentities($ret->FullName);?></option>
 <?php }}} ?> 
</select>
</div>

<div class="form-group">
<label>Location<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="location" value="<?php echo htmlentities($result->Location);?>"  />
</div>

<div class="form-group">
<label>Borrowers<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="borrowers" value="<?php echo htmlentities($result->Borrowers);?>"  required="required" />
</div>


 <?php }} ?>
<button type="submit" name="update" class="btn btn-info">Update </button>

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

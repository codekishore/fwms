<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
 header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['pgasaid'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];

 $query=mysqli_query($con,"update tblpages set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");

    if ($query) {
    $msg="About Us has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }  
}
  ?>
<!DOCTYPE html>
<head>
<title>Food Waste Management System|| About US  </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="css/bootstrap.min.css" >
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery2.0.3.min.js"></script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>
<section id="container">
<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update About us
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

   
                                <form class="cmxform form-horizontal " method="post" action="">
                                    <?php
 
$ret=mysqli_query($con,"select * from  tblpages where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                    <div class="form-group ">
                                        <label for="adminname" class="control-label col-lg-3">Page Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="pagetitle" name="pagetitle" type="text" required="true" value="<?php  echo $row['PageTitle'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="adminname" class="control-label col-lg-3">Page Description
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class=" form-control" id="pagedes" name="pagedes" type="text" required="true" value=""><?php  echo $row['PageDescription'];?></textarea>
                                        </div>
                                    </div>
                                    <?php } ?>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">Update</button></p>
                                           
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
    
        </div>
</section>
		  <?php include_once('includes/footer.php');?>    
</section>
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php }  ?>
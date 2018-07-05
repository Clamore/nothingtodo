<?php
session_start();
require("../inc/header-blog.php");
require("inc/connect.php");

if (isset($_POST["submit"]))
{
	$id = $_POST["hdnid"];
	$title = $_POST["title"];
	$detail = $_POST["detail"];
	$datetime = date("Y-m-d H:i:s");
	$file = array();
	/*$user = $_SESSION["user"];*/
	$file = explode(".",$_FILES["file"]["name"]);
	$filename = $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$filename);

	$sql = "UPDATE tbblog SET title = '$title' ,detail = '$detail' ,img = '$filename' ,datein = '$datetime'  WHERE id = '$id' ";
	$query = mysqli_query($conn,$sql);


	if ($query)
	{
		echo "<script>alert('แก้ไขเรียบร้อย');window.location='admin.php';</script>";
	}
}

$id = $_GET["id"];
$sql = "SELECT * FROM tbblog WHERE id='$id' ";
$query = mysqli_query($conn,$sql);
$rec = mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
<script src="js/sample.js"></script>

<form method="post" action="" enctype="multipart/form-data">

	<section class="bg-light" id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">แก้ไขบทความ</h2>
				<!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
			</div><!-- col-lg-12 text-center -->
		</div><!-- row -->

        <div class="row">
          <div class="col-lg-12 text-center">
			<table style="width:100%">
				<tr>
					<td>
						<input type="hidden" name="hdnid" value="<?php echo $rec["id"]?>">
						<input type="text" name="title" value="<?php echo $rec["title"]?>" class="form-control" placeholder="ระบุหัวเรื่อง">
					</td>
				</tr>
				<tr>
					<td style="background-color:#838383">&nbsp;</td>
				</tr>
				<tr>
					<td><textarea class="ckeditor" name="detail" style="height:100%;"><?php echo $rec["detail"]?></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><input type="file" name="file"></td>
				</tr>
			</table>	 
		  </div>
        </div><!-- row -->

		<br>
		
		<div class="row">
          <div class="col-lg-12 text-center">
			<input type="submit" name="submit" value="บันทึก" class="btn btn-info">
		  </div>
        </div><!-- row -->
	</div><!-- container -->
</section><!-- portfolio -->

</form>

<?php
 require("../inc/footer.php");
 ?>
<?php
session_start();
require("../inc/header-blog.php");
require("inc/connect.php");

if (isset($_POST["submit"]))
{
	$title = $_POST["title"];
	$detail = $_POST["detail"];
	$datetime = date("Y-m-d H:i:s");
	$user = $_SESSION["user"];
	//$file = explode(".",$_FILES["file"]["name"]);
	$filename = $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);
	$sql = "SELECT MAX(id) AS id FROM tbblog";
	$query = mysqli_query($conn,$sql);
	$rec = mysqli_fetch_array($query,MYSQLI_ASSOC);
	$max = $rec["id"]+1;
		
	$sql = "INSERT INTO tbblog VALUES('$max','$title','$detail','$file','$datetime','$user')";
	$query = mysqli_query($conn,$sql);

	if ($query)
	{
		echo "<script>alert('บันทึกเรียบร้อย');window.location='admin.php';</script>";
	}
}
?>

<style>
	.href{
		color:#003399;
	}
	.href2{
		color:#003399;
	}
	.contact{
		color:#ffffff;
	}
</style>

<script type="text/javascript">
<!--
	function fileupload()
	{
		window.open('fileupload.php','fileupload','width=700,height=500,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
//-->
</script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
<script src="js/sample.js"></script>

<form method="post" action="" enctype="multipart/form-data">

	<section class="bg-light" id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">เพิ่มบทความ</h2>
				<!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
			</div><!-- col-lg-12 text-center -->
		</div><!-- row -->

        <div class="row">
          <div class="col-lg-12 text-center">
			<table style="width:100%">
				<tr>
					<td><input type="text" name="title" class="form-control" placeholder="ระบุหัวเรื่อง"></td>
				</tr>
				<tr>
					<td style="background-color:#838383">&nbsp;</td>
				</tr>
				<tr>
					<td><textarea class="ckeditor" name="detail" style="height:100%;"></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td align="left"><p><a class="href2" href="Javascript:fileupload();"><strong>เอกสารแนบ</strong></a></p></td>
				</tr>
				<tr>
					<td align="left">รูปภาพ : <input type="file" name="file"></td>
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
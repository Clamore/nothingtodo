<html>
	<head>
		<meta charset="UTF-8">
		<title>เอกสารแนบ</title>
		<!-- Bootstrap core CSS -->
		<link href="../bootstrap/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="../bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
		require("inc/connect.php");
		
		$link = "";
		if (isset($_POST["submit"]))
		{
			if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],"myfile/".$_FILES["fileupload"]["name"]))
			{
				$datetime = date("Y-m-d H:i:s");
				$file = $_FILES["fileupload"]["name"];
				$max = 0;
				$sql = "SELECT MAX(fileid) AS id FROM tbfile ";
				$query = mysqli_query($conn,$sql);
				$rec = mysqli_fetch_array($query,MYSQLI_ASSOC);
				$max = $rec["id"]+1;

				$insert = "INSERT INTO tbfile VALUES('$max','".$_FILES["fileupload"]["name"]."','$datetime')";
				$query = mysqli_query($conn,$insert);
				if ($query)
				{
					echo "<script>alert('อัพโหลดเรียบร้อย');</script>";
					$link = 'http://www.itsurvive.co.th/itsurviveweb/eng/blog/myfile/'.$file;
				}
			}
			else
			{
				echo "<script>alert('ไม่สามารถอัพไฟล์ได้');window.history.back()';</script>";
			}
		}
		?>
		<form method="post" action="" enctype="multipart/form-data">
			<p>เอกสารแนบ : <input type="file" name="fileupload"></p>
			<p><input type="submit" name="submit" value="บันทึก" class="btn btn-success"></p>
		</form>

		<hr>

		<p>Link : <input type="text" name="" value="<?php echo $link?>" class="form-control"></p>
	</body>
</html>
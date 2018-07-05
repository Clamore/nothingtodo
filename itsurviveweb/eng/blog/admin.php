 <?php
 session_start();
 if ($_SESSION["user"] == "")
 {
	 echo "<script>alert('ไม่สามารถเข้าได้');window.location='login.php';</script>";
 }
 require("../inc/header-blog.php");
 require("inc/connect.php");
 error_reporting(~E_NOTICE);
 if ($_GET["chk"] <> "")
 {
	 $id = $_GET["id"];
	 $del = "DELETE FROM tbblog WHERE id = '$id' ";
	 $query = mysqli_query($conn,$del);
	 if ($query)
	{
		echo "<script>alert('ลบเรียบร้อย');window.location='admin.php';</script>";
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

<?php
$perpage = 6;
if (isset($_GET['page'])) 
{
	$page = $_GET['page'];
} 
else 
{
	$page = 1;
}

//$sql = "SELECT * FROM tbblog LIMIT {$start} , {$perpage} ";
$sql = "SELECT * FROM tbblog ";
$query = mysqli_query($conn,$sql);
//$rec = mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

<!-- ผลงาน -->
<section class="bg-light" id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">บทความ</h2>
				<!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
			</div><!-- col-lg-12 text-center -->
		</div><!-- row -->

		<div class="row">
			<div class="col-lg-12 text-center">
				<table class="table" width="100%">
					<thead>
						<tr>
							<th colspan="3"><a class="href" href="addblog.php"><img src="icon/add.png" width="3%">เพิ่มบทความ</a></th>
						</tr>
						<tr>
							<th width="80%">ชื่อบทความ</th>
							<th width="10%">แก้ไข</th>
							<th width="10%">ลบ</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
						{
						?>
						<tr>
							<td><a class="href" href="view.php?id=<?php echo $result["id"]?>"><?php echo $result["title"]?></a></td>
							<td><a class="href" href="editblog.php?id=<?php echo $result["id"]?>"><img src="icon/edit.png" width="30%" title="แก้ไข"></a></td>
							<td><a class="href" href="?chk=edit&id=<?php echo $result["id"]?>" onclick="return confirm('ยืนยันการลบ');"><img src="icon/delete.png" width="30%" title="ลบ"></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div><!-- col-lg-12 text-center -->
		</div><!-- row -->
	</div><!-- container -->
</section><!-- portfolio -->

<?php
$total_page = 0;
 /*$sql2 = "select * from products ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);*/
 ?>

<nav>
	<ul class="pagination">
		<li>
			<a href="index.php?page=1" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<?php 
		for($i=1;$i<=$total_page;$i++)
		{ 
		?>
			<li><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php 
		} 
		?>
		<li>
			<a href="index.php?page=<?php echo $total_page;?>" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</nav>

 <?php
 require("../inc/footer.php");
 ?>
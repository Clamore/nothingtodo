 <?php
 require("../inc/header-blog.php");
 require("inc/connect.php");
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
			<?php
			while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
			?>
			  <div class="col-md-4 col-sm-6 portfolio-item">
				<a class="portfolio-link href" href="view.php?id=<?php echo $result["id"]?>">
				  <div class="portfolio-hover"  style="background-color:#ccffff;">
					<div class="portfolio-hover-content">
					  <i  style="color:#ff0000;">Read More</i>
					</div>
				  </div>
				  <div class="portfolio-caption">
					  <h4><?php echo $result["title"]?></h4>
				  </div>
				</a>
			  </div>
			<?php
			}
			?>

		  <!-- <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link href" href="view.php">
              <div class="portfolio-hover"  style="background-color:#ccffff;">
                <div class="portfolio-hover-content">
                  <i  style="color:#ff0000;">Read More</i>
                </div>
              </div>
              <div class="portfolio-caption">
				  <h4>abcdefg higklmn opqrs tuvwxyz</h4>
			  </div>
            </a>
			<a href="">แก้ไข</a>
          </div>
		  

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link href" data-toggle="modal" href="#consult">
              <div class="portfolio-hover"  style="background-color:#ccffff;">
                <div class="portfolio-hover-content">
                  <i  style="color:#ff0000;">Read More</i>
                </div>
              </div>
              <div class="portfolio-caption">
				  <h4>abcdefg higklmn opqrs tuvwxyz</h4>
			  </div>
            </a>
          </div> -->
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
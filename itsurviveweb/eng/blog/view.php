<?php
require("../inc/header-blog.php");
require("inc/connect.php");

$id = $_GET["id"];
$sql = "SELECT * FROM tbblog WHERE id = '$id' ";
$query = mysqli_query($conn,$sql);
$rec = mysqli_fetch_array($query,MYSQLI_ASSOC);
$detail = $rec["detail"];
$dateime = $rec["datein"];
?>
 
<!-- เกี่ยวกับเรา -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-left">
            <h2 class="section-heading text-uppercase"><?php echo $rec["title"]?></h2>
			<h6 style="text-align:left;">Posted <?php echo $dateime?></h6>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
			<?php
			if ($rec["img"] <> "")
			{
			?>
				<p style="text-align:center;"><img src="img/<?php echo $rec["img"]?>" width="50%"></p>
			<?php
			}
			?>
			<p style="text-indent: 2.5em;font-size:18px;">
				<?php
				$detail = str_replace("\n" ,"<br>",$detail);
				$detail = str_replace("[url=","<a href=",$detail);
				$detail = str_replace("[/url","</a",$detail);
				$detail = str_replace("[","<",$detail);
				$detail = str_replace("]",">",$detail);
				$detail = str_replace("[/","</",$detail);
				echo $detail;
				?>
			</p>
          </div>
        </div>
      </div>
    </section>

 <?php
 require("../inc/footer.php");
 ?>
<?php include 'inc/header.php';?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php
			 if(!isset($_GET['id']) || $_GET['id']==NULL)
			 {
				 header("Location:404.php");
			 }else{
				 $id=$_GET['id'];
			 }

			?>
		   <?php
			   $query="select * from tbl_post where id='$id'";
			   $post=$db->select($query);
			   if($post){
				   while($result= $post->fetch_assoc()){
		 
		 ?>

				<h2><?php echo$result['title'];?></h2>
				<h4><?php echo $fm->formatDate($result['date']) ;?>, By <a href="#"><?php echo$result['author'];?></h4>
				<img src="admin/upload/<?php echo $result['image'];?>" alt="MyImage"/>
				<?php  echo $result['body'];?>
				<?php

				    $catid=$result['cat'];
				    $queryreleted="Select*from tbl_post where cat= '$catid' limit 4";
					$reletedpost=$db->select($queryreleted);
					
					if($reletedpost){
						while($rresult= $reletedpost->fetch_assoc()){
			
				?>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<a href="post.php?id=<?php echo$rresult['id'];?>">
					<img src="admin/upload/<?php echo $rresult['image'];?>" alt="post image"/></a>
				</div>

						<?php }}else{echo"No releted post Available!!";}?>
						
			  </div>
			  <?php }}else{header("Location:404.php");}?>
			 
		</div>
		<?php include 'inc/sidebar.php';?>
		<?php include 'inc/footer.php';?>
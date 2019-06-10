<?php
  $postid = $_GET['id'];
  $query = "select * from comment where `PostID` = {$postid}";
  $result = sqlSelect($query);
  if($result) {
while ($row = mysqli_fetch_array($result)) {
?>
<div class="container" float: left style="border-top:1px solid; padding:10px;">
  <div class="row">
<div class = "col" role="alert">
 <?=$row[3]?>
</div>
<div class="col-6" role="alert">
 <?=$row[2]?>
</div><div class="col" role="alert">
 <?=$row[4]?>
</div>
  </div>
</div>
<?php
}
  } else {
	  ?>
	  <div class="container" float: left style="border-top:1px solid; padding:10px;">
		등록된 댓글이 없습니다.
	  </div>
	  <?php
  }
?>

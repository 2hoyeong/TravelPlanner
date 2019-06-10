<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<td><form name = "form" method="post" action = "<?=ROOTPATH?>/comment/insert_comment.php">
</br>
<div style="margin-bottom : 35px;">
<textarea class="form-control" name="comment" placeholder="댓글을 입력하세요." required style="margin-bottom : 10px; resize : none;"></textarea>
<button type="submit" class="btn btn-info fr" id="reply-btn" >댓글등록</button>
<input type="hidden" name="PostID" value="<?=$_GET['id']?>"></input>
</div>
</form>
</div>
<div class="container"  style="border-bottom : 0;">
  <div class="row">
   <div class="col-sm">
      id
    </div>
    <div class="col-sm">
      content
    </div>

	<div class="col-sm">
      date
    </div>
	</div>
</div>
<?php
	include("load_comment.php");
?>

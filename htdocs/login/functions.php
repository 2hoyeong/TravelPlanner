<?php
	function id_exists($id, $db)
	{
		$row = mysqli_query($db, "SELECT id FROM accounts WHERE id = '$id'");
		{
			if (mysqli_num_rows($row) == 1)
			{
				return true;
			} else {
				return false;
			}
		}
	}
?>
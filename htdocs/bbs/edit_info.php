<?php
	include("_common.php");
	
	$category = $_GET['category'];
	$img = $_FILES['myfile']['name'];
	$error = $_FILES['myfile']['error'];
	$explain = $_POST['explain'];
	
	$editid = $_POST['editid'];
	
	if (isset($explain)) {
		$sql = "";
		
		if ($category == "city") {
			$sql = "UPDATE `place_city` SET `Explain` = '{$explain}' WHERE `CityID` = {$editid};";
		} else if ($category == "attraction") {
			$sql = "UPDATE `place_attraction` SET `Explain` = '{$explain}' WHERE `AttractionID` = {$editid};";
		}
		
		$result = $db_conn->query($sql);
			
		if (!$result) {
			alert("설명 업데이트에 오류가 발생했습니다.", "edit_{$category}_info.php?ec={$editid}");
			exit();
		}
	
	}
	
	if (isset($img)) {
		if ($category == "city") {
			$countryid = getCountryId($editid);
			$continentid = getContinentId($countryid);
			$uploads_dir = ROOTDIR."/img/area/{$continentid}/{$countryid}/{$editid}/";
		} else if ($category == "attraction") {
			$cityid = getCityId($editid);
			$countryid = getCountryId($cityid);
			$continentid = getContinentId($countryid);
			$uploads_dir = ROOTDIR."/img/area/{$continentid}/{$countryid}/{$cityid}/{$editid}/";
		}
		
		// 설정
		$allowed_ext = array('jpg','jpeg','png');

		$tmp = explode('.', $img);
		$ext = array_pop($tmp);
		 
		// 오류 확인
		if( $error != UPLOAD_ERR_OK ) {
			switch( $error ) {
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					alert("파일이 너무 큽니다. ($error)", "edit_{$category}_info.php?ec={$editid}");
					break;
				case UPLOAD_ERR_NO_FILE:
					alert("파일이 첨부되지 않았습니다. ($error)", "edit_{$category}_info.php?ec={$editid}");
					break;
				default:
					alert("파일이 제대로 업로드 되지 않았습니다.", "edit_{$category}_info.php?ec={$editid}");
			}
			exit;
		}
		 
		// 확장자 확인
		if( !in_array($ext, $allowed_ext) ) {
			alert("허용되지 않은 확장자 입니다.", "/edit_{$category}_info.php?ec={$editid}");
			exit;
		}

		if ( !is_dir($uploads_dir) ) {
			if ( !mkdir($uploads_dir) ) {
				alert("경로생성에 실패했습니다..", "edit_{$category}_info.php?ec={$editid}");
				exit();	
			}
		}
		 
		// 파일 이동
		move_uploaded_file($_FILES['myfile']['tmp_name'], "$uploads_dir/$img");
		
	}
	
	alert("설정이 완료되었습니다.", "edit_{$category}_info.php?ec={$editid}");
	
?>
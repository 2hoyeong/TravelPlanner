<style>
.area_top_name {
    width: 100%;
    height: 40px;
    padding-bottom: 6px;
    border-bottom: 1px solid #e3e3e3;
    font-weight: bold;
    font-size: 18px;
    color: #ff9320;
    padding-left: 15px;
    line-height: 40px;
}

.area_title {
    width: 100%;
    text-align: center;
    color: #555555;
    font-size: 20px;
    padding-bottom: 30px;
    font-weight: bold;
}

.area_list {
    padding-top: 10px;
    padding-bottom: 20px;
}

.area_n_link {
    display: block;
    width: 25%;
    float: left;
    color: #555555;
    font-size: 13px;
    font-weight: bold;
    padding-top: 10px;
    padding-bottom: 10px;
}


</style>

<div class="country_list_container">
	<?php
		$continents = getContinentList();
		$countries = getCountryList();
		foreach($continents as $k => $v) {
			?>
			<div class="continent">
				<div class="area_top_name as"><?=$v?></div>
					<div class="area_list as">
					<?php
						foreach($countries as $key => $value) {
							$ck = explode(",", $value);
							if ($k == $ck[0]) {
								echo "<a href='".BBSPATH."/city_list.php?country=".$key."' class='area_n_link'>".$ck[1]."</a>";
							}
						}
					?>
				</div>
			</div>
			<div class="clear"></div>
			<?php
			}
		?>
</div>
<?php

echo '
	<div class="bg_title">'.$_GET['name'].'</div>
';
if($_GET['id']){
	// $data = mysql_query('SELECT * FROM content WHERE active = 1 AND id = '.$_GET['id'].' ORDER BY sort ASC, time DESC');
	// $data_num = mysql_num_rows($data);
	
}
else if(!$_GET['id'] && $_GET['cat_id']){
	//$data = mysql_query('SELECT * FROM content WHERE active = 1 AND cat_id = '.$_GET['cat_id'].' ORDER BY sort ASC, time DESC LIMIT '.($_GET["pg"]-1)*$cfg['article_per_page'].','.$cfg['article_per_page']);
	//$data_num = mysql_num_rows($data);
}

if($data_num == 1){
	$data_detail = mysql_fetch_array($data);
	$id_data = $data_detail['id'];
	$title_data = $data_detail['title'];
	$body_data = $data_detail['long_body'];
	$instime_data = $data_detail['time'];
	$ngay_data = date($cfg["date_format"],$instime_data);
	echo '<div>
		<div class="title_top">'.$title_data.'</div>
		<div class="text">'.$body_data.'</div>
	</div>';
}
if($data_num>1){
	for($x=0; $x<$data_num;$x++){
		$id_data = mysql_result($data,$x,'id');
		$title_data = mysql_result($data,$x,'title');
		$body_data = mysql_result($data,$x,'short_body');
		$instime = mysql_result($data,$x,'time');
		$ngay = date($cfg["date_format"],$instime);
		echo '
			<div>
				
				<div class="title_top"> <a href="index.php?p=data&cat_id = '.$_GET['cat_id'].'&id='.$id_data.'&name='.$_GET['name'].'">'.$title_data.'</a></div>
				<div class="text">'.$body_data.'</div>
				<div class="clear"></div>
				<div class="img_line">&nbsp;</div>
				
			</div>
		';
	}
	echo '<div>Trang: ';
	echo show_pages('SELECT * FROM content WHERE active=1 AND cat_id="'.$_GET['cat_id'].'" ORDER BY sort ASC, time DESC',$cfg['article_per_page'],'./?p='.$_GET['p'].'&cat_id='.$_GET['cat_id']);
	echo '</div>';
}
?>
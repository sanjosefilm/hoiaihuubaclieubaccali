<?php
function query_content($table_content_cat,$parent_id,$p){
	$menu = mysql_query('SELECT * FROM '.$table_content_cat.' WHERE active = 1 AND parent_id ='.$parent_id.' ORDER BY sort ASC, time DESC');
	$menu_num = mysql_num_rows($menu);
	if($menu_num>0){
		for($x_menu = 0; $x_menu<$menu_num; $x_menu++){
			$id_menu_left = mysql_result($menu,$x_menu,"id");
			$title_menu_left = mysql_result($menu,$x_menu,"name");
			echo '<li><a href="index.php?p='.$p.'&cat_id='.$id_menu_left.'">'.$title_menu_left.'</a></li>';
		}
	}
}

function menu_sub($table_content_cat,$parent_id){
	$menu_center = mysql_query('SELECT * FROM '.$table_content_cat.' WHERE active = 1 AND parent_id='.$parent_id.' ORDER BY sort ASC, time DESC');
	$menu_center_num = mysql_num_rows($menu_center);
	if($menu_center_num>0){
		for($x = 0; $x<$menu_center_num;$x++){
			$id_menu_center = mysql_result($menu_center,$x,"id");
			$title_menu_center = mysql_result($menu_center,$x,"name");
			echo'<a href="index.php?p=data&cat_id='.$id_menu_center.'">'.$title_menu_center.'</a> |';
		}
	}
}

function list_sub($table_content,$cat_id){
	// $list = mysql_query('SELECT * FROM '.$table_content.'  WHERE active = 1 AND cat_id = '.$cat_id.' ORDER BY sort ASC, time DESC LIMIT 10');
	// $list_num = mysql_num_rows($list);
	// $cfg["date_format"]="d/m/y";
	// if($list_num>0){
	// 	for($x = 0; $x<$list_num; $x++){
	// 		$id_list = mysql_result($list,$x,"id");
	// 		$title_list = mysql_result($list,$x,"title");
	// 		$instime = mysql_result($list,$x,"time");
	// 		$date = date($cfg["date_format"],$instime);
	// 		echo '<li><a href="index.php?p=data&cat_id='.$cat_id.'&id='.$id_list.'&name='.$_GET['name'].'">'.$title_list.'</a></li>';
	// 	}
		
	// }
}

function top_list($table_content){
	$top = mysql_query('SELECT * FROM '.$table_content.' WHERE active = 1 ORDER BY sort ASC, time DESC LIMIT 10');
	$top_num = mysql_num_rows($top);
	$cfg["date_format"]="d/m/y";
	if($top_num>0){
		for($x = 0; $x<$top_num; $x++){
			$id_top = mysql_result($top,$x,"id");
			$title_top = mysql_result($top,$x,"title");
			$instime = mysql_result($top,$x,"time");
			$date = date($cfg["date_format"],$instime);
			echo '<li><a href="index.php?p=data&id='.$id_top.'">'.$title_top.'</a> </li>';
		}
	}
}

function top_content($table_content,$cat_id){
	$cfg["date_format"]="d/m/y";
	if($cat_id == 0){
		$top_content = mysql_query('SELECT * FROM '.$table_content.' WHERE active = 1 ORDER BY sort ASC, time DESC LIMIT 1');
		//$width = '250px';
		//$width_contet = '300px';
		$class = "title_top1";
	}
	else {
		// $top_content = mysql_query('SELECT * FROM '.$table_content.' WHERE active = 1 AND cat_id = '.$cat_id.' ORDER BY sort ASC, time DESC LIMIT 1'); //test
		
		//$width = '150';
		//$width_contet = '400px';
		$class = "title_top";
	}
	
	// $data = mysql_fetch_array($top_content);
	// $id_data = $data['id'];
	// $title_data = $data['title'];
	// $short_body_data = $data['short_body'];
	// $img_data = $data['file1'];
	// $instime = $data['time'];
	// $date_top = date($cfg["date_format"],$instime);
	// echo '
	// 		<div class="'.$class.'"><a href="index.php?p=data&cat_id='.$cat_id.'&id='.$id_data.'&name='.$_GET['name'].'">'.$title_data.'</a> </div>
	// 		<div class="content">'.$short_body_data.'</div>
	// 		 <div class="clear "></div>
	// ';
}



function list_cat($table_raovat_cat){
		$list_cat = mysql_query('SELECT * FROM '.$table_raovat_cat.' WHERE active=1 ORDER BY sort ASC, time DESC');
		$list_cat_num = mysql_num_rows($list_cat);
		
		if($list_cat_num>0){
			for($x_list=0; $x_list<$list_cat_num; $x_list++){
				$id_list = mysql_result($list_cat,$x_list,"id");
				$name_list = mysql_result($list_cat,$x_list,"name");
				echo '<option value="'.$id_list.'">'.$name_list.'</option>';
			}
		}
	}

function content_information($table,$content_cat_id){
		$cfg['article_per_page'] = 30;
		$content = mysql_query('SELECT * FROM '.$table.' WHERE active = 1 AND cat_id = '.$content_cat_id.' ORDER BY title ASC LIMIT '.($_GET["pg"]-1)*$cfg['article_per_page'].','.$cfg['article_per_page']);
		$content_num = mysql_num_rows($content);
		if($content_num>0){
			for($y_content = 0; $y_content<$content_num; $y_content++){
				$id_content = mysql_result($content,$y_content,"id");
				$title_content = mysql_result($content,$y_content,"title");
				$longbody_content = mysql_result($content,$y_content,"long_body");
				echo '
				<li><div>'.$title_content.'</div>
					<ul>
						<li><p>'.$longbody_content.'</p></li>
					</ul>
				</li>';
			}
		}
	}

function content_data($table,$content_id){
		$content = mysql_query('SELECT * FROM '.$table.' WHERE active = 1 AND id = '.$content_id);
		$content_data = mysql_fetch_array($content);
		$title_content = $content_data['title'];
		$body_content = $content_data['long_body'];
		$instime = $content_data['time'];
		$ngay = date($cfg["date_format"],$instime);
		echo '
			<div>'.$body_content.'('.$ngay.')</div>
		';
	
	}
function raovat_content_detail($table_content,$raovat_cat,$raovat_id){
		//$content = mysql_query('SELECT * FROM '.$table_content.' WHERE active = 1 AND cat_id = '.$raovat_cat.' AND id = '.$raovat_id.' ORDER BY sort ASC, time DESC');
		
		//$content_data = mysql_fetch_array($content);
		// $body_content = $content_data['long_body'];
		// echo '
		// 	<div>'.$body_content.'</div>
		// ';
}
	
?>
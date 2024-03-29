<?php
/*******************************************************************
 *[TTTuangou] (C)2005 - 2010 Cenwor Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename file_manager_json.php $
 *
 * @Author http://www.tttuangou.net $
 *
 * @Date 2010-07-16 11:17:03 $
 *******************************************************************/ 
 

$php_path = dirname(__FILE__) . '/';
$php_url = dirname($_SERVER['PHP_SELF']);

$root_path = $php_path . './../attached/';
$root_url = $php_url .'./../attached/';
$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');

if (empty($_GET['path'])) {
	$current_path = realpath($root_path) . '/';
	$current_url = $root_url;
	$current_dir_path = '';
	$moveup_dir_path = '';
} else {
	$current_path = realpath($root_path) . '/' . $_GET['path'];
	$current_url = $root_url . $_GET['path'];
	$current_dir_path = $_GET['path'];
	$moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
}
$order = empty($_GET['order']) ? 'name' : strtolower($_GET['order']);

if (preg_match('/\.\./', $current_path)) {
	echo 'Access is not allowed.';
	exit;
}
if (!preg_match('/\/$/', $current_path)) {
	echo 'Parameter is not valid.';
	exit;
}
if (!is_file($current_path) || !is_dir($current_path)) {
	echo 'Directory does not exist.';
	exit;
}

$file_list = array();
if ($handle = opendir($current_path)) {
	$i = 0;
	while (false !== ($filename = readdir($handle))) {
		if ($filename{0} == '.') continue;
		$file = $current_path . $filename;
		if (is_dir($file)) {
			$file_list[$i]['is_dir'] = true; 			$file_list[$i]['has_file'] = (count(scandir($file)) > 2); 			$file_list[$i]['filesize'] = 0; 			$file_list[$i]['is_photo'] = false; 			$file_list[$i]['filetype'] = ''; 		} else {
			$file_list[$i]['is_dir'] = false;
			$file_list[$i]['has_file'] = false;
			$file_list[$i]['filesize'] = filesize($file);
			$file_list[$i]['dir_path'] = '';
			$file_ext = strtolower(array_pop(explode('.', trim($file))));
			$file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
			$file_list[$i]['filetype'] = $file_ext;
		}
		$file_list[$i]['filename'] = $filename; 		$file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file)); 		$i++;
	}
	closedir($handle);
}

function cmp_func($a, $b) {
	global $order;
	if ($a['is_dir'] && !$b['is_dir']) {
		return -1;
	} else if (!$a['is_dir'] && $b['is_dir']) {
		return 1;
	} else {
		if ($order == 'size') {
			if ($a['filesize'] > $b['filesize']) {
				return 1;
			} else if ($a['filesize'] < $b['filesize']) {
				return -1;
			} else {
				return 0;
			}
		} else if ($order == 'type') {
			return strcmp($a['filetype'], $b['filetype']);
		} else {
			return strcmp($a['filename'], $b['filename']);
		}
	}
}
usort($file_list, 'cmp_func');

$result = array();
$result['moveup_dir_path'] = $moveup_dir_path;
$result['current_dir_path'] = $current_dir_path;
$result['current_url'] = $current_url;
$result['total_count'] = count($file_list);
$result['file_list'] = $file_list;

header('Content-type: application/json; charset=UTF-8');
echo json_encode($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" /-->
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" /-->
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/project.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes/default/easyui.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes/icon.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.easyui.min.js"></script>
	<title><?php echo CHtml::encode(Yii::t('admin',$this->pageTitle)); ?>v0.1</title>
</head>

<body class='easyui-layout' title='backend'>
<div region='north' split='true' style='height:35px' border='true' id='main_header'><span class='backend_title'><?php echo Yii::t('admin','Backend Admin System')?>v0.1</span>
<?php if(Yii::app()->user->isGuest){?><span class="backend_loginform"><form method='post' action="<?php echo Yii::app()->createUrl('site/login');?>"><label for='username'><?php echo Yii::t('admin','username')?>:</label><input type="text" name='username' value=''/><label for='username'><?php echo Yii::t('admin','password')?>:</label><input type="password" name='password' value=''/><input type='submit' value='<?php echo Yii::t('admin','login')?>' id='loginsubmit'/></form></span><?php }else{?><span class="backend_loginform"><?php echo Yii::app()->user->name;?><a href='<?php echo Yii::app()->createUrl('site/logout');?>' style='padding-left:8px;color:#fff;'><?php echo Yii::t('admin','logout')?></a></span><?php }?>
</div>
<?php if(!Yii::app()->user->isGuest){?>
<div region='west'  style='width:160px' title="<?php echo Yii::t('admin','options')?>">
<?php $this->widget("Leftnav"); ?>
</div>
<?php }?>
	<div region='center'><div id='tt' class="easyui-tabs" fit="true" border="false">
				<div title="<?php echo Yii::t('admin','Backend Admin System')?>" style="padding:5px;overflow:hidden;">
					<div id='admin_index' style="margin-top:0px;">
						<h2><?php echo Yii::t('admin','Backend Admin System')?></h2>						
						<h3>update log</h3>
						<li>(04.02)v0.1 测试版上线.</li>
					</div>
				</div>
			</div>
</div>
</body>
</html>

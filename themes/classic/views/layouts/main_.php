<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/project.css" />
	<title><?php echo CHtml::encode(Yii::t('admin',$this->pageTitle)); ?>v0.5</title>
</head>

<body class='easyui-layout' title='backend'>
<?php $this->widget('ext.easyui.EasyuiWidget',array('theme'=>'default','lang'=>'zh_CN'));?>
<div region='north' split='true' style='height:35px' border='true' id='main_header'><span class='backend_title'><?php echo Yii::t('admin','Backend Admin System')?>v0.5</span>
<?php if(Yii::app()->user->isGuest){?><span class="backend_loginform"><form method='post' action="<?php echo Yii::app()->createUrl('site/login');?>"><label for='username'><?php echo Yii::t('admin','username')?>:</label><input type="text" name='username' value=''/><label for='username'><?php echo Yii::t('admin','password')?>:</label><input type="password" name='password' value=''/><input type='submit' value='<?php echo Yii::t('admin','login')?>' id='loginsubmit'/></form></span><?php }else{?><span class="backend_loginform"><?php echo Yii::app()->user->name;?><a href='<?php echo Yii::app()->createUrl('site/logout');?>' style='padding-left:8px;color:#fff;'><?php echo Yii::t('admin','logout')?></a></span><?php }?>
</div>
<?php if(!Yii::app()->user->isGuest){?>
<div region='west'  style='width:160px' title="<?php echo Yii::t('admin','main menu')?>">
<?php $this->widget("Leftnav"); ?>
</div>
<?php }?>
	<div region='center'>
            <div id='tt' class="easyui-tabs" fit="true" border="false">
				<div title="<?php echo Yii::t('admin','Backend Admin System')?>" style="padding:5px;overflow:hidden;">
					<div id='admin_index' style="margin-top:0px;">
						<h2><?php echo Yii::t('admin','Backend Admin System')?></h2>						
						<h3></h3>
						<p>(04.02)v0.1 测试版上线.</p>
						<p>(06.13)v0.2 Ui DataGrid组件更新.</p>
                                                <p>(07.06)v0.3 优化导航JS 修复tabs 已知BUG.</p>
                                                <p>(07.07)v0.4 theme fix.</p>
                                                <p>(07.08)v0.5 Ui ComboTree组件更新.</p>
					</div>
				</div>
			</div>
</div>
</body>
</html>
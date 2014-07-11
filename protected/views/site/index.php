<?php $this->widget('ext.easyui.EasyuiWidget',array('theme'=>'gray','lang'=>'zh_CN'));?>
<body class="easyui-layout">
<div region='north' split='true' style='height:35px' border='true' id='main_header'><span class='backend_title'><?php echo Yii::t('admin','Backend Admin System')?>&nbsp;V<?php echo Yii::app()->params['version'];?></span>
<?php if(Yii::app()->user->isGuest){?><span class="backend_loginform">请登录</span><?php }else{?><span class="backend_loginform">用户名:<?php echo Yii::app()->user->name;?>&nbsp;&nbsp;所属组:<?php echo $roleName; ?>&nbsp;&nbsp;<a href='<?php echo Yii::app()->createUrl('site/logout');?>' style='padding-left:8px;color:#fff;'><?php echo Yii::t('admin','logout')?></a></span><?php }?>
</div> 
<?php if(!Yii::app()->user->isGuest){?>
<div region='west'  style='width:160px' title="<?php echo Yii::t('admin','main menu')?>">
<?php $this->widget("ext.easyui.EasyuiSideBar"); ?>
</div>
<?php }?>
<div region='center'>
            <div id='tt' class="easyui-tabs" fit="true" border="false">
                            <div title="<?php echo Yii::t('admin','Admin Index')?>" style="padding:5px;overflow:hidden;">
					<div id='admin_index' style="margin-top:0px;position:relative;width:100%;height:100%;">
                                        <?php if(Yii::app()->user->isGuest){?>
                                        <?php $this->renderPartial('_form',array('model'=>$model));?>
                                        <?php }else{?>
						<h2><?php echo Yii::t('admin','Backend Admin System')?></h2>						
						<h3></h3>
						<p>(04.02)v0.1 测试版上线.</p>
						<p>(06.13)v0.2 Ui DataGrid组件更新.</p>
                                                <p>(07.06)v0.3 优化导航JS 修复tabs 已知BUG.</p>
                                                <p>(07.07)v0.4 theme fix.</p>
                                                <p>(07.08)v0.5 Ui ComboTree组件更新.</p>
                                                <p>(09.23)v0.6 chrome,saffri等符合W3C标准的浏览器下datagrid BUG修正.</p>
                                                <p>(09.26)v0.7 修复IE6下 BUG.</p>
                                                <p>(09.27)v0.8 加入角色权限认证系统,预定义 管理员,编辑,客服,店面管理员 四个角色组.</p>
                                                <p>(09.29)v0.9 增加操作日志功能,记录商品,图片等操作行为.</p>
                                        <?php }?>
					</div>
				</div>
	    </div>
</div>
<div region='south' split='true' border='true' id='main_footer'>
    <span class='backend_footer'><?php echo Yii::t('admin','Developed By');?>&nbsp;<?php echo CHtml::link('@alichen','http://weibo.com/aliz');?>&nbsp;&nbsp;如有问题请email:<?php echo Yii::app()->params['adminEmail']?></span>
</div>
</body> 
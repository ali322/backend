<?php if(Yii::app()->user->isGuest):?><a href='javascript:void(0)' onclick="user_register()">注册</a><a href='javascript:void(0)' onclick="user_login()">登陆</a><?php else:?><a href='javascript:void(0)'><?php echo Yii::app()->user->name; ?></a><a href='<?php echo Yii::app()->createUrl('site/logout')?>'>退出</a><?php endif;?><div id='user_dialog' style='width:400px;height:200px;' title='用户信息'>
<div class="yiiForm">
<?php echo CHtml::beginForm(Yii::app()->createUrl('site/login')); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabel($model,'username'); ?>
<?php echo CHtml::activeTextField($model,'username') ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($model,'password'); ?>
<?php echo CHtml::activePasswordField($model,'password')
?>
</div>

<div class="action">
<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
记住我?<br/>
<?php echo CHtml::submitButton('Login'); ?>
</div>

<?php echo CHtml::endForm(); ?>
</div><!-- yii表单 -->
</div>

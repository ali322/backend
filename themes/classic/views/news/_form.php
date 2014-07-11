<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'news_title'); ?>
		<?php echo $form->textField($model,'news_title',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'news_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_ad'); ?>
		<?php echo CHtml::fileField('pic_src'); ?>
		<?php echo $form->error($model,'news_ad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time'); ?>
		<?php echo $form->error($model,'add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_content'); ?>
		<?php $this->widget("ext.kindeditor.KindEditor",array(
			'model'=>$model,
			'attribute'=>'news_content',
			'options'=>array(
			'height'=>'350',
			'width'=>'520',
			),
		));?>
		<?php echo $form->error($model,'news_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<?php echo $form->dropDownList($model,'cat_id',CHtml::listData($cates, 'cat_id', 'cat_name'));?>
		<?php echo $form->error($model,'cat_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

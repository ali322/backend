<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'topic-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'topic_name'); ?>
		<?php echo $form->textField($model,'topic_name',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'topic_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',CHtml::listData($brands, 'brand_id', 'brand_name'));?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'topic_ad'); ?>
		<?php echo CHtml::fileField('pic_src'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'topic_content'); ?>
		<?php $this->widget("ext.kindeditor.KindEditor",array(
		'model'=>$model,
		'attribute'=>'topic_content',
		'options'=>array(
			'height'=>'240',
			'width'=>'520',
		),
));?>
		<?php //echo $form->textArea($model,'topic_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'topic_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'begin_time'); ?>
		<?php	$this->widget('ext.timepicker.timepicker', array(
	     'model'=>$model,
		 'name'=>'begin_time',
		)); ?>
		<!--?php// echo $form->textField($model,'begin_time'); ?-->
		<?php echo $form->error($model,'begin_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php	$this->widget('ext.timepicker.timepicker', array(
	     'model'=>$model,
		 'name'=>'end_time',
		)); ?>
		<!--?php// echo $form->textField($model,'end_time'); ?-->
		<?php echo $form->error($model,'end_time'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

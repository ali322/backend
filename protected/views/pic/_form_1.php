<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pic_path'); ?>
		<?php echo $form->textArea($model,'pic_path',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pic_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic_desc'); ?>
		<?php echo $form->textField($model,'pic_desc',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pic_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic_name'); ?>
		<?php echo $form->textField($model,'pic_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pic_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-goods-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'main_id'); ?>
		<?php echo $form->textField($model,'main_id'); ?>
		<?php echo $form->error($model,'main_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ext_condition'); ?>
		<?php echo $form->textArea($model,'ext_condition',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ext_condition'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

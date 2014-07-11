<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goods-attr-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'good_id'); ?>
		<?php echo $form->textField($model,'good_id'); ?>
		<?php echo $form->error($model,'good_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attr_name'); ?>
		<?php echo $form->textField($model,'attr_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'attr_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attr_value'); ?>
		<?php echo $form->textField($model,'attr_value',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'attr_value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

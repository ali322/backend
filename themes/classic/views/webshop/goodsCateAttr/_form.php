<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goods-cate-attr-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<?php echo $form->dropDownList($model,'cat_id',$cates);?>
		<?php echo $form->error($model,'cat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attr_name'); ?>
		<?php echo $form->textField($model,'attr_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'attr_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

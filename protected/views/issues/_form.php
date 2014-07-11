<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issues-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'finished'); ?>
		<?php echo $form->textField($model,'finished',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'finished'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php $this->widget("ext.kindeditor.KindEditor",array(
			'model'=>$model,
			'attribute'=>'content',
			'options'=>array(
			'height'=>'350',
			'width'=>'520',
			),
		));?>	
		<?php echo $form->error($model,'content'); ?>
	</div>


	<div class="row buttons">
		<?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id));?>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

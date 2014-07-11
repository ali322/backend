<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pic_id'); ?>
		<?php echo $form->textField($model,'pic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic_path'); ?>
		<?php echo $form->textArea($model,'pic_path',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic_desc'); ?>
		<?php echo $form->textField($model,'pic_desc',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic_name'); ?>
		<?php echo $form->textField($model,'pic_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
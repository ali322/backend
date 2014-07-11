<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'brand-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<?php echo $form->dropDownList($model,'cat_id',CHtml::listData($cates, 'cat_id', 'cat_name'));?>
		<?php echo $form->error($model,'cat_id'); ?>
	</div>
    
    	<div class="row">
            <?php echo $form->labelEx($model,'in_shop'); ?>
            <?php echo $form->checkBox($model,'in_shop'); ?>
            <?php echo $form->error($model,'in_shop'); ?>
         </div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_name'); ?>
		<?php echo $form->textField($model,'brand_name',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'brand_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'brand_alia'); ?>
		<?php echo $form->textField($model,'brand_alia',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'brand_alia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_logo'); ?>
		<?php echo CHtml::fileField('pic_src'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'brand_location'); ?>
		<?php echo $form->textField($model,'brand_location',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'brand_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_desc'); ?>
		<?php $this->widget("ext.kindeditor.KindEditor",array(
			'model'=>$model,
			'attribute'=>'brand_desc',
			'options'=>array(
			'height'=>'350',
			'width'=>'520',
			),
		));?>		
		<?php //echo $form->textArea($model,'brand_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'brand_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

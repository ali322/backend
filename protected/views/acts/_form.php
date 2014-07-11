<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acts-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'act_name'); ?>
		<?php echo $form->textField($model,'act_name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'act_name'); ?>
	</div>

    	<div class="row">
		<?php echo $form->labelEx($model,'act_ad'); ?>
		<?php
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                        'id'=>'uploadFile',
                        'model'=>$model,
                        'attribute'=>'act_ad',
                   //     'thumbed'=>false,
                        'config'=>array(
                               'action'=>Yii::app()->createUrl('/acts/upload'),
                               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                              )
                )); 
                ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'act_content'); ?>
		<?php $this->widget("ext.kindeditor.KindEditor",array(
			'model'=>$model,
			'attribute'=>'act_content',
			'options'=>array(
			'height'=>'350',
			'width'=>'520',
			),
		));?>
		<?php echo $form->error($model,'act_content'); ?>
	</div>


    	<div class="row">
		<?php echo $form->labelEx($model,'begin_time'); ?>
		<?php	$this->widget('ext.easyui.EasyuiDatetimeBox', array(
                    'model'=>$model,
                    'attribute'=>'begin_time',
		)); ?>
		<?php echo $form->error($model,'begin_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php	$this->widget('ext.easyui.EasyuiDatetimeBox', array(
                    'model'=>$model,
                    'attribute'=>'end_time',
		)); ?>
		<?php echo $form->error($model,'end_time'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'brands'); ?>
		<?php echo $form->textField($model,'brands',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'brands'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ?Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goods-cate-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo Yii::t("webshop","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_name'); ?>
		<?php echo $form->textField($model,'cat_name',array('size'=>60,'maxlength'=>90)); ?>
		<?php echo $form->error($model,'cat_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_desc'); ?>
		<?php echo $form->textField($model,'cat_desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cat_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'parent_id'); ?>
            <?php
                $this->widget('ext.easyui.EasyuiCombotree',array(
                    'url'=>Yii::app()->createUrl('webshop/goodsCate/remoteData'),
                     'model'=>$model,
                     'attribute'=>'parent_id'
                ));
            ?>
            <?php echo $form->error($model,'parent_id'); ?>
         </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ?  Yii::t('webshop', 'Create') : Yii::t('webshop', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
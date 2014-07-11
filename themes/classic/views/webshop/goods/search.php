<?php $this->widget('ext.easyui.EasyuiWidget');?>
<?php echo CJavaScript::jsonEncode(array('Goods'=>array('good_id'=>1)));?>
<?php Yii::app()->clientScript->registerScript('search_form', "
	$('#search_form_button').click(function(){
		routeData();
	//	alert($('#content').html());
	})
"); ?>
<div class="wide form" id='search_form'>

<?php $form=$this->beginWidget('CActiveForm', array(
//	'action'=>Yii::app()->createUrl('webshop/goods/loadData'),
	'method'=>'POST',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'good_id'); ?>
		<?php echo $form->textField($model,'good_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brand_id'); ?>
		<?php echo $form->textField($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cat_id'); ?>
		<?php echo $form->textField($model,'cat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'good_name'); ?>
		<?php echo $form->textField($model,'good_name',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'good_sn'); ?>
		<?php echo $form->textField($model,'good_sn',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'market_price'); ?>
		<?php echo $form->textField($model,'market_price',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shop_price'); ?>
		<?php echo $form->textField($model,'shop_price',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sold_count'); ?>
		<?php echo $form->textField($model,'sold_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promote_price'); ?>
		<?php echo $form->textField($model,'promote_price',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promote_start_time'); ?>
		<?php echo $form->textField($model,'promote_start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promote_end_time'); ?>
		<?php echo $form->textField($model,'promote_end_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::hiddenField('search_form','search_form');?>
		<?php echo CHtml::button('Search',array('id'=>'search_form_button')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
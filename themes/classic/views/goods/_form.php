<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goods-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?><br>
	<?php echo $form->errorSummary($model_); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',CHtml::listData($brands, 'brand_id', 'brand_name'));?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<?php echo $form->dropDownList($model,'cat_id',$cates,
		array('ajax'=>array(
		'type'=>'POST',
		'url'=>Yii::app()->createUrl('goods/viewattr'),
	//	'data'=>'js:$(".viewattr_data").serialize();',
		'update'=>'#goods_attr',
		)));?>
		<?php echo $form->error($model,'cat_id'); ?>
	</div>

	<div class="row" id='goods_attr'>
	<?php if(!$model->isNewRecord){
		//	CVarDumper::dump($good_attrs_list);exit;
		if($good_attrs_list){
			foreach($good_attrs_list as $k=>$v){
				echo '<div class="row">'.CHtml::label($k,"good_attrs[".$k."]").CHtml::textfield("good_attrs[".$k."]",$v).'</div>';
		?>
			
	<?php }}}?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'good_name'); ?>
		<?php echo $form->textField($model,'good_name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'good_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_sn'); ?>
		<?php echo $form->textField($model,'good_sn',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'good_sn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'market_price'); ?>
		<?php echo $form->textField($model,'market_price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'market_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shop_price'); ?>
		<?php echo $form->textField($model,'shop_price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'shop_price'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'sold_count'); ?>
		<?php echo $form->textField($model,'sold_count'); ?>
		<?php echo $form->error($model,'sold_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promote_price'); ?>
		<?php echo $form->textField($model,'promote_price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'promote_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promote_start_time'); ?>
		<?php echo $form->textField($model,'promote_start_time'); ?>
		<?php echo $form->error($model,'promote_start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promote_end_time'); ?>
		<?php echo $form->textField($model,'promote_end_time'); ?>
		<?php echo $form->error($model,'promote_end_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_,'good_img'); ?>
		<?php echo CHtml::fileField('pic_src'); ?>
		<?php echo $form->error($model_,'good_img'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model_,'good_color'); ?>
		<?php echo $form->textField($model_,'good_color',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model_,'good_color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_,'good_weight'); ?>
		<?php echo $form->textField($model_,'good_weight',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model_,'good_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_,'unit'); ?>
		<?php echo $form->textField($model_,'unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model_,'unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_,'good_desc'); ?>
		<?php echo $form->textArea($model_,'good_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model_,'good_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_,'good_brief'); ?>
		<?php echo $form->textField($model_,'good_brief',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model_,'good_brief'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::hiddenField('good_id',$model->isNewRecord ?'':$model->good_id)?>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('project','Create') : Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

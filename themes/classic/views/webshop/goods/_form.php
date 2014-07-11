<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goods-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>

	<?php echo $form->errorSummary($model); ?><br>
	<?php echo $form->errorSummary($model_); ?><br>


	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',CHtml::listData($brands, 'brand_id', 'brand_name'));?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_id'); ?>
                <?php
                    $this->widget('ext.easyui.EasyuiCombotree',array(
                     'url'=>Yii::app()->createUrl('webshop/goodsCate/remoteData'),
                     'model'=>$model,
                     'attribute'=>'cat_id',
                     'change_func'=>CHtml::ajax(array(
                                        		'type'=>'POST',
                                                        'url'=>Yii::app()->createUrl('goods/viewattr'),
                                                        'update'=>'#goods_attr',
                                    )),
                ));
                ?>
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
		<?php echo $form->labelEx($model,'good_number'); ?>
		<?php echo $form->textField($model,'good_number',array('size'=>120,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'good_number'); ?>
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
		<?php echo $form->labelEx($model,'is_on_sale'); ?>
		<?php echo $form->checkBox($model,'is_on_sale'); ?>
		<?php echo $form->error($model,'is_on_sale'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'is_recommend'); ?>
		<?php echo $form->checkBox($model,'is_recommend'); ?>
		<?php echo $form->error($model,'is_recommend'); ?>
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
		<?php
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                        'id'=>'uploadFile',
                        'model'=>$model_,
                        'attribute'=>'good_img',
                        'gallery'=>'good_img_uploaded',
                        'config'=>array(
                               'action'=>Yii::app()->createUrl('/webshop/goods/upload'),
                               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                              )
                )); 
                ?>
		<?php echo $form->error($model_,'good_img'); ?>
                <?php $this->widget('ext.EAjaxUpload.UploadedList',array('imgUrl'=>$model_->good_img,'wrapClass'=>'good_img_uploaded'));?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_,'good_img_ext'); ?>
		<?php
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                        'id'=>'uploadFileExt',
                        'model'=>$model_,
                        'attribute'=>'good_img_ext',
                        'multiple'=>true,
                        'gallery'=>'good_img_uploaded_ext',
                        'config'=>array(
                               'action'=>Yii::app()->createUrl('/webshop/goods/upload'),
                               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                              )
                )); 
                ?>
		<?php echo $form->error($model_,'good_img_ext'); ?>
                <?php $this->widget('ext.EAjaxUpload.UploadedList',array('imgUrl'=>$model_->good_img_ext,'wrapClass'=>'good_img_uploaded_ext'));?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model_,'good_thumb'); ?>
		<?php
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                        'id'=>'uploadThumb',
                        'model'=>$model_,
                        'attribute'=>'good_thumb',
                        'gallery'=>'good_thumb_uploaded',
                        'config'=>array(
                               'action'=>Yii::app()->createUrl('/webshop/goods/upload'),
                               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                              )
                )); 
                ?>
		<?php echo $form->error($model_,'good_thumb'); ?>
                <?php $this->widget('ext.EAjaxUpload.UploadedList',array('imgUrl'=>$model_->good_thumb,'wrapClass'=>'good_thumb_uploaded'));?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_,'good_thumb_ext'); ?>
		<?php
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                        'id'=>'uploadThumbExt',
                        'model'=>$model_,
                        'attribute'=>'good_thumb_ext',
                        'gallery'=>'good_thumb_uploaded_ext',
                        'multiple'=>true,
                        'config'=>array(
                               'action'=>Yii::app()->createUrl('/webshop/goods/upload'),
                               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                              )
                )); 
                ?>
		<?php echo $form->error($model_,'good_thumb_ext'); ?>
                <?php $this->widget('ext.EAjaxUpload.UploadedList',array('imgUrl'=>$model_->good_thumb_ext,'wrapClass'=>'good_thumb_uploaded_ext'));?>
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
		<?php $this->widget("ext.kindeditor.KindEditor",array(
			'model'=>$model_,
			'attribute'=>'good_desc',
			'options'=>array(
			'height'=>'350',
			'width'=>'520',
			),
		));?>	
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

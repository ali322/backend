<?php
$this->breadcrumbs=array(
	'Pics'=>array('index'),
	$model->pic_id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List Pic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Pic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update Pic"), 'url'=>array('update', 'id'=>$model->pic_id)),
	array('label'=>Yii::t("project","Delete Pic"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pic_id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage Pic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View Pic'); ?> #<?php echo $model->pic_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pic_id',
		'pic_path',
		'pic_desc',
		'pic_name',
	),
)); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pic-form',
	'action'=>Yii::app()->createUrl('pic/uploadPic'),
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<div class="row">
		<?php echo CHtml::fileField('pic_src'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::hiddenField('id',$model->pic_id); ?>
		<?php echo CHtml::submitButton(Yii::t('project','Save')); ?>
	</div>

<?php $this->endWidget(); ?>
<br />
<img src="<?php echo Yii::app()->request->baseUrl.'/'.$model->pic_path.'/'.$model->pic_name;?>" alt="" />

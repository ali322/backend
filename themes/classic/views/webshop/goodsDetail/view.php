<?php
$this->breadcrumbs=array(
	'Goods Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsDetail"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create GoodsDetail"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update GoodsDetail"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Delete GoodsDetail"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage GoodsDetail"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View GoodsDetail'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'good_id',
		'good_img',
		'good_thumb',
		'good_color',
		'good_weight',
		'unit',
		'good_desc',
		'good_brief',
	),
)); ?>

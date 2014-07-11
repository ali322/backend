<?php
$this->breadcrumbs=array(
	'Goods Attrs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create GoodsAttr"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update GoodsAttr"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Delete GoodsAttr"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage GoodsAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View GoodsAttr'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'good_id',
		'attr_name',
		'attr_value',
	),
)); ?>

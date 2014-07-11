<?php
$this->breadcrumbs=array(
	'Goods Cate Attrs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsCateAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create GoodsCateAttr"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update GoodsCateAttr"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Delete GoodsCateAttr"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage GoodsCateAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View GoodsCateAttr'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cat_id',
		'attr_name',
	),
)); ?>

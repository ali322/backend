<?php
$this->breadcrumbs=array(
	'Goods Cate Attrs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t("webshop","List GoodsCateAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("webshop","Create GoodsCateAttr"), 'url'=>array('create')),
	array('label'=>Yii::t("webshop","Update GoodsCateAttr"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("webshop","Delete GoodsCateAttr"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("webshop","Manage GoodsCateAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('webshop','View GoodsCateAttr'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cat_id',
		'attr_name',
	),
)); ?>

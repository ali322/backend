<?php
$this->breadcrumbs=array(
	'Group Goods'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t("webshop","List GroupGoods"), 'url'=>array('index')),
	array('label'=>Yii::t("webshop","Create GroupGoods"), 'url'=>array('create')),
	array('label'=>Yii::t("webshop","Update GroupGoods"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("webshop","Delete GroupGoods"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("webshop","Manage GroupGoods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('webshop','View GroupGoods'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'main_id',
		'ext_condition',
	),
)); ?>

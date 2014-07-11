<?php
$this->breadcrumbs=array(
	'Goods Cates'=>array('index'),
	$model->cat_id,
);

$this->menu=array(
	array('label'=>Yii::t('webshop', 'List GoodsCate'), 'url'=>array('index')),
	array('label'=>Yii::t('webshop', 'Create GoodsCate'), 'url'=>array('create')),
	array('label'=>Yii::t('webshop', 'Update GoodsCate'), 'url'=>array('update', 'id'=>$model->cat_id)),
	array('label'=>Yii::t('webshop', 'Delete GoodsCate'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('webshop', 'Manage GoodsCate'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('webshop', 'View GoodsCate');?> #<?php echo $model->cat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cat_id',
		'cat_name',
		'cat_desc',
		'sort_order',
		'parent_id',
		'lft',
		'rgt',
	),
)); ?>

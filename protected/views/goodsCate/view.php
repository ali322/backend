<?php
$this->breadcrumbs=array(
	'Goods Cates'=>array('index'),
	$model->cat_id,
);

$this->menu=array(
	array('label'=>'List GoodsCate', 'url'=>array('index')),
	array('label'=>'Create GoodsCate', 'url'=>array('create')),
	array('label'=>'Update GoodsCate', 'url'=>array('update', 'id'=>$model->cat_id)),
	array('label'=>'Delete GoodsCate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GoodsCate', 'url'=>array('admin')),
);
?>

<h1>View GoodsCate #<?php echo $model->cat_id; ?></h1>

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

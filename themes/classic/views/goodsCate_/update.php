<?php
$this->breadcrumbs=array(
	'Goods Cates'=>array('index'),
	$model->cat_id=>array('view','id'=>$model->cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GoodsCate', 'url'=>array('index')),
	array('label'=>'Create GoodsCate', 'url'=>array('create')),
	array('label'=>'View GoodsCate', 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>'Manage GoodsCate', 'url'=>array('admin')),
);
?>

<h1>Update GoodsCate <?php echo $model->cat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'p_cates'=>$p_cates)); ?>
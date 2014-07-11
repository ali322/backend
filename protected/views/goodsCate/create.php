<?php
$this->breadcrumbs=array(
	'Goods Cates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GoodsCate', 'url'=>array('index')),
	array('label'=>'Manage GoodsCate', 'url'=>array('admin')),
);
?>

<h1>Create GoodsCate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'p_cates'=>$p_cates)); ?>
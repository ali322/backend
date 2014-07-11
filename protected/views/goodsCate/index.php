<?php
$this->breadcrumbs=array(
	'Goods Cates',
);

$this->menu=array(
	array('label'=>'Create GoodsCate', 'url'=>array('create')),
	array('label'=>'Manage GoodsCate', 'url'=>array('admin')),
);
?>

<h1>Goods Cates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

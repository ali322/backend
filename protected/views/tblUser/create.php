<?php
$this->breadcrumbs=array(
	'Tbl Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblUser', 'url'=>array('index')),
	array('label'=>'Manage TblUser', 'url'=>array('admin')),
);
?>

<h1>Create TblUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
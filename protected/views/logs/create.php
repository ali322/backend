<?php
$this->breadcrumbs=array(
	'Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Logs', 'url'=>array('index')),
	array('label'=>'Manage Logs', 'url'=>array('admin')),
);
?>

<h1>Create Logs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
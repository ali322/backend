<?php
$this->breadcrumbs=array(
	'Acts'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List Acts', 'url'=>array('index')),
	array('label'=>'Manage Acts', 'url'=>array('admin')),
);
*/
?>

<h1><?php echo Yii::t('project','Create Acts');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
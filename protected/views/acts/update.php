<?php
$this->breadcrumbs=array(
	'Acts'=>array('index'),
	$model->act_id=>array('view','id'=>$model->act_id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List Acts', 'url'=>array('index')),
	array('label'=>'Create Acts', 'url'=>array('create')),
	array('label'=>'View Acts', 'url'=>array('view', 'id'=>$model->act_id)),
	array('label'=>'Manage Acts', 'url'=>array('admin')),
);
*/
?>

<h1><?php echo Yii::t('project', 'Update Acts').$model->act_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
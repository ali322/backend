<?php
$this->breadcrumbs=array(
	'Acts'=>array('index'),
	$model->act_id,
);
/*
$this->menu=array(
	array('label'=>'List Acts', 'url'=>array('index')),
	array('label'=>'Create Acts', 'url'=>array('create')),
	array('label'=>'Update Acts', 'url'=>array('update', 'id'=>$model->act_id)),
	array('label'=>'Delete Acts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->act_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acts', 'url'=>array('admin')),
);
*/
?>

<h1><?php echo Yii::t('project', 'View Acts').'#'.$model->act_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'act_id',
		'act_name',
		'act_content',
		'add_time',
                'begin_time',
                'end_time',
		'brands',
	),
)); ?>

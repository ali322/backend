<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List Comments"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Comments"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update Comments"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Delete Comments"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage Comments"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View Comments'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'content',
		'add_time',
	),
)); ?>

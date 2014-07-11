<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List Users"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Users"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update Users"), 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>Yii::t("project","Delete Users"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage Users"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View Users'); ?> #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'user_name',
		'password',
	),
)); ?>

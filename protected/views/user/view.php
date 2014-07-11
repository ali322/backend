<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List User"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create User"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update User"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Delete User"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage User"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View User'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
	),
)); ?>

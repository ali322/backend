<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Issues"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Issues"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View Issues"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Manage Issues"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update Issues'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
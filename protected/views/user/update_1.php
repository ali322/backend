<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List User"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create User"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View User"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Manage User"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update User'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
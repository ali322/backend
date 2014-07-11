<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id=>array('view','id'=>$model->user_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Users"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Users"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View Users"), 'url'=>array('view', 'id'=>$model->user_id)),
	array('label'=>Yii::t("project","Manage Users"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update Users'); ?> <?php echo $model->user_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
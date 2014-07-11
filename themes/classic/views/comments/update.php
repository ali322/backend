<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Comments"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Comments"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View Comments"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Manage Comments"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update Comments'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
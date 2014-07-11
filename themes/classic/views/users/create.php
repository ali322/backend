<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Users"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage Users"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create Users"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
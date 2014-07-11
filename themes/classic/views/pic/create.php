<?php
$this->breadcrumbs=array(
	'Pics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Pic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage Pic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create Pic"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
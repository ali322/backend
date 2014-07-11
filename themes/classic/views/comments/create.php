<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Comments"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage Comments"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create Comments"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
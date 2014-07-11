<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Issues"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage Issues"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create Issues"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
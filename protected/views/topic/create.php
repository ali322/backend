<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Topic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage Topic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create Topic"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'brands'=>$brands)); ?>
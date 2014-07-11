<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List News"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage News"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create News"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cates'=>$cates)); ?>
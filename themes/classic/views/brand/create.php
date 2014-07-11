<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Brand"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage Brand"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create Brand"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cates'=>$cates)); ?>
<?php
$this->breadcrumbs=array(
	'Cms Pics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List CmsPic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage CmsPic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create CmsPic"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
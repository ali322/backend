<?php
$this->breadcrumbs=array(
	'Goods Attrs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage GoodsAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create GoodsAttr"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
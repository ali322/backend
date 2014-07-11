<?php
$this->breadcrumbs=array(
	'Goods Cate Attrs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsCateAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage GoodsCateAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create GoodsCateAttr"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
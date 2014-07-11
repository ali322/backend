<?php
$this->breadcrumbs=array(
	'Goods Cate Attrs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("webshop","List GoodsCateAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("webshop","Manage GoodsCateAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("webshop","Create GoodsCateAttr"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cates'=>$cates)); ?>
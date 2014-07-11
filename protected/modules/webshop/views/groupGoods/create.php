<?php
$this->breadcrumbs=array(
	'Group Goods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("webshop","List GroupGoods"), 'url'=>array('index')),
	array('label'=>Yii::t("webshop","Manage GroupGoods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("webshop","Create GroupGoods"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
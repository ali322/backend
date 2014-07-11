<?php
$this->breadcrumbs=array(
	'Group Goods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GroupGoods"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage GroupGoods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create GroupGoods"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->breadcrumbs=array(
	'Goods Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsDetail"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage GoodsDetail"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create GoodsDetail"); ?></h1>

var_dump($model_);exit;
<?php echo $this->renderPartial('_form', array('model'=>$model,'model_'=>$model_)); ?>
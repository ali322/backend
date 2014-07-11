<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Goods"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage Goods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create Goods"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model_'=>$model_,'cates'=>$cates,'brands'=>$brands)); ?>
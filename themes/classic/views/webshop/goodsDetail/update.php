<?php
$this->breadcrumbs=array(
	'Goods Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsDetail"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create GoodsDetail"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View GoodsDetail"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Manage GoodsDetail"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update GoodsDetail'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model_'=>$model_)); ?>
<?php
$this->breadcrumbs=array(
	'Goods Attrs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create GoodsAttr"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View GoodsAttr"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Manage GoodsAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update GoodsAttr'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
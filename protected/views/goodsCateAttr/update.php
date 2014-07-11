<?php
$this->breadcrumbs=array(
	'Goods Cate Attrs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsCateAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create GoodsCateAttr"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View GoodsCateAttr"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Manage GoodsCateAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update GoodsCateAttr'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
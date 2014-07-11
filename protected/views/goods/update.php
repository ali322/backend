<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	$model->good_id=>array('view','id'=>$model->good_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Goods"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Goods"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View Goods"), 'url'=>array('view', 'id'=>$model->good_id)),
	array('label'=>Yii::t("project","Manage Goods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update Goods'); ?> <?php echo $model->good_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model_'=>$model_,'cates'=>$cates,'brands'=>$brands,'good_attrs_list'=>isset($good_attrs_list)?$good_attrs_list:'')); ?>
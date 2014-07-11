<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->brand_id=>array('view','id'=>$model->brand_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Brand"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Brand"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View Brand"), 'url'=>array('view', 'id'=>$model->brand_id)),
	array('label'=>Yii::t("project","Manage Brand"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update Brand'); ?> <?php echo $model->brand_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cates'=>$cates)); ?>
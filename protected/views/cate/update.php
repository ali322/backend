<?php
$this->breadcrumbs=array(
	'Cates'=>array('index'),
	$model->cat_id=>array('view','id'=>$model->cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Cate"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Cate"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View Cate"), 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>Yii::t("project","Manage Cate"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update Cate'); ?> <?php echo $model->cat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
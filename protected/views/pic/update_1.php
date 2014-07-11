<?php
$this->breadcrumbs=array(
	'Pics'=>array('index'),
	$model->pic_id=>array('view','id'=>$model->pic_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Pic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Pic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View Pic"), 'url'=>array('view', 'id'=>$model->pic_id)),
	array('label'=>Yii::t("project","Manage Pic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update Pic'); ?> <?php echo $model->pic_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
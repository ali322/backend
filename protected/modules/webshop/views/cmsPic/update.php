<?php
$this->breadcrumbs=array(
	'Cms Pics'=>array('index'),
	$model->pic_id=>array('view','id'=>$model->pic_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List CmsPic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create CmsPic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View CmsPic"), 'url'=>array('view', 'id'=>$model->pic_id)),
	array('label'=>Yii::t("project","Manage CmsPic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update CmsPic'); ?> <?php echo $model->pic_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
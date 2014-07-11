<?php
$this->breadcrumbs=array(
	'News Cates'=>array('index'),
	$model->cat_id=>array('view','id'=>$model->cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List NewsCate"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create NewsCate"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View NewsCate"), 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>Yii::t("project","Manage NewsCate"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update NewsCate'); ?> <?php echo $model->cat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->breadcrumbs=array(
	'Group Goods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GroupGoods"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create GroupGoods"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View GroupGoods"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Manage GroupGoods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update GroupGoods'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
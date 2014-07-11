<?php
$this->breadcrumbs=array(
	'Group Goods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("webshop","List GroupGoods"), 'url'=>array('index')),
	array('label'=>Yii::t("webshop","Create GroupGoods"), 'url'=>array('create')),
	array('label'=>Yii::t("webshop","View GroupGoods"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("webshop","Manage GroupGoods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('webshop','Update GroupGoods'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
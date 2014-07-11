<?php
$this->breadcrumbs=array(
	'Goods Cate Attrs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("webshop","List GoodsCateAttr"), 'url'=>array('index')),
	array('label'=>Yii::t("webshop","Create GoodsCateAttr"), 'url'=>array('create')),
	array('label'=>Yii::t("webshop","View GoodsCateAttr"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("webshop","Manage GoodsCateAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('webshop','Update GoodsCateAttr'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cates'=>$cates)); ?>
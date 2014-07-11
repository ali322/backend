<?php
$this->breadcrumbs=array(
	'Goods Cates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("webshop","List GoodsCate"), 'url'=>array('index')),
	array('label'=>Yii::t("webshop","Manage GoodsCate"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('webshop', 'Create GoodsCate');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
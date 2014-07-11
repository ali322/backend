<?php
$this->breadcrumbs=array(
	'Goods Cates'=>array('index'),
	$model->cat_id=>array('view','id'=>$model->cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('webshop', 'List GoodsCate'), 'url'=>array('index')),
	array('label'=>Yii::t('webshop', 'Create GoodsCate'), 'url'=>array('create')),
	array('label'=>Yii::t('webshop', 'View GoodsCate'), 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>Yii::t('webshop', 'Manage GoodsCate'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('webshop', 'Update GoodsCate');?> <?php echo $model->cat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
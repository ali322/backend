<?php
$this->breadcrumbs=array(
	'Goods Details',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create GoodsDetail"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage GoodsDetail"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Goods Details'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

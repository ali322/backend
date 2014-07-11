<?php
$this->breadcrumbs=array(
	'Goods Attrs',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create GoodsAttr"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage GoodsAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Goods Attrs'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

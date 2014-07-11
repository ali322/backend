<?php
$this->breadcrumbs=array(
	'Goods Cate Attrs',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create GoodsCateAttr"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage GoodsCateAttr"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Goods Cate Attrs'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

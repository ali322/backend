<?php
$this->breadcrumbs=array(
	'Cms Pics',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create CmsPic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage CmsPic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Cms Pics'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

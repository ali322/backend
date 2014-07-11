<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create User"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage User"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Users'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

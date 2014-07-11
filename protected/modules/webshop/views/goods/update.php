<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	$model->good_id=>array('view','id'=>$model->good_id),
	'Update',
);
?>

<h1><?php echo Yii::t('webshop','Update Goods'); ?> <?php echo $model->good_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model_'=>$model_,'good_attrs_list'=>isset($good_attrs_list)?$good_attrs_list:'')); ?>
<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	'Create',
);

?>

<h1><?php echo Yii::t("webshop","Create Goods"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model_'=>$model_,'brands'=>$brands)); ?>
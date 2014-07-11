<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t("project","List Issues"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Issues"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update Issues"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("project","Delete Issues"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage Issues"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View Issues'); ?> #<?php echo $model->id; ?></h1>

<div class="issue_view">
<h2><?php echo $model->title;?></h2>
<h3>用户:<?php echo $model->user->user_name;?></h3>
<h3>添加时间:<?php echo date('Y年m月d日 H:i:s',$model->add_time);?></h3>
<h3>更新时间:<?php echo $model->update_time!=0?date('Y年m月d日 H:i:s',$model->update_time):'';?></h3>
<h3>是否已修复:<?php echo $model->finished;?></h3>
<p>
<b>内容描述</b><br /><br /><?php echo $model->content;?>
</p>
</div>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->news_id), array('view', 'id'=>$data->news_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_title')); ?>:</b>
	<?php echo CHtml::encode($data->news_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_ad')); ?>:</b>
	<?php echo CHtml::encode($data->news_ad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode($data->add_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_content')); ?>:</b>
	<?php echo CHtml::encode($data->news_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />


</div>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pic_id), array('view', 'id'=>$data->pic_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_path')); ?>:</b>
	<?php echo CHtml::encode($data->pic_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_desc')); ?>:</b>
	<?php echo CHtml::encode($data->pic_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_name')); ?>:</b>
	<?php echo CHtml::encode($data->pic_name); ?>
	<br />
</div>

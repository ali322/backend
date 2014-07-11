<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('act_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->act_id), array('view', 'id'=>$data->act_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('act_name')); ?>:</b>
	<?php echo CHtml::encode($data->act_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('act_content')); ?>:</b>
	<?php echo CHtml::encode($data->act_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode($data->add_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brands')); ?>:</b>
	<?php echo CHtml::encode($data->brands); ?>
	<br />


</div>
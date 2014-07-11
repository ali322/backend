<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_id')); ?>:</b>
	<?php echo CHtml::encode($data->main_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ext_condition')); ?>:</b>
	<?php echo CHtml::encode($data->ext_condition); ?>
	<br />


</div>
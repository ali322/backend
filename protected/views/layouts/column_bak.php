<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-19">
		<div id="content" style='padding:3px;'>
                    <?php $this->beginWidget('ext.easyui.EasyuiPanel',array('options'=>
                            array(
                             //   'title'=>CHtml::encode($this->action->id)
                            )
                         ))?>
			<?php echo $content; ?>
                    <?php $this->endWidget();?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>

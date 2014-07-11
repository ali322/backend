<div class="easyui-accordion" style="width:158px;" fit='true'>
	<div title="<?php echo Yii::t('admin','outlets admin') ;?>" iconCls="icon-according">
            <?php $this->widget('EasyuiTree',array('items'=>$accordings['outlets_admin'],'js'=>$js,'htmlOptions'=>array('id'=>'outlets_admin')));?>
        </div>
    	<div title="<?php echo Yii::t('admin','webshop admin') ;?>" iconCls="icon-according" selected="true">
            <?php $this->widget('EasyuiTree',array('items'=>$accordings['webshop_admin'],'js'=>$js,'htmlOptions'=>array('id'=>'webshop_admin')));?>
	</div>
        <div title="<?php echo Yii::t('admin','image admin') ;?>" iconCls="icon-according">
            <?php $this->widget('EasyuiTree',array('items'=>$accordings['image_admin'],'js'=>$js,'htmlOptions'=>array('id'=>'image_admin')));?>
	</div>
        <div title="<?php echo Yii::t('admin','project admin') ;?>" iconCls="icon-according">
            <?php $this->widget('EasyuiTree',array('items'=>$accordings['project_admin'],'js'=>$js,'htmlOptions'=>array('id'=>'project_admin')));?>
	</div>
</div>
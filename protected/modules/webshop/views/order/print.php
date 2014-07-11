<table width="600" border="0" align="left" cellpadding="0" cellspacing="0" id="pagebreak">
  <tr>
    <td><div align="center"><strong>奥莱销售单</strong></div></td>
  </tr>
  <tr>
    <td>销售日期：</td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td  colspan="2"  nowrap><p>订单号 </p></td>
        <td  colspan="3"  nowrap><p><?php echo $model->order_sn?>&nbsp;</p></td>
        <td   nowrap><p>收货人 </p></td>
        <td  colspan="2"  nowrap><p><?php echo isset($consignee[0])?$consignee[0]:''; ?></p></td>
        <td  colspan="3"  nowrap><p>顾客签收 </p></td>
        <td  colspan="2"  nowrap><p>&nbsp; </p></td>
      </tr>
      <tr>
        <td  colspan="2"  nowrap><p>下单日期 </p></td>
        <td  colspan="3"  nowrap><p><?php echo date('Y-m-d',$model->add_time);?>&nbsp; </p></td>
        <td   nowrap><p>发货日期 </p></td>
        <td  colspan="2"  nowrap><p>&nbsp;</p></td>
        <td colspan="3"  nowrap><p>顾客电话 </p></td>
        <td  colspan="2"  nowrap><p><?php echo isset($consignee[3])?$consignee[3]:''; ?>&nbsp;</p></td>
      </tr>
      <tr>
        <td  colspan="2"  nowrap><p>收货信息 </p></td>
        <td  colspan="11" ><p>&nbsp;<?php echo isset($consignee[1])?$consignee[1]:''; ?></p></td>
      </tr>
      <tr>
        <td  colspan="3"  nowrap><p>顾客附加要求及建议 </p></td>
        <td  colspan="10" ><p><?php echo isset($consignee[4])?$consignee[4]:'';?>&nbsp;</p></td>
      </tr>
      <tr>
        <td  colspan="3"  nowrap><p>商品条码 </p></td>
        <td  colspan="4"  nowrap><p>商品名称 </p></td>
        <td  colspan="2"  nowrap><p>规格，型号，颜色 </p></td>
        <td  nowrap><p>数量 </p></td>
        <td colspan="2"  nowrap><p>单价 </p></td>
        <td   nowrap><p>小计 </p></td>
      </tr>
      <?php foreach (CJavaScript::jsonDecode($model->good_info) as $row):?>
    <tr>
    <td colspan="3"><p><?php echo $row['good_id'];?></p></td>
    <td  colspan="4"  nowrap><p><?php echo $row['good_name'];?></p></td>
    <td  colspan="2"  nowrap><p><?php echo $row['good_color'];?>&nbsp;,&nbsp;<?php echo $row['good_weight'];?></p></td>
    <td  nowrap><p><?php echo $row['good_number'];?></p></td>
    <td colspan="2"  nowrap><p><?php echo $row['shop_price'];?></p></td>
    <td   nowrap><p><?php echo $row['good_amount'];?></p></td>
    </tr>
    <?php endforeach;?>
      <tr>
        <td   nowrap><p>商品合计 </p></td>
        <td  colspan="3" ><p><?php echo $model->good_amount; ?>&nbsp;(优惠金额:&nbsp;<?php echo $model->bonus_fee;?>)</p></td>
        <td  colspan="3"  nowrap><p>配送/包装费 </p></td>
        <td  colspan="2" ><p><?php echo $model->ship_fee;?>&nbsp;</p></td>
        <td colspan="3"  nowrap><p>订单总价 </p></td>
        <td  ><p><?php echo $model->order_amount;?>&nbsp;</p></td>
      </tr>
	<?php if($model->pay_name=='货到付款'){ ?>
		 <tr>
			<td   nowrap><p>支付方式 </p></td>
			 <td  colspan="3" ><p><?php echo $model->pay_name;?>&nbsp;</p></td>
			<td  colspan="3"  nowrap><p>应收现金 </p></td>
			<td  colspan="2" ><p><?php echo $model->order_amount;?>元&nbsp;</p></td>
			<td  colspan="3"  nowrap><p>实收现金 </p></td>
			<td ><p>&nbsp;</p></td>
		</tr>
		<?php }else{ ?>
		<tr>
        <td   nowrap><p>支付方式 </p></td>
			<td  colspan="12" ><?php echo $model->pay_name;?>:&nbsp;<?php echo $model->order_amount;?>元(<?php echo $model->pay_status==1?'已支付':'未支付';?>)</td>
		</tr>
		<?php }?>
    </table>
<p>友阿奥特莱斯网购商城-www.9448.net&nbsp;&nbsp;配送人员:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;付款时间:&nbsp;<?php echo date('Y年m月d日 H:i',$model->pay_time);?></p>
<?php
Yii::app()->clientScript->registerScript('order_print',"
    window.print();
",  CClientScript::POS_LOAD)
?>
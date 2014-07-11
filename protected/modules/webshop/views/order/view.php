<div class="genorder_wrap">
<div class="genorder_box">
    <div class='go_consignee'>
        <h3>收货信息</h3>
            <span class="consignee_show"><?php echo $model->consignee_info;?></span>
    </div>
    <div class='go_shipment'>
            <h3>送货方式</h3>
            <span class="ship_show"><?php echo $model->ship_name;?></span>
    </div>
    <div class='go_payment'>
            <h3>支付方式</h3>
            <span class="payment_show"><?php echo $model->pay_name;?></span>
    </div>
     <div class='go_goods'>
            <h3>购物清单:</h3>
            <?php $this->widget('OrderGoods',array('cart'=>CJavaScript::jsonDecode($model->good_info)));?>
     </div>
     <div class="go_sum">
            <p class='good_amount'>商品金额总计:￥<?php echo $model->good_amount;?></p>
            <p class='ship_fee'>运费:￥<?php echo $model->ship_fee;?></p>
            <p class='bonus_fee'>优惠金额:￥<?php echo $model->bonus_fee;?></p>
            <p class='order_amount'>订单总金额:<b>￥<?php echo $model->order_amount;?></b></p>
            <p class='print_order'><?php echo CHtml::link('打印',  Yii::app()->createUrl('webshop/order/print',array('id'=>$model->id)));?></p>
     </div>
</div>
</div>


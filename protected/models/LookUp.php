<?php
class LookUp{
  public static $dicList=array(
        'order_status'=>array(
            0=>'新订单',
            1=>'已打印',
            2=>'已完成',
            4=>'已退单',
        ),
        'pay_status'=>array(
            0=>'未付款',
            1=>'已付款',
         ),
         'default'=>array(
            '否',
            '是',
         ),
         'is_on_sale'=>array(
            '否',
            '是',
         ),
         'is_recommend'=>array(
            '否',
            '是',
         ),
         'in_shop'=>array(
            '否',
            '是',
         )
    );
    
  public static function getItem($value,$key='default'){
          return self::$dicList[$key][$value];
    }

  public static function orderBtn($model){
      Yii::import('application.modules.webshop.models.Shop');
      $btn='';
      if($model->pay_status==0)
            $btn.=CHtml::link('付款',  Shop::getRedirectUrl($model)).'&nbsp;|&nbsp;';
      $btn.=CHtml::link('退单',array('delete', 'id'=>$model->id),array('class'=>'del_order'));
      
      return $btn;
  }
}
?>

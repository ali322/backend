<?php

/**
 * DxhEditor class file.
 *
 * @author dufei22 <dufei22@gmail.com>
 * @version 0.1 (2010-8-6)
 * @requires xhEditor 1.0.0 final
 * <pre>
	$this->widget('ext.dxheditor.DxhEditor', array(
		'model'=>$model,
		'attribute'=>'vContent',
		'htmlOptions'=>array('style'=>'width: 95%; height: 300px;'),
		'language'=>'en',//默认'zh-cn'
		'options'=>array(
			'upMultiple'=>2,
			'upLinkUrl'=>'{editorRoot}upload.php',//请修改upload.php中相应保存目录或使用自己的upload服务端。
			'upLinkExt'=>'zip,rar.txt,doc,xls,ppt,docx,xlsx,pptx',
			'upImgUrl'=>'{editorRoot}upload.php',
			...
		),
	));
 * </pre>
 */

class KindEditor extends CInputWidget
{
	/**
	 * @var string 语言id，可选项(e.g. 'en', 'zh-cn', 'zh-tw')；如果没有设置，默认使用zh-cn。
	 */
	public $language;
	/**
	 * @var array 输入框textarea的html选项。
	 */
	public $htmlOptions=array();
	/**
	 * @var array xheditor的选项。
	 */
	public $options=array();
	/**
	 * @var string 有数据模型时的模型名
	 */
	public $model;
	/**
	 * @var string 有数据模型时的模型属性名
	 */
	public $attribute;
	/**
	 * @var string 输入框textarea的名字，设置这个值就优先于model和attribute生成的名字
	 */
	public $name;
	public $value;
        
        protected $cs;


	public function run()
	{
                $this->cs=Yii::app()->getClientScript();
                if(!$this->cs->isScriptRegistered('jquery'))
		  Yii::app()->clientScript->registerCoreScript('jquery');
		list($name,$id)=$this->resolveNameID();

		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];
		else
			$this->htmlOptions['name']=$name;

		if($this->hasModel())
			echo CHtml::activeTextArea($this->model,$this->attribute,$this->htmlOptions);
		else
			echo CHtml::textArea($name,$this->value,$this->htmlOptions);

		if(is_null($this->language))
			$this->language='zh-cn';

		$path = dirname(__FILE__).DIRECTORY_SEPARATOR.'source';
		$baseUrl = Yii::app()->getAssetManager()->publish($path);

		$this->options['id']=$id;
		$options=CJavaScript::encode($this->options);
		$jsFile=$baseUrl.'/kindeditor.js';
	//	echo CHtml::scriptFile($jsUrl);
        //			if(!$this->cs->isScriptFileRegistered($jsFile))
                if(!$this->cs->isScriptFileRegistered($jsFile))
		        $this->cs->registerScriptFile($jsFile,CClientScript::POS_HEAD);
		//$js="loadJS('$jsUrl');";
		$new_js="KE.show($options);";
	//	$cs = Yii::app()->getClientScript();
		//$cs->registerScript('loadJs', $loadJs);
		$this->cs->registerScript('newJs', $new_js,CClientScript::POS_READY);
		//$cs->registerScript(__CLASS__.'#'.$id, $js);
	}
}

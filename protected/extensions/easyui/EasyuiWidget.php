<?php
/*jqueryeasy ui 初始类(不用easyload)*/
class EasyuiWidget extends CInputWidget{
        /*风格*/
	public $theme;
	/*语言*/
	public $lang;
        
	/*clientScript变量*/
	protected $cs;
		
	public function init(){
		$this->easyloadScripts();
	}
        
	private function easyloadScripts(){
                $baseUrl=Yii::app()->assetManager->publish(Yii::getPathOfAlias('ext.easyui.resources'));
                
		$this->cs=Yii::app()->getClientScript();

                $this->theme=$this->theme==null?'gray':$this->theme;
		$this->lang=$this->lang==null?'zh_CN':$this->lang;
                
                $themeUrl=$baseUrl.'/themes';
                $coreJsFile=$baseUrl."/jquery-1.7.1.min.js";
                $jsFile=$baseUrl."/jquery.easyui.min.js";
                $langFile=$baseUrl.'/locale/easyui-lang-'.$this->lang.'.js';
                $iconCss=$themeUrl.'/icon.css';
                $customizeCss=$themeUrl.'/customize.css';
                $mainCss=$themeUrl.'/'.$this->theme.'/easyui.css';
                
                /*注册easyui样式文件*/
                if(!$this->cs->isCssFileRegistered($mainCss))
                        $this->cs->registerCssFile($mainCss);
                
                /*注册图标样式文件*/
                if(!$this->cs->isCssFileRegistered($iconCss))
                        $this->cs->registerCssFile($iconCss);
                
                /*注册自定义样式文件*/
                if(!$this->cs->isCssFileRegistered($customizeCss))
                        $this->cs->registerCssFile($customizeCss);
                
                /*注册jquery核心文件*/
		if(!$this->cs->isScriptRegistered('jquery'))
                        $this->cs->registerScriptFile($coreJsFile,CClientScript::POS_HEAD);
		//	$this->cs->registerCoreScript('jquery');
                
                /*注册easyui核心文件*/
		if(!$this->cs->isScriptFileRegistered($jsFile))
		        $this->cs->registerScriptFile($jsFile,CClientScript::POS_HEAD);
             
                /*注册本地化文件*/
                if(!$this->cs->isScriptFileRegistered($langFile))
		        $this->cs->registerScriptFile($langFile,CClientScript::POS_HEAD);
	}
}
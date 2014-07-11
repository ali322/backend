<?php
/*jqueryeasy ui 初始类*/
class EasyuiWidget extends CInputWidget{
//	资源asset文件夹
	public $baseUrl;
	
	public $theme;
	
	public $lang;
	
	protected $cs;
	
	public $htmlOptions=array();
	
	
	public function init(){
		$this->resolvePackagePath();
		$this->easyloadScripts();
	}
	
	public function resolvePackagePath(){
		if ($this->baseUrl==null)
			$this->baseUrl=Yii::app()->assetManager->publish(Yii::getPathOfAlias('ext.easyui.resources'));
	}
	
	public function easyloadScripts(){
		$this->cs=Yii::app()->getClientScript();

                $this->theme=$this->theme==null?'gray':$this->theme;
		$this->lang=$this->lang==null?'zh_CN':$this->lang;
                
                $themeUrl=$this->baseUrl.'/themes';
                $jsFile=$this->baseUrl."/easyloader.js";
                $iconCss=$themeUrl.'/icon.css';
           //     $mainCss=$themeUrl.'/'.$this->theme.'/easyui.css';
                
		if(!$this->cs->isScriptRegistered('jquery'))
			$this->cs->registerCoreScript('jquery');
		if(!$this->cs->isScriptFileRegistered($jsFile))
		        $this->cs->registerScriptFile($jsFile,CClientScript::POS_HEAD);
                /*
                if(!$this->cs->isCssFileRegistered($mainCss))
                        $this->cs->registerCssFile($mainCss,CClientScript::POS_HEAD);
                 */
                if(!$this->cs->isCssFileRegistered($iconCss))
                        $this->cs->registerCssFile($iconCss);
		/*
	
		$this->cs->registerScript(__CLASS__,"
			easyloader.locale = '{$this->lang}'; // 本地化设置
                        easyloader.theme = '{$this->theme}'; // 设置主题
		",CClientScript::POS_READY);
                 * 
                 */
	//	echo $this->js;
	}
}
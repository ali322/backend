<?php
/**
 * EAjaxUpload class file.
 * This extension is a wrapper of http://valums.com/ajax-upload/
 *
 * @author Vladimir Papaev <kosenka@gmail.com>
 * @version 0.1
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

/**
        How to use:

        view:
		 $this->widget('ext.EAjaxUpload.EAjaxUpload',
                 array(
                       'id'=>'uploadFile',
                       'config'=>array(
                                       'action'=>'/controller/upload',
                                       'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                                       'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                                       'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                                       //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
                                       //'messages'=>array(
                                       //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                       //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                       //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                       //                  'emptyError'=>"{file} is empty, please select files again without it.",
                                       //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                       //                 ),
                                       //'showMessage'=>"js:function(message){ alert(message); }"
                                      )
                      ));

        controller:

	public function actionUpload()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	        
                $folder='upload/';// folder for uploaded files
                $allowedExtensions = array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder);
                $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                echo $result;// it's array
	}

*/
class EAjaxUpload extends CWidget
{
        public $model;
        public $attribute;
        public $multiple;
        public $gallery;
     //   public $extAttribute;
        
        public $id="fileUploader";
	public $postParams=array();
	public $config=array();
	public $css=null;

        
        public function run()
        {
		if(empty($this->config['action']))
		{
		      throw new CException('EAjaxUpload: param "action" cannot be empty.');
                }

		if(empty($this->config['allowedExtensions']))
		{
		      throw new CException('EAjaxUpload: param "allowedExtensions" cannot be empty.');
                }

		if(empty($this->config['sizeLimit']))
		{
		      throw new CException('EAjaxUpload: param "sizeLimit" cannot be empty.');
                }

                unset($this->config['element']);

                echo '<div id="'.$this->id.'"><noscript><p>Please enablez JavaScript to use file uploader.</p></noscript></div>';

                echo CHtml::tag('div',array('class'=>'qq-upload-window','style'=>'display:none;'),false,true);
                echo CHtml::activeHiddenField($this->model,$this->attribute,array('class'=>$this->attribute));
                
                $this->multiple=isset($this->multiple)?$this->multiple:false;
              //  echo $this->multiple;
                if($this->multiple)
                    echo CHtml::hiddenField('multiple',$this->multiple,array('class'=>$this->attribute.'_multiple'));
                   
                $this->gallery=isset($this->gallery)?$this->gallery:'row_updated_list';
                
		$postParams = array('PHPSESSID'=>session_id(),'YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken);
		if(isset($this->postParams))
		{
				$postParams = array_merge($postParams, $this->postParams);
		}

		$config = array(
                                'element'=>'js:document.getElementById("'.$this->id.'")',
                                'debug'=>false,
                                'multiple'=>false,
                                'onComplete'=>"js:function(id, fileName, responseJSON){
                                     if(responseJSON.success){
                                         $('.qq-upload-success').eq(id).fadeOut();
                                         $('.qq-upload-window').html('<img style=\"height:255px;width:255px\" src=\"".Yii::app()->request->baseUrl."/..'+responseJSON.filename+'\">').show().window({
                                                            title:'上传成功',
                                                            width:240,  
                                                            height:260,
                                                            closable:true,
                                                            minimizable:false,
                                                            maximizable:false,
                                                            collapsible:false, 
                                                            doSize:true, 
                                                            modal:true
                                          }); 
                                          var mF='{$this->attribute}'+'_multiple';
                                          var lH='<li>'+'<img src=\"".Yii::app()->request->baseUrl."/..'+responseJSON.filename+'\">'+'</li>'
                                          if($('.'+mF).val() == true){
                                              $('.{$this->gallery}').append(lH);
                                              var fN=$('.{$this->attribute}').val();
                                              if(fN='')
                                                $('.{$this->attribute}').val(responseJSON.filename);
                                              else{
                                                    fN=fN+',';
                                                    $('.{$this->attribute}').val(fN.concat(responseJSON.filename));
                                                }
                                          }else{
                                              $('.{$this->gallery}').html(lH);
                                              $('.{$this->attribute}').val(responseJSON.filename);
                                          }
                                     }else{
                                              $.messager.alert('".Yii::t('easyui', 'Warning')."',responseJSON.error,'warning');
                                     }
                                }",
                                'messages'=>array(
                                                         'typeError'=>"{file} 格式错误. 只有允许 {extensions} 格式.",
                                                         'sizeError'=>"{file} 太大, 最大允许 {sizeLimit}.",
                                                         'minSizeError'=>"{file} 太小,至少要求  {minSizeLimit}.",
                                                         'emptyError'=>"{file} 为空, 请重新选择.",
                                                         'onLeave'=>"文件上传中,请勿终止."
                                                        ),
                                'showMessage'=>"js:function(message){ 
                                               $.messager.alert('".Yii::t('easyui', 'Warning')."',message,'warning');
                                 }"                 
                               );
		$config = array_merge($config, $this->config);
		$config['params']=$postParams;
		$config = CJavaScript::encode($config);
                
                $assets = dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
                $baseUrl = Yii::app()->assetManager->publish($assets);

                $this->css=(!empty($this->css))?$this->css:$baseUrl.'/fileuploader.css';
                echo CHtml::cssFile($this->css);
          //      Yii::app()->clientScript->registerCssFile($this->css,CClientScript::POS_LOAD);
                $loadJs="
		function loadJS(url,callback,charset)
		{
			var script = document.createElement('script');
			script.onload = script.onreadystatechange = function ()
			{
				if (script && script.readyState && /^(?!(?:loaded|complete)$)/.test(script.readyState)) return;
				script.onload = script.onreadystatechange = null;
				script.src = '';
				script.parentNode.removeChild(script);
				script = null;
				if(callback)callback();
			};
			script.charset=charset || document.charset || document.characterSet;
			script.src = url;
			try {document.getElementsByTagName('head')[0].appendChild(script);} catch (e) {}
		}
		";
                $jsUrl=$baseUrl.'/fileuploader.js';
                $js="loadJS('$jsUrl',function(){var FileUploader_{$this->id}=new qq.FileUploader($config);});";
                $cs = Yii::app()->getClientScript();
		$cs->registerScript('loadJs', $loadJs);
		$cs->registerScript(__CLASS__.'#'.$this->id, $js);
	}


}
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
class EAjaxUpload extends CInputWidget
{
        public $model;
        public $attribute;
        public $multiple;
        public $gallery;
        
	public $postParams=array();
	public $config=array();
	public $css=null;

        
        public function run()
        {
                list($name,$id)=$this->resolveNameID();
                if(isset($this->htmlOptions['id']))
                    $id=$this->htmlOptions['id'];
                else
                    $this->htmlOptions['id']=$id;
                if(isset($this->htmlOptions['name']))
                    $name=$this->htmlOptions['name'];
                
                /*构建唯一ID*/
                $id=$id.'_'.$this->owner->action->id;
     
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

                echo '<div id="'.$id.'"><noscript><p>Please enablez JavaScript to use file uploader.</p></noscript></div>';
		$assets = dirname(__FILE__).'/assets';
                $baseUrl = Yii::app()->assetManager->publish($assets);

            //    echo CHtml::scriptFile($baseUrl . '/fileuploader.js');
                $baseJs=$baseUrl . '/fileuploader.js';
                if(!Yii::app()->clientScript->isScriptFileRegistered($baseJs))
                    Yii::app()->clientScript->registerScriptFile($baseJs, CClientScript::POS_END);

                $this->css=(!empty($this->css))?$this->css:$baseUrl.'/fileuploader.css';
         //       if(!Yii::app()->clientScript->isCssFileRegistered($this->css))
                echo CHtml::cssFile($this->css);
                //    Yii::app()->clientScript->registerCssFile($this->css,CClientScript::POS_END);

                echo '<div class="qq-upload-window-'.$id.'" style="display:none;"></div>';
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
                                'element'=>'js:document.getElementById("'.$id.'")',
                                'debug'=>false,
                                'multiple'=>false,
                                'onComplete'=>"js:function(id, fileName, responseJSON){
                                     if(responseJSON.success){
                                         $('.qq-upload-success').eq(id).fadeOut();
                                         $('.qq-upload-window-{$id}').html('<img style=\"height:255px;width:255px\" src=\"".Yii::app()->request->baseUrl."/..'+responseJSON.filename+'\">').show().window({
                                                            title:'上传成功',
                                                            width:240,  
                                                            height:260,
                                                            minimizable:false,
                                                            maximizable:false,
                                                            collapsible:false 
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
                Yii::app()->clientScript->registerScript("FileUploader_".$id, "var FileUploader_".$id." = new qq.FileUploader($config); ",CClientScript::POS_READY);
	}


}
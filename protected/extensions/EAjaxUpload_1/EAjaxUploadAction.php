<?php

Yii::import("ext.EAjaxUpload.qqFileUploader");

class EAjaxUploadAction extends CAction
{
        public $category;
        public $thumbed;
        
        public function run()
        {
            Yii::import("ext.EAjaxUpload.qqFileUploader");
            $this->category=isset($this->category)?$this->category:'webshop/good_img';
            $this->thumbed=isset($this->thumbed)?$this->thumbed:true;
            $folder=is_dir('../upload/'.$this->category.'/'.date('Ymd',time()))?'../upload/'.$this->category.'/'.date('Ymd',time()):mkdir('../upload/'.$this->category.'/'.date('Ymd',time()));
            $folder=$folder.'/';
            $allowedExtensions = array("jpg"); //array("jpg","jpeg","gif","exe","mov" and etc...
            $sizeLimit = 3* 1024 * 1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder,true);
            if($result['success']){
                $target_file='/upload/'.$this->category.'/'.date('Ymd',time()).'/'.$result['filename'];
                if($this->thumbed){
                    $thumb_file=ImageHelper::thumb(120,120,$target_file,array('method' => 'adaptiveResize'));
                    $result['thumbname']=$thumb_file;
                    $result['filename']=$target_file;
                  }else{
                    $result['thumbname']=$target_file;
                    $result['filename']=$target_file;
                  }
            }

            $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
            echo $result;// it's array
        }
}

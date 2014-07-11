<?php
/**
 * Image helper functions
 * 
 * @author Chris
 * @link http://con.cept.me
 */
class ImageHelper {

    /**
     * Directory to store thumbnails
     * @var string 
     */
    const THUMB_DIR = '.tmb';

    /**
     * Create a thumbnail of an image and returns relative path in webroot
     * the options array is an associative array which can take the values
     * quality (jpg quality) and method (the method for resizing)
     *
     * @param int $width
     * @param int $height
     * @param string $img
     * @param array $options
     * @return string $path
     */
    public static function thumb($width, $height, $img, $options = null)
    {
        $img='..'.$img;
        if(!file_exists($img)){
                 throw new CHttpException(404,"Image {$img} not found");
        }

        // Jpeg quality
        $quality = 80;
        // Method for resizing
        $method = 'adaptiveResize';

        if($options){
            extract($options, EXTR_IF_EXISTS);
        }

        $pathinfo = pathinfo($img);
      //  CVarDumper::dump($pathinfo);exit;
        $thumb_name = $pathinfo['filename'].'_thumb.'.$pathinfo['extension'];
        $thumb_path = $pathinfo['dirname'].'/';
        
        if(!file_exists($thumb_path.$thumb_name) || filemtime($thumb_path.$thumb_name) < filemtime($img)){
            
            Yii::import('ext.phpThumb.PhpThumbFactory');
            $options = array('jpegQuality' => $quality);
            $thumb = PhpThumbFactory::create($img, $options);
            $thumb->{$method}($width, $height);
            $thumb->save($thumb_path.$thumb_name);            
        }
        
        $relative_path = str_replace('..', '', $thumb_path.$thumb_name);
        return $relative_path;
    }
}
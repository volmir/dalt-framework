<?php

namespace Model;

class Image extends \Core\Model {
    /**
     *
     * @var array 
     */
    public static $types = [
        'image/jpeg', 
        'image/jpg', 
        'image/gif', 
        'image/png'
    ];
    /**
     *
     * @var string
     */
    public $path = '/static/upload/';

    /**
     * 
     * @param array $params
     * @return boolean
     */
    public function upload($params) {        
        if (!$this->resize($params)) {
            return false;
        }	
        
        $uploadfile = ROOT_PATH . $this->path . basename($params['name']);
        if (move_uploaded_file($params['tmp_name'], $uploadfile)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @return array
     */
    public static function getCorrectTypes() {
        return static::$types;
    }
    
    /**
     * 
     * @param string $type
     * @return string
     */
    public static function getImageExt($type) {
        $ext = '';        
        if ($type == 'image/jpeg' || $type == 'image/jpg') {
            $ext = '.jpg';
        }
        elseif ($type == 'image/gif') {
            $ext = '.gif';
        }
        elseif ($type == 'image/png') {
            $ext = '.png';
        }        
        return $ext;
    }
    
    /**
     * 
     * @param array $file
     * @param int $rotate
     * @param int $quality
     * @param int $max_size
     * @return boolean
     */
    public function resize($file, $rotate = null, $quality = 75, $max_size = 320) {
        if ($file['type'] == 'image/jpeg') {
            $source = imagecreatefromjpeg($file['tmp_name']);
        } elseif ($file['type'] == 'image/png') {
            $source = imagecreatefrompng($file['tmp_name']);
        } elseif ($file['type'] == 'image/gif') {
            $source = imagecreatefromgif($file['tmp_name']);
        } else {
            return false;
        }

        if ($rotate != null) {
            $src = imagerotate($source, $rotate, 0);
        } else {
            $src = $source;
        }

        $w_src = imagesx($src);
        $h_src = imagesy($src);

        $w = $max_size;

        if ($w_src > $w) {
            $ratio = $w_src / $w;
            $w_dest = round($w_src / $ratio);
            $h_dest = round($h_src / $ratio);

            $dest = imagecreatetruecolor($w_dest, $h_dest);

            imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);

            imagejpeg($dest, $file['tmp_name'], $quality);
            imagedestroy($dest);
            imagedestroy($src);

            return $file['tmp_name'];
        } else {
            imagejpeg($src, $file['tmp_name'], $quality);
            imagedestroy($src);

            return $file['tmp_name'];
        }
    }

}

<?php namespace App\Libraries;


class MediaManager
{

    protected $path;
    protected $file_name;
    public $fullpath;
    public $width;
    public $height;

    public function __construct() {
        $this->path = 'uploads/';
    }

    /**
     * Upload file
     *
     * @param $file
     * @param string $upload_path
     * @return string
     */
    public function upload($file, $upload_path = '/') {
        $this->setPath($upload_path);
        if(!is_dir($this->path)) {
            \Storage::makeDirectory($this->path);
        }
        $this->setFileName($file);
        $file->move($this->getPath(), $this->getFileName());
        return $this->getPath() .'/'. $this->getFileName();
    }

    /**
     * Upload file
     *
     * @param $file
     * @param string $upload_path
     * @return string
     */
    public function uploadFile($file, $upload_path = '/') {
        return $this->upload($file, $upload_path);
    }

    /**
     * Upload image via Image library
     *
     * @param $file
     * @param string $upload_path
     * @return string
     */
    public function uploadImage($file, $upload_path = '/') {
        $this->setPath($upload_path);
        if(!is_dir($this->path)) {
            \Storage::makeDirectory($this->path);
        }
        $this->setFileName($file);
        $img = \Image::make($file)->save($this->getPath() .'/'. $this->getFileName(), 100);
        $this->fullpath = $this->getPath() .'/'. $this->getFileName();
        $this->width = $img->width();
        $this->height= $img->height();
        return $this->getPath() .'/'. $this->getFileName();
    }

    /**
     * Crop image
     *
     * @param $path
     * @param $cropW
     * @param $cropH
     * @param $x
     * @param $y
     * @param int $resize
     * @return string
     */
    public function cropImage($path, $cropW, $cropH, $x, $y, $resize = 0) {
        $path = ltrim($path, '/');
        $image = \Image::make($path);

        if( (int)$resize > 0 ) $image->resize((int)$cropW, (int)$cropH);

        $image->crop((int)$cropW, (int)$cropH,(int)$x, (int)$y);
        unlink($path);

        $file_name = $image->filename .'cr.' . $image->extension;
        $new_path = $image->dirname . '/' . $file_name;
        $image->save($new_path, 100);
        return $new_path;
    }

    public function setPath($upload_path) {
        $this->path = 'uploads/' . trim($upload_path, '/');
    }

    public function setFileName($file) {
        $this->file_name = date("YmdHis") . '' . str_random(5) .'.'. $file->getClientOriginalExtension();
    }
    public function getPath() {
        return $this->path;
    }
    public function getFileName() {
        return $this->file_name;
    }
}
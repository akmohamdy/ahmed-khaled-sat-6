<?php 

class Image{
    public $file,$fileName,$fileType,$fileTmp,$fileErr,$fileSize,$ext,$fileNewName;
    public function __construct($file)
    {
        $this->file=$file;
        $this->fileName = $this->file['name'];
        $this->fileType = $this->file['type'];
        $this->fileTmp = $this->file['tmp_name'];
        $this->fileErr = $this->file['error'];
        $this->fileSize = $this->file['size'];
    }
    public function validate(){
        $this->ext=strtolower(pathinfo($this->fileName,PATHINFO_EXTENSION));
        if(!in_array($this->ext,["jpeg","jpg","png","gif"])){
           return false;
        }else{
            return true;
        }
    }
    public function rename(){
        $randomStr=uniqid();
        $this->fileNewName= $randomStr.".".$this->ext;
        return $this;
    }
    public function upload(){
        move_uploaded_file($this->fileTmp,"uploads/$this->fileNewName");
    }
}

?>
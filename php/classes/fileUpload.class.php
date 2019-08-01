<?php
    class fileUpload {
        private $target_dir, $target_file, $file_name, $file_mime, $max_file_size, $file_allowed_mime;
        private $uplOk = array(false, "Not Processed");
        public function uploadFile($filePostName, $dirToUpload, $allowedMime, $maxFileSize) {
            $this->target_dir = $dirToUpload;
            $this->file_name = $filePostName;
            $this->max_file_size = $maxFileSize;
            $this->file_allowed_mime = $allowedMime;
            $this->target_file = $this->target_dir . basename($_FILES[$fileName]["name"]);
            $this->file_mime = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
            if($this->checkFileSize()) {
                if($this->checkFileMIME()) {
                    $this->target_file = $this->target_dir."/".date('d-m-Y',time())."-".rand(100000,999999)."-".basename($_FILES[$fileName]["name"]);
                    if($this->moveToDirectory()) {
                        return array(true, $this->target_file);
                    } else {
                        return array(false, "Failed to upload file.");
                    }
                } else {
                    return array(false, "This file is not allowed to upload, check the manual for allowed files to upload");
                }


            } else {
                return array(false, "File size exceeds ".$this->max_file_size);
            }
            return false(false, "Failed to upload file.");
        } 
        private function checkFileSize() {
            if ($_FILES[$this->file_name]["size"] > $this->max_file_size) {
                return false;
            }
            return true;
        }
        private function checkFileMIME() {
            foreach ($this->file_allowed_mime as $key => $value) {
                if($value == $this->file_mime) {
                    return true;
                }
            }
            return false;
        }
        private function moveToDirectory() {
            if (move_uploaded_file($_FILES[$this->file_name]["tmp_name"], $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
<?php
    class Language{
        public function __construct($language){
            $this->language = $language;
        }

        public function loadLanguage($page) {
            
            $filePath = 'application/language/en.json';//.$this->language.'.json';

            $fileRaw = fopen($filePath,'r');

            $fileData = fread($fileRaw,filesize($filePath));

            $fileJson = json_decode($fileData);

            return $fileJson->$page;
            
        }
    }
?>
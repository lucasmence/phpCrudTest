<?php

    class HtmlParser {
        public $text = null;

        public $user = null;

        public $html = null;

        public function __construct($pageName) {

            $this->user = null;

            $this->html = file_get_contents('application/html/'.$pageName.'.html');

            $this->language = new Language('en');

            $this->text = $this->language->loadLanguage($pageName.'.php');

            $this->html = str_replace('_','',$this->html);

            foreach ($this->text as $key => $value) {   
                $this->html = str_replace('$'.strtoupper($key).'$',$value,$this->html);
            }  

        }

        public function print() {
            echo $this->html;
        }

        public function setTable($type, $queryData) {
            $this->html = str_replace('$TABLEDATA'.$type.'$', $queryData, $this->html);
        }

        public function setButton($type, $caption, $link) {
            $this->html = str_replace('$BUTTONCAPTION'.$type.'$', $caption, $this->html);
            $this->html = str_replace('$BUTTONLINK'.$type.'$','"'.$link.'"', $this->html);

        }

        public function setVisibility($type, $value) {
            $text = 'hidden';
            if (!empty($value)) {
                $text = 'none';
            }
            $this->html = str_replace('$VISIBILITY'.$type.'$', $text, $this->html);
        }

        public function setAlert($type, $text) {
            $this->html = str_replace('$ALERT'.$type.'$', $text, $this->html);
        }

        public function setValue($type, $text) {
            $this->html = str_replace('$'.$type.'$', $text, $this->html);
        }

    }
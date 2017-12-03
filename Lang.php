<?php
/**
 * @author Loris Pinna http://lorispinna.com
 * @date 03.12.2017
 * @version 2.0.0
 * A class for manipulate easily i18n
 */
class Lang
{
    /**
     * @author Loris Pinna
     * @return string which contain current lang
     */
    var $userLang;
    /**
     * @author Loris Pinna
     * @return string which contain the default language
     */
    var $defaultLang = "fr";
    /**
     * @author Loris Pinna
     * @return array which contain all texts
     */
    var $texts = array();
    /**
     * @author Loris Pinna
     * @return string to set the root
     */
    var $root = "";
    /**
     * @author Loris Pinna
     * @param  $lang string set language
     */
    function __construct($lang) {
        $this->userLang = $lang;
    }

    /**
     * @author Loris Pinna
     * @return string get current lang
     */
    function getLang() {
        return $this->userLang;
    }

    /**
     * @author Loris Pinna
     * @return bool check if file exist
     * @param  $files string file name
     * @param  $lang string set language
     */
    private function isExist($files,  $lang = "") {
        if($lang == "") $lang = $this->userLang;

        return (file_exists($this->root."lang/".$lang."/".$files.".php"));
    }

    /**
     * @author Loris Pinna
     * @return string get file if exist
     * @param  $files string file name
     * @param  $lang string set language
     */
    private function getFile($files,   $lang = "") {
        if($lang == "") $lang = $this->userLang;

        return $this->isExist($files, $lang) ? ($this->root . "lang/" . $lang . "/" . $files . ".php") : $this->root . "lang/".$this->defaultLang."/" . $files . ".php";
    }
    /**
     * @author Loris Pinna
     * @return bool if all work as intended
     * @param  $files string file name
     * @param  $alternative bool if you want to load from the default language
     */
    function getTranslationFile($files = "", $alternative = false) {
        if($this->isExist($files,  $this->defaultLang)) {
            if(!$alternative)
                include($this->getFile($files, $this->defaultLang));

            include($this->getFile($files,  $this->getLang()));
            $b = get_defined_vars();

            unset($b['files']);
            unset($b['alternative']);

            foreach ($b as $key => $value) {
                $value = ($value);

                $this->texts[$key] =  ($value);
            }
            return true;
        }
        return false;
    }
    /**
     * @author Loris Pinna
     * @return string which contains the translated text
     * @param  $key string key of translation
     * @param  $args array set args for translation
     */
    function translate($key, $args = array()) {
        if(isset($this->texts[$key])){
            $text = $this->texts[$key];
            foreach ($args as $key => $value)
                $text = preg_replace("{\{$key\}}",$value,$text);
            return $text;
        }
        else
            return "$key";
    }
}

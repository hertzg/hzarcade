<?php
abstract class LOADER {

    public function loadPage($name) {
        $baseName = basename($name);
        $classPath = DIR_PAGES."/".$baseName.".page.php";
        
        if(file_exists($classPath)) {
            $tokens = token_get_all(file_get_contents($classPath));
            print_r($tokens);
            echo "\n\n".token_name(307);
            die;
            require_once($classPath);
            return true;
        }
        return null;
    }
}

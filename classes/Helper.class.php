<?php
class Helper{
    public function redirect($url){
        header("Location: {$url}");
    }
}
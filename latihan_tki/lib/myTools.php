<?php
class myTools
{
    public static function stripText($text)
    {
        $text =  strtolower($text);
        $text= preg_replace('/\w/',' ','$text');
        $text= preg_replace('/\ +/','', $text);
        $text= preg_replace('/\ -$/','', $text);
        $text= preg_replace('/^\ -/','', $text);
        return $text;
    }
}
?>
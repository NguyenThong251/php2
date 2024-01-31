<?php
namespace model;

// use core\Field;

class Form{
public static function begin($action,$method,$onsubmit,$id){
    return sprintf('
    <form action="%s" method="%s" onsubmit="%s" class="%s" >
    ',$action,$method,$onsubmit,$id);
}
public static function end(){
    return '</form>';
}
public function Field($attribute) {
    return new Field($attribute);
}
}
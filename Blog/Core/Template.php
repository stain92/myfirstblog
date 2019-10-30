<?php


namespace Core;


class Template
{
    private const TEMPLATE_PATH='Templates/';
    private const TEMPLATE_SUFFIX='.php';
    public function render(string $template_name,$data=null, $errors=[])
    {
        include_once (self::TEMPLATE_PATH.$template_name.self::TEMPLATE_SUFFIX);
    }
}
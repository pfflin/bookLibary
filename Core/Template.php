<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/5/2018
 * Time: 2:18 PM
 */

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY = "App/Templates";
    const TEMPLATE_EXTENSION = ".php";
 public function render(string $templateName, $data)
 {
     require_once self::TEMPLATE_DIRECTORY.$templateName.self::TEMPLATE_EXTENSION;
 }
}
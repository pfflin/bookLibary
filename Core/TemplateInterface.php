<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/5/2018
 * Time: 2:15 PM
 */
namespace Core;
interface TemplateInterface
{
    public function render(string $templateName,$data);
}
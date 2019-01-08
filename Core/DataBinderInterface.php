<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/6/2018
 * Time: 2:27 PM
 */

namespace Core;


interface DataBinderInterface
{
    public function bind(array $form, $className);
}
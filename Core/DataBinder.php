<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/6/2018
 * Time: 2:28 PM
 */

namespace Core;


class DataBinder implements DataBinderInterface
{

    public function bind(array $data, $className)
    {
        $class_data = new \ReflectionClass($className);
        $class = new $className;
        foreach ($class_data->getProperties() as $property){
            $name=$property->getName();
            if(isset($data[$name])){
                $t = explode("_", $name);
                $setter = 'set'.implode("",array_map(function ($n){return ucfirst($n);},$t));
                $class->$setter($data[$name]);
            }
        }
        return $class;
    }
}
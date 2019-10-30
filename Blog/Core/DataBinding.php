<?php


namespace Core;


class DataBinding
{
    /**
     * @param array $data
     * @param string $class_name
     * @return mixed
     * @throws \ReflectionException
     */
    public function bind(array $data, string $class_name)
    {
        $class_data = new \ReflectionClass($class_name);
        $class = new $class_name();
        foreach ($class_data->getProperties() as $property)
        {
            $name = $property->getName();
            if(isset($data[$property->getName()]))
            {
                $t=explode('_',$name);
                $setter = 'set'.implode('',array_map(function ($n){return ucfirst($n);},$t));
                $class->$setter($data[$name]);
            }
        }
        return $class;

    }
}
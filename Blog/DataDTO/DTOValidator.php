<?php


namespace DataDTO;


class DTOValidator
{
    /**
     * @param int $min
     * @param int $max
     * @param $value
     * @param string $type
     * @param string $fileName
     * @throws \Exception
     */
    public static function validate(int $min,int $max, $value,string $type,string $fileName)
    {
        if($type==='text') {
            if (mb_strlen($value) < $min || mb_strlen($value) > $max) {
                throw new \Exception("{$fileName} must be between {$min} and {$max} characters!");
            }
        }else if($type=='number')
            {

                if(is_numeric($value))
                {
                    if($value<$min||$value>$max)
                    {
                        throw new \Exception("{$fileName} must be between {$min} and {$max}!");
                    }
                }else {
                    throw new \Exception("Please enter number");
                }
            }
        }

    }


<?php

namespace Database;

interface ResultSetInterface
{
    public function fetchAssoc() :\Generator;
    public function fetch($className) : \Generator;
    public function getOne($className);

}
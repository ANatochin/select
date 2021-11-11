<?php

namespace Lib\DB;

class Where
{
    private $whereConditions;
    private $finalWhereString;

    public function __construct($requested)
    {
        $this->whereConditions = $requested;
        $this->finalWhereString = $this->buildWhereString();
    }

    public function getFinalWhereString():string
    {
        return $this->finalWhereString;
    }

    private function buildWhereString()
    {
        $request ='';
        if(is_string($this->whereConditions)) {
            $request .= $this->whereConditions;
        } elseif (is_array($this->whereConditions)) {
            $request .= implode(' ',$this->whereConditions);
        }
        return  $request;
    }

}
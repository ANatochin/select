<?php

namespace Lib\DB;

class Insert
{
    private string $table;
    private $fields;
    private $values;


    public function setTable($table): void
    {
        $this->table = $table;
    }

    private function getTable(): string
    {
        return $this->table;
    }

    public function setFields($fields): void
    {
        $this->fields = $fields;
    }
    private function getFields()
    {
        return $this->stringBuilder($this->fields);
    }

    public function setValues($values): void
    {
        $this->values = $values;
    }
    private function getValues()
    {
        return $this->stringBuilder($this->values);
    }

    public function getSqlInsert()
    {
        $sqlSelect = 'INSERT INTO '.$this->getTable().$this->getFields().' VALUES '.'('.$this->getValues().')';


        return $sqlSelect;
    }

    private function stringBuilder($data, $orderString=false)
    {
        $resultString = '';

        if(is_string($data)) {
            $resultString = $data;
        } elseif (is_array($data)) {
            foreach ($data as $value) {
                if(!empty($resultString)) {
                    $resultString .= ',';
                }
                $resultString .= ' ' . $value;

            }
        }
        return $resultString;
    }

}
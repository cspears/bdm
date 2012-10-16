<?php

namespace Bdm\DataFile;

class DefaultNameParser implements NameParser
{
     /**
      * @param string $fileName
      */
    public function parse($fileName)
    {
        $fileDetailsArray = array();
        preg_match('/^(\w+)_(\d{4})_(\d{2})_(\d{2})_([a-z]+)/i', $fileName, $matches);

        $fileDetailsArray = array(
            'serial'=>$matches[1],
            'date' => "$matches[2]/$matches[3]/$matches[4]",
            'type'=>$matches[5]
        );

        return $fileDetailsArray;
    }
}

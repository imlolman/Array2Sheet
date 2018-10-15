<?php

namespace App;

include("../vendor/autoload.php");
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Array2Sheet{

    public function create($array){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        foreach(array_keys($array[1]) as $key=>$k){
            $columnName = GetExcelColumnName($key+1);
            $sheet->setCellValue($columnName.'1', $k);
            foreach($array as $key=>$ar){
                $sheet->setCellValue($columnName.(string)($key+2), (string)$ar[$k]);
            }
        }

        return $spreadsheet;
    }

}


function GetExcelColumnName($columnNumber)
{
    // starts from 1
    $dividend = $columnNumber;
    $columnName = "";
    $modulo;

    while ($dividend > 0)
    {
        $modulo = ($dividend - 1) % 26;
        $columnName = chr(65 + $modulo).$columnName;
        $dividend = intdiv($dividend - $modulo,26);
    } 

    return $columnName;
}
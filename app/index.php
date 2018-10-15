<?php
include("../vendor/autoload.php");
require_once("Array2Sheet.php");
use \App\Array2Sheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$a = array();
for($i=5;$i<= 20;$i++){
    $v = array();
    $v['head1'] = "Value1".$i;
    $v['head2'] = "Value2".$i;
    $v['head3'] = "Value3".$i;
    $v['head4'] = "Value4".$i;
    $v['head5'] = "Value5".$i;
    $v['head6'] = "Value6".$i;
    array_push($a,$v);
}

$ss = new Array2Sheet();
$ss = $ss->create($a);

$writer = new Xlsx($ss);
$date = new DateTime();
$filename = 'temp/'.$date->getTimestamp().'.xlsx';
$writer->save($filename);  

header('Location: '.$filename);

?>
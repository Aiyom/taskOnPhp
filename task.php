<?php

class Actions
{
//    call file inputInt.txt
    function callFile($argv)
    {
        $base = file($argv[1]);
        $result = array();

        foreach ($base AS $row) {
            $result[] = $row;
        }
        return $result;
    }
//    convert file to array
    function numberAsFile($argv){

        // checking symbol or letter
        $arrSymbol = array('+', '-', '*', '/');
        $badge = '';
        foreach ($arrSymbol as $value){
            if ($value == $argv[2]) {
                $badge = $value;
            }
        }
//        getting number on array and performs an operation
        foreach( $this->callFile($argv) as $stringFile ){
           $list = preg_split('/ /', $stringFile);
           for ($i=0; $i<=count($list); $i+=2)
            {
                if($badge === '+'){
                    $arr[] = $list[$i] + $list[$i + 1];
                }
                elseif ($badge === '-') {
                    $arr[] = $list[$i] - $list[$i + 1];
                }
                elseif ($badge === '*') {
                    $arr[] = $list[$i] * $list[$i + 1];
                }
                elseif ($badge === '/') {
                    $arr[] = $list[$i] / $list[$i + 1];
                }
               break;
           }
        }
        return $arr;
    }

    function plus($argv){
        foreach ($this->numberAsFile($argv) AS $value){
            if ($value >= 0){
                $fileopen=fopen("positive.txt", "a+");
                $write= $value . "\r\n";
                fwrite($fileopen,$write);
                fclose($fileopen);
            }
            else
            {
                $fileopen=fopen("negative.txt", "a+");
                $write= $value . "\r\n";
                fwrite($fileopen,$write);
                fclose($fileopen);
            }
        }
        return 'Успешно выполнен!!!';
    }
}
$act = new Actions();
echo $act->plus($argv);




<?php
class Calc{
    public $result = 0; //Thuộc tính
    public $a = 0, $b = 0;

    public function makeTotal(){
        $total = $this->a + $this->b;
        $this->result = $total;
    }

    public function getResult(){
        return $this->result;
    }

    public function setA($value){
        $this->a = $value;
    }

    public function setB($value){
        $this->b = $value;
    }
}

$calc = new Calc();
$calc->setA(10);
$calc->setB(20);
$calc->makeTotal(); //Tính tổng và gán vào thuộc tính result
//echo $calc->result.'<br/>';
echo $calc->getResult().'<br/>';

$calc2 = new Calc();
$calc2->setA(50);
$calc2->setB(100);
$calc2->makeTotal();
echo $calc2->getResult().'<br/>';
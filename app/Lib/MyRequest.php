<?php


namespace App\Lib;


class MyRequest
{
    private $result;
    private $do = false;
    public function if($bool)
    {
        $this->do = $bool;
        return $this;
    }

    public function go(callable $func)
    {
        sgo(function () use($func){
            $func($this);
        });
        return $this;
    }

    public function then(callable $func)
    {
        if($this->do){
            $this->result = $func();
            $this->do = !$this->do;
        }
        //var_dump($this);
        return $this;
    }

    public function getResult()
    {
        return $this->result;
    }

}

<?php

class Model extends Bussiness
{
    public function getData()
    {
        $this->query();
        $this->fetch();
    }
}

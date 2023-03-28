<?php

abstract class BaseModel
{
    abstract protected function add();

    public function showMessage()
    {
        return 'Unicode Academy';
    }
}

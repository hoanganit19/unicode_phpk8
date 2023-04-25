<?php

namespace Core\Interfaces;

interface ValidatorInterface
{
    public static function make($request, $rules, $messages, $attributes=[]);

    public static function setMessage($messageTemplate, $attributes, $field, $variables = []);

    public function fails();

    public function passes();
}

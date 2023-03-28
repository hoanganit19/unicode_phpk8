<?php

interface AuthInterface extends ArrayAccessInterface
{
    public const MSG = 'Unicode Academy';

    public function login();

    public function register();

    public function active();
}

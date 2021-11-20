<?php

function getToken($length)
{
    $choices = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($choices, $length)), 0, $length);
}
<?php

function validateAddressController(string $path):bool
{
    $regex = '/^[a-z0-9-]+$/';
    return (bool)preg_match($regex,$path);
}
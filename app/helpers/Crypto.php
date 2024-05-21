<?php
function bcrypt($password, $options = [])
{
    if(!isset($password)) {

    } else {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

function verifyHash()
{

}
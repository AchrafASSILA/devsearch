<?php


function invalidEmail($email)
{
    if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
        return false;
    } else {
        return true;
    }
}


function isInputsEmpty($inputs)
{
    foreach ($inputs as $input) {
        if (empty($input)) {
            return true;
        }
    }
}

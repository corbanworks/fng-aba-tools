<?php

/*
FNG ABA Tools v1.0
Copyright 2012 Fake Name Generator <http://www.fakenamegenerator.com/>

FNG ABA Tools v1.0 by the Fake Name Generator is licensed to you under a
Creative Commons Attribution-Share Alike 3.0 United States License.

For full license details, please visit:
http://www.fakenamegenerator.com/license.php
*/

class fngaba
{

    public function validateABA($aba_code)
    {
        // Make sure it doesn't contain invalid characters
        if($aba_code != preg_replace('/[^0-9]/','',$aba_code)){
            return false;
        }

        // Check the length, it should be nine digits.
        if(strlen($aba_code) != 9){
            return false;
        }

        // Now run through each digit and calculate the total.
        $n = 0;
        for($i = 0; $i < 9; $i += 3) {
            $n += $aba_code[$i] * 3
            + $aba_code[$i + 1] * 7
            + $aba_code[$i + 2];
        }

        // If the resulting sum is an even multiple of ten (but not zero),
        // the aba routing number is good.
        if($n != 0 && $n % 10 == 0){
            return true;
        }else{
            return false;
        }
    }

}

/* Example usage: */

/*
// Validate ABA/routing number

$fngaba = new fngaba();

if($fngaba->validateABA(121202211)){
    echo 'Valid';
}else{
    echo 'Invalid';
}
/*


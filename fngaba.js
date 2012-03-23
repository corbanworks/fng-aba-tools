/*
FNG ABA Tools v1.0
Copyright 2012 Fake Name Generator <http://www.fakenamegenerator.com/>

FNG ABA Tools v1.0 by the Fake Name Generator is licensed to you under a
Creative Commons Attribution-Share Alike 3.0 United States License.

For full license details, please visit:
http://www.fakenamegenerator.com/license.php
*/

validateABA = function(t){
    t = String(t);
    n = 0;
    for (i = 0; i < t.length; i += 3) {
        n += parseInt(t.charAt(i),     10) * 3
          +  parseInt(t.charAt(i + 1), 10) * 7
          +  parseInt(t.charAt(i + 2), 10);
    }

    if (n != 0 && n % 10 == 0){
        return true;
    } else {
        return false;
    }
}

/* Example */

/*
alert(validateABA(121202211)); // Valid
alert(validateABA(121202210)); // Invalid
*/


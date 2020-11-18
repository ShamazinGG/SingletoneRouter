<?php
$string = "фывф5 ывфы???фывфы5???вфыв???";
function StringChallenge($string)
{

$strings = explode('???',$string);
    $a = (int)filter_var($strings[0], FILTER_SANITIZE_NUMBER_INT);
    $b = (int)filter_var($strings[1], FILTER_SANITIZE_NUMBER_INT);
    if ($a + $b == 10)
    {
        return true;
    } else {
        return false;
    }

}
StringChallenge($string);


function assertBool($string, $target) {
    if (stringChallenge($string) !== $target) {
        echo "Error on $string-> Should be " . (($target)?"true":"false") . PHP_EOL;
    } else {
        echo "Passed: $string" . PHP_EOL;
    }

}
assertBool('10', false);
assertBool('2??9', false);
assertBool('2???9', false);
assertBool('1???9', true);
assertBool('???9', false);
assertBool('2???', false);
assertBool('ff2???', false);
assertBool('fdsf1???9', true);
assertBool('1???9125tgdc', false);
assertBool('asd5???5asdasdf',  true);
assertBool('???5jngnc',  false);
assertBool('112???9', false);
assertBool('112???9???11', false);
assertBool('112???9???1', true);
assertBool('123ffff5???5fff', true);

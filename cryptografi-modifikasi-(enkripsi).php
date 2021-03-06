<?php
echo '<h1>Modifikasi Kriptografi CAESAR CIPHER BY AKHMAD SYARIF</h1>'.PHP_EOL;

$plaintext = 'KETIKA CORONA DATANG ENGKAU DIPAKSA MENCARI TUHAN';
$arrayPlaintext = array();
$plaintext1 = str_replace(' ', '', $plaintext);
$plaintext2 = explode(" ", $plaintext1);

$pemisah = strlen($plaintext1);
for ($x=0;$x<$pemisah; $x++){
    $pecah1 = substr($plaintext1,$x,1);
    // echo $pecah1.' ';
    array_push($arrayPlaintext, $pecah1);
}
echo 'Plaint Text : ' .$plaintext;
// print_r($plaintext1);
echo '<br>';
echo '<br>';
// print_r($plaintext2);
// print_r($arrayPlaintext);


$abjad = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
$abjadReves = ['Z','Y','X','W','V','U','T','S','R'];
// $key1 = ['H','A','L','O'];
$key1 = ['K','U','R','S','I'];
$key2 = ['G','U','N','M','E','R','A','P','I'];
// $key2 = ['A','N','K'];


$countAbjad = count($abjad);
$countKey1 = count($key1);
$countKey2 = count($key2);
// echo $countKey2;

echo 'Key 1 : <br>'.PHP_EOL;

for ($z=0; $z < $countKey1 ; $z++) { 
    echo $key1[$z].' ';
}
echo '<br>';

for ($i=25; $i >= 0 ; $i--) { 
    for ($a=0; $a < $countKey1 ; $a++) {         
        if ($abjad[$i] == $key1[$a]) {
            $i--;
        }
        else{
            if ($a == ($countKey1-1)) {
                // echo $abjad[$i].' ';
                array_push($key1, $abjad[$i]);
            }
        }
    } 
    // break;
}

$countKey1new = count($key1);
for ($z=0; $z < $countKey1new ; $z++) { 
    echo $key1[$z].' ';
}

echo '<br>';
echo '<br>';

// ====================
echo 'Key 2 : <br>';
for ($d=0; $d < $countKey2 ; $d++) { 
    echo $key2[$d].' ';
}
echo '<br>';

for ($f=25; $f >= 0 ; $f--) { 
    for ($b=0; $b < $countKey2 ; $b++) { 
        if ($abjad[$f] == $key2[$b]) {
            $f--;
        }
        else{
            if ($b == ($countKey2-1)) {
                // echo $abjad[$f].' ';
                array_push($key2, $abjad[$f]);
            }
        }
    } 
    // break;
}

$countKey2new = count($key2);
for ($y=0; $y < $countKey2new ; $y++) { 
    echo $key2[$y].' ';
}


echo '<br>';
echo '<br>';

// ======================
// metode 1

$countPlaintext = count($arrayPlaintext);
echo 'Metode 1 : <br>';

$chipherText1 = [];
$b=1;
for ($l=0; $l < $countPlaintext; $l++) { 
    
    for ($i=0; $i < $countAbjad ; $i++) { 
        $keyVar = 'key'.$b;
        if ($arrayPlaintext[$l] == $abjad[$i]) {
            if ($b == 1) {
                // echo $key1[$i].' ';
                array_push($chipherText1, $key1[$i]);
            }elseif ($b == 2) {
                // echo $key2[$i].' ';
                array_push($chipherText1, $key2[$i]);
            }
            $b++;  
        } 
        if ($b == 3) {
            $b = 1;
        }
    }
    // break;
}
// echo "<br>";

$countCipherText1 = count($chipherText1);
echo "Ciphertext1 = ";
for ($y=0; $y < $countCipherText1 ; $y++) { 
    echo $chipherText1[$y].' ';
}

// ======================
// metode permutasi mengganti huruf yang genap menjadi angka

echo "<br>";
$numberAbjad = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26];

$number = 1;
for ($i=0; $i < $countCipherText1 ; $i++) { 
    $genapOrNot = $number % 2;
    if ($genapOrNot == 0 ) {
        $getKarakter = $chipherText1[$i];
        for ($k=0; $k < $countAbjad ; $k++) { 
            if ($getKarakter == $abjad[$k]) {
                $getNumberAbjad = $k + 1;
                $newValue = array($i=>$getNumberAbjad);
                // echo $getNumberAbjad.' ';
                $chipherText1[$i] = $getNumberAbjad;
                break;
            }
        }
    }
    $number++;
// break;
}

echo '<br>';

$countCipherText1 = count($chipherText1);
echo "Ciphertext1 setelah dimutasi 1 = ";
for ($y=0; $y < $countCipherText1 ; $y++) { 
    echo $chipherText1[$y].' ';
}

echo '<br>';
echo '<br>';

// ======================
// convert key1 ke biner
$key1Biner = [];
// echo "key1 convert to biner = ";
for ($y=0; $y < $countKey1 ; $y++) { 
    // echo $key1[$y].' = ';
    $str = strval($key1[$y]);
    $l = strlen($str);
    $result = '';
    while ($l--) {
        $result = str_pad(decbin(ord($str[$l])), 8, "0", STR_PAD_LEFT) . $result;
        array_push($key1Biner, $result);
    }
    // print $result;
}

// ======================
// convert key2 ke biner
$key2Biner = [];
// echo "key2 convert to biner = ";
for ($y=0; $y < $countKey2 ; $y++) { 
    // echo $key2[$y].' = ';
    $str = strval($key2[$y]);
    $l = strlen($str);
    $result = '';
    while ($l--) {
        $result = str_pad(decbin(ord($str[$l])), 8, "0", STR_PAD_LEFT) . $result;
        array_push($key2Biner, $result);

    }
    // print $result;
}

// ======================
// convert chipertext1 ke biner

$chipertext1Biner = [];
$number = 1;
// echo "chipeher1 convert to biner = ";
for ($y=0; $y < $countCipherText1 ; $y++) { 
    // echo $chipherText1[$y].' = ';
    $result = '';
    $genapOrNot = $number % 2;
    if ($genapOrNot == 0 ) {
        $result = decbin(intval($chipherText1[$y]));
        $l = strlen(strval($result));
        for ($i=$l; $i <= 7 ; $i++) { 
            $result = '0'.$result;
        }
        array_push($chipertext1Biner, $result);
    }else{
        $str = strval($chipherText1[$y]);
        $l = strlen($str);
        while ($l--) {
            $result = str_pad(decbin(ord($str[$l])), 8, "0", STR_PAD_LEFT) . $result;
            array_push($chipertext1Biner, $result);
        }
    }
    $number++;
    // print $result;
}

echo 'Biner key1 = ';
print_r($key1Biner);
echo '<br>';

echo 'Biner key2 = ';
print_r($key2Biner);
echo '<br>';

echo 'Biner chipertext1 = ';
print_r($chipertext1Biner);

echo "<br>";
echo "<br>";

// ======================
// XOR key1 dan key 2

function _xor($text,$key){
    for($i=0; $i<strlen($text); $i++){
        $text[$i] = intval($text[$i])^intval($key[$i]);
    }
    return $text;
  }


$countKey1Biner = count($key1Biner);
// echo $countKey1Biner;
$XorKey1 = '';
for ($i=0; $i < $countKey1Biner; $i++) { 
    $index = $i + 1;
    if ($i > 0) {
        $XorKey1 = _xor($XorKey1,$key1Biner[$index]);
        // echo $i.' '.$XorKey1.' ';
    }else{
        $XorKey1 = _xor($key1Biner[$i],$key1Biner[$index]);
        // echo $i.' '.$XorKey1.' ';
    }   
}

echo 'Hasil Xor dari key1 = '.$XorKey1.'<br>';


$countKey2Biner = count($key2Biner);
// echo $countKey1Biner;
$XorKey2 = '';
for ($i=0; $i < $countKey2Biner; $i++) { 
    $index = $i + 1;
    if ($i > 0) {
        $XorKey2 = _xor($XorKey2,$key2Biner[$index]);
        // echo $i.' '.$XorKey1.' ';
    }else{
        $XorKey2 = _xor($key2Biner[$i],$key2Biner[$index]);
        // echo $i.' '.$XorKey1.' ';
    }   
}

echo 'Hasil Xor dari key2 = '.$XorKey2.'<br>';

// ======================
// OR dari key 1 dan key 2

function _or($text,$key){
    for($i=0; $i<strlen($text); $i++){
        if (intval($text[$i]) or intval($key[$i])) {
            $text[$i] = 1;
        }else{
            $text[$i] = 0;
        }
    }
    return $text;
}

$countXorKey1 = strlen($XorKey1);
// echo $countXorKey1;
$OrKey = [];
for ($i=0; $i < $countXorKey1; $i++) { 
    $convertOrKey = _or($XorKey1[$i],$XorKey2[$i]); 
    array_push($OrKey, $convertOrKey);
}

echo 'Hasil Or dari key1 dan key2 = ';
for ($i=0; $i < count($OrKey) ; $i++) { 
    echo $OrKey[$i];
}
echo '<br>';

// ======================
// XNOR cyphertext

function _xnor($text,$key){
    $strText = strlen(strval($text));
    for($i=0; $i< $strText; $i++){
        if ($text[$i] == 1 && $key[$i] == 0) {
            $text[$i] = 0;
        }else if ($text[$i] == 0 && $key[$i] == 1) {
            $text[$i] = 0;
        }else{
            $text[$i] = 1;
        }
    }
    return $text;
}


$countShipertext1Biner = count($chipertext1Biner);
$NANDCiphertext = [];
for ($i=0; $i < $countShipertext1Biner; $i++) { 
        $resultNAND = _xnor($chipertext1Biner[$i],$OrKey);
        array_push($NANDCiphertext, $resultNAND);
}

echo 'Hasil XNOR Ciphertext dan Key = ';
for ($i=0; $i < count($NANDCiphertext) ; $i++) { 
    echo $NANDCiphertext[$i].' ';
}
echo '<br>';

// ======================
// permutasi huruf pertam menjadi 0

function _change1to0($text){
    $strText = strlen(strval($text));
    for($i=0; $i< $strText; $i++){
        if ($i == 0) {
            $text[$i] = 0;
        }
    }
    return $text;
}

$countNANDCiphertext = count($NANDCiphertext);
$permutasi1to0 = [];
for ($i=0; $i < $countNANDCiphertext; $i++) { 
    $resultPermutasi1to0 = _change1to0($NANDCiphertext[$i]);
    array_push($permutasi1to0, $resultPermutasi1to0);
}

echo 'Hasil Permutasi 1 to 0 = ';
// for ($i=0; $i < count($permutasi1to0) ; $i++) { 
//     echo $permutasi1to0[$i].' ';
// }
// echo '<br>';
// echo '<br>';
print_r($permutasi1to0);
echo '<br>';

// ======================
// convert Binary to ASCII

function _binaryToASCII($input) {
    $output = '';
    for($i=0; $i<strlen($input); $i+=8) {
        $output .= chr(intval(substr($input, $i, 8), 2));
    }
    return $output;
}

$countpermutasi1to0 = count($permutasi1to0);
$convertBinaryToASCII = [];
for ($i=0; $i < $countpermutasi1to0; $i++) { 
    $resultBinaryToASCII = _binaryToASCII($permutasi1to0[$i]);
    array_push($convertBinaryToASCII, $resultBinaryToASCII);
}

echo 'Hasil convert Binary to ASCII = ';
for ($i=0; $i < count($convertBinaryToASCII) ; $i++) { 
    echo $convertBinaryToASCII[$i];
}
echo '<br>';
echo '<br>';
print_r($convertBinaryToASCII);
echo '<br>';


// ======================
// permutasi urutan ganjil ke hexa

$number = 1;
$resultChipertextLast = [];
for ($i=0; $i < count($convertBinaryToASCII) ; $i++) { 
    $genapOrNot = $number % 2;
    if ($genapOrNot != 0 ) {
        $resultBinToHex = bin2hex(strval($convertBinaryToASCII[$i]));
        // $newValue = array($i=>$resultBinToHex);
        // array_replace($convertBinaryToASCII, $newValue);
        array_push($resultChipertextLast, $resultBinToHex);
    }else{
        array_push($resultChipertextLast, $convertBinaryToASCII[$i]);
    }
    $number++;
// break;
}

echo 'Hasil akhir Chipertext = ';
for ($i=0; $i < count($resultChipertextLast) ; $i++) { 
    echo $resultChipertextLast[$i];
}
echo '<br>';
echo '<br>';


// ==================================
// DECRYPT
echo 'DESCRYPT ';
echo '<br>';


// Hexa to ASCII

$number = 1;
$resultHexa = [];
for ($i=0; $i < count($resultChipertextLast) ; $i++) { 
    $genapOrNot = $number % 2;
    if ($genapOrNot != 0 ) {
        $resultHexToBin = hex2bin($resultChipertextLast[$i]);
        // $newValue = array($i=>$resultBinToHex);
        // array_replace($convertBinaryToASCII, $newValue);
        array_push($resultHexa, $resultHexToBin);
    }else{
        array_push($resultHexa, $resultChipertextLast[$i]);
    }
    $number++;
}

echo 'Hexa to Bin/ASCII = ';
for ($i=0; $i < count($resultHexa) ; $i++) { 
    echo $resultHexa[$i];
}
echo '<br>';
echo '<br>';
// print_r($resultHexa);
echo '<br>';


// ======================
// convert ASCII ke biner
$resultASCIItoBiner = [];
for ($y=0; $y < count($resultHexa) ; $y++) { 
    // echo $resultHexa[$y].'='.$y.' ';
    $str = strval($resultHexa[$y]);
    // echo $str.'-';
    $l = strlen($str);
    // echo $l.',';
    $result = '';
    while ($l--) {
        $result = str_pad(decbin(ord($str[$l])), 8, "0", STR_PAD_LEFT);
        // echo $str.' - '.ord($str[$l]).' + '.decbin(ord($str[$l])).' / ';
        // echo $y.' = '.$str.' - '.str_pad(decbin(ord($str[$l])), 8, "0", STR_PAD_LEFT).' / '.$result.', ';
       
    }
    // print $y.' = '.$result.' / ';
    array_push($resultASCIItoBiner, $result);
}

echo 'ASCII to Biner = ';
for ($i=0; $i < count($resultASCIItoBiner) ; $i++) { 
    echo $i.' : '.$resultASCIItoBiner[$i].' / ';
}
// echo count($resultASCIItoBiner);
echo '<br>';
echo '<br>';
// print_r($resultASCIItoBiner);
echo '<br>';

// ======================
// permutasi huruf pertam menjadi 1

function _change0to1($text){
    $strText = strlen(strval($text));
    for($i=0; $i< $strText; $i++){
        if ($i == 0) {
            $text[$i] = 1;
        }
    }
    return $text;
}

$permutasi0to1 = [];
for ($i=0; $i < count($resultASCIItoBiner); $i++) { 
    $resultpermutasi0to1 = _change0to1($resultASCIItoBiner[$i]);
    array_push($permutasi0to1, $resultpermutasi0to1);
}

echo 'Hasil Permutasi 0 to 1 = ';
for ($i=0; $i < count($permutasi0to1) ; $i++) { 
    echo $i.' = '.$permutasi0to1[$i].' / ';
}
echo '<br>';
echo '<br>';

// ======================
// NXOR permutasi 

$NXORCiphertext = [];
for ($i=0; $i < count($permutasi0to1); $i++) { 
        $resultNXOR = _xnor($permutasi0to1[$i],$OrKey);
        array_push($NXORCiphertext, $resultNXOR);
}

echo 'Hasil XNOR Ciphertext dan Key = ';
for ($i=0; $i < count($NXORCiphertext) ; $i++) { 
    echo $i.' = '.$NXORCiphertext[$i].' / ';
}
echo '<br>';

// ======================
// convert Binary to ASCII
function _binaryToASCIIDecr($input) {
    $output = '';
    // echo strlen($input).'=';
    for($i=0; $i<strlen($input); $i+=8) {
        $output .= chr(intval(substr($input, $i, 8), 2));
        // echo chr(intval(substr($input, $i, 8), 2)).' = '.intval(substr($input, $i, 8), 2).', ';
    }
    return $output;
}

$convertBinaryToASCII = [];
$number = 1;
for ($y=0; $y < count($NXORCiphertext) ; $y++) { 
    // echo $chipherText1[$y].' = ';
    $result = '';
    $genapOrNot = $number % 2;
    if ($genapOrNot == 0 ) {
        $resultBinaryToASCII = bindec($NXORCiphertext[$y]);
        array_push($convertBinaryToASCII, $resultBinaryToASCII);
    }else{
        $resultBinaryToASCII = _binaryToASCIIDecr($NXORCiphertext[$y]);
        array_push($convertBinaryToASCII, $resultBinaryToASCII);
    }
    $number++;
    // print $result;
}

echo '<br>';
echo '<br>';

echo 'Hasil convert Binary to ASCII = ';
for ($i=0; $i < count($convertBinaryToASCII) ; $i++) { 
    echo $convertBinaryToASCII[$i];
}
echo '<br>';
echo '<br>';


// ======================
// metode permutasi mengganti yang genap menjadi huruf

$number = 1;
$chipherText1Decrypt = [];
for ($i=0; $i < count($convertBinaryToASCII) ; $i++) { 
    $genapOrNot = $number % 2;
    if ($genapOrNot == 0 ) {
        // echo $convertBinaryToASCII[$i].' ';
        $getKarakter = $convertBinaryToASCII[$i];
        // echo count($abjad);
        for ($k=0; $k < count($abjad); $k++) { 
            // echo $abjad[$k].' ';
            if ($getKarakter == $k) {
                $getGenap = $abjad[$k-1];
                // $newValue = array($i=>$getGenap);
                // echo $getGenap.' ';
                // $convertBinaryToASCII[$i] = $getGenap;
                array_push($chipherText1Decrypt, $getGenap);
                break;
            }
        }
    }
    else{
        array_push($chipherText1Decrypt, $convertBinaryToASCII[$i]);
        // echo "tesss";
    }
    $number++;
    // break;
}



echo '<br>';
echo "Ciphertext1 = ";
for ($y=0; $y < count($chipherText1Decrypt) ; $y++) { 
    echo $chipherText1Decrypt[$y].' ';
}

echo '<br>';
echo '<br>';

// ======================
// metode 1

// $countPlaintext = count($arrayPlaintext);
echo 'Metode 1 : <br>';

$chipherText1Dec = [];
$b=1;
for ($l=0; $l < count($chipherText1Decrypt); $l++) { 
    for ($i=0; $i < count($key1) ; $i++) { 
        // echo count($chipherText1Decrypt);
        if ($b == 1) {
                if ($chipherText1Decrypt[$l] == $key1[$i]) {
                    $keyAbdjad = array_search($key1[$i], $key1).' ';
                    // echo $keyAbdjad.' ';
                    for ($a=0; $a < count($abjad); $a++) { 
                        if ($a == $keyAbdjad) {
                            // echo $abjad[$a].' ';
                            array_push($chipherText1Dec, $abjad[$a]);
                        }
                    }
                }
        }elseif ($b == 2) {
                if ($chipherText1Decrypt[$l] == $key2[$i]) {
                    $keyAbdjad = array_search($key2[$i], $key2).' ';
                    // echo $keyAbdjad.' ';
                    for ($a=0; $a < count($abjad) ; $a++) { 
                        if ($a == $keyAbdjad) {
                            // echo $abjad[$a].' ';
                            array_push($chipherText1Dec, $abjad[$a]);
                        }
                    }
                }
        }
        
    }
    $b++;  
    if ($b == 3) {
        $b = 1;
    }
}
$countCipherText1 = count($chipherText1Dec);
echo "Ciphertext1 = ";
for ($y=0; $y < count($chipherText1Dec) ; $y++) { 
    echo $chipherText1Dec[$y].' ';
}

<form action="" method="post">
    <textarea name="plaintext" cols="30" rows="10" placeholder="Plaintext"></textarea>
    <button type="submit" name="enkrip">Enkripsi</button>
</form>
<hr>
<form action="" method="post">
    <textarea name="ciphertext" cols="30" rows="10" placeholder="Ciphertext"></textarea>
    <button type="submit" name="dekrip">Dekripsi</button>
</form>

<?php

echo '<h1>Modifikasi Kriptografi BY AKHMAD SYARIF</h1>'.PHP_EOL;

$abjad = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
$abjadReves = ['Z','Y','X','W','V','U','T','S','R'];
// $key1 = ['H','A','L','O'];
$key1 = ['K','U','R','S','I'];
$key2 = ['G','U','N','M','E','R','A','P','I'];
// $key2 = [];
if (isset($_POST['enkrip'])) {
    EnkripsiKillu($_POST['plaintext'], $key1, $key2, $abjad);
}

if (isset($_POST['dekrip'])) {
    Dekripkillu($_POST['ciphertext'], $key1, $key2, $abjad);
}


function EnkripsiKillu($plaintextInput, $key1P, $key2P, $abjadP) {
        $abjad = $abjadP;
        $key1 = $key1P;
        $key2 = $key2P;

        echo $plaintextInput.'<br>';
        // $plaintext = 'KETIKA CORONA DATANG ENGKAU DIPAKSA MENCARI TUHAN';
        $plaintext = $plaintextInput;
        $arrayPlaintext = array();
        $plaintext1 = str_replace(' ', '', $plaintext);
        $plaintext2 = explode(" ", $plaintext1);
        $pemisah = strlen($plaintext1);
        for ($x=0;$x<$pemisah; $x++){
            $pecah1 = substr($plaintext1,$x,1);
            array_push($arrayPlaintext, $pecah1);
        }
        echo 'Plaint Text : ' .$plaintext.'<br>';
        echo 'Plaint Text convert : ' .$plaintext1;
        echo '<br>';
        echo '<br>';

        // ==========================================
        // menjadikan teks ke array dan menghilangkan spasi pada key
        // ini jika key flexibel dari input, 
        // tapi jika manual masukan dikoding tidak perlu ini

        // $kunci1 = 'HALLO';
        // $kunci1convert = array();
        // $kunci1a = str_replace(' ', '', $kunci1);
        // $kunci1b = explode(" ", $kunci1a);
        // // echo strlen($kunci1a);
        // $pemisah = strlen($kunci1a);
        // for ($x=0;$x < $pemisah; $x++){
        //     $pecah2 = substr($kunci1,$x,1);
        //     if ($pecah2 != ' ') {
        //         array_push($kunci1convert, $pecah2);
        //     }
        // }
        // echo 'kunci 1 : ' .$kunci1.'<br>';
        // echo 'kunci 1 convert : ' .$kunci1a;
        // echo '<br>';
        // echo '<br>';


        // $kunci2 = 'ANAK';
        // $kunci2convert = array();
        // $kunci2a = str_replace(' ', '', $kunci2);
        // $kunci2b = explode(" ", $kunci2a);
        // $pemisah = strlen($kunci2a);
        // for ($x=0;$x <= $pemisah; $x++){
        //     $pecah3 = substr($kunci2,$x,1);
        //     if ($pecah3 != ' ') {
        //         array_push($kunci2convert, $pecah3);
        //     }
        // }
        // echo 'kunci 2 : ' .$kunci2.'<br>';
        // echo 'kunci 2 convert : ' .$kunci2a;
        // echo '<br>';
        // echo '<br>';

        // print_r($kunci1convert);
        // $eleminasiDoublehurufKey1 = [];
        // for ($i=0; $i < count($kunci1convert) ; $i++) { 
        //     if ($i == 0) {
        //         array_push($eleminasiDoublehurufKey1, $kunci1convert[$i]);
        //     }else{
        //         for ($x=0; $x < count($eleminasiDoublehurufKey1) ; $x++) { 
        //             if ($kunci1convert[$i] == $eleminasiDoublehurufKey1[$x]) {
        //                 // $i++;
        //             }else{
        //                 if ($x == (count($eleminasiDoublehurufKey1)-1)) {
        //                     // echo count($eleminasiDoublehurufKey1);
        //                     // echo $kunci1convert[3];
        //                     array_push($eleminasiDoublehurufKey1, $kunci1convert[$i]);
        //                     break;
        //                 }
        //             }
        //         }
        //     }
        // }
        // print_r($eleminasiDoublehurufKey1);


        // echo '<br>';
        // // print_r($key2);
        // // $eleminasiDoublehurufKey2 = [];
        // for ($i=0; $i < count($kunci2convert) ; $i++) { 
        //     if ($i == 0) {
        //         array_push($key2, $kunci2convert[$i]);
        //     }else{
        //         for ($x=0; $x < count($key2) ; $x++) { 
        //             if ($kunci2convert[$i] == $key2[$x]) {
        //                 $i++;
        //             }else {
        //                 if ($x == (count($key2)-1)) {
        //                     // echo $kunci2convert[$i];
        //                     array_push($key2, $kunci2convert[$i]);
        //                     break;
        //                 }
                        
        //             }
        //         }
        //     }
        // }
        // print_r($key2);

        // batas dari menjadikan teks ke array dan menghilangkan spasi pada key

        // =====================================
        // pembuatan abjad key

        $countAbjad = count($abjad);
        $countKey1 = count($key1);
        $countKey2 = count($key2);

        // echo 'Key 1 : <br>'.PHP_EOL;

        // for ($z=0; $z < $countKey1 ; $z++) { 
        //     echo $key1[$z].' ';
        // }
        // echo '<br>';

        for ($i=25; $i >= 0 ; $i--) { 
            for ($a=0; $a < $countKey1 ; $a++) {         
                if ($abjad[$i] == $key1[$a]) {
                    $i--;
                }
                else{
                    if ($a == ($countKey1-1)) {
                        array_push($key1, $abjad[$i]);
                    }
                }
            } 
        }

        // $countKey1new = count($key1);
        // for ($z=0; $z < $countKey1new ; $z++) { 
        //     echo $key1[$z].' ';
        // }

        // echo '<br>';
        // echo '<br>';

        // ====================
        // echo 'Key 2 : <br>';
        // for ($d=0; $d < $countKey2 ; $d++) { 
        //     echo $key2[$d].' ';
        // }
        // echo '<br>';

        for ($f=25; $f >= 0 ; $f--) { 
            for ($b=0; $b < $countKey2 ; $b++) { 
                if ($abjad[$f] == $key2[$b]) {
                    $f--;
                }
                else{
                    if ($b == ($countKey2-1)) {
                        array_push($key2, $abjad[$f]);
                    }
                }
            }
        }

        // $countKey2new = count($key2);
        // for ($y=0; $y < $countKey2new ; $y++) { 
        //     echo $key2[$y].' ';
        // }


        // echo '<br>';
        // echo '<br>';

        // ======================
        // metode 1

        $countPlaintext = count($arrayPlaintext);

        $chipherText1 = [];
        $b=1;
        for ($l=0; $l < $countPlaintext; $l++) { 
            
            for ($i=0; $i < $countAbjad ; $i++) { 
                $keyVar = 'key'.$b;
                if ($arrayPlaintext[$l] == $abjad[$i]) {
                    if ($b == 1) {
                        array_push($chipherText1, $key1[$i]);
                    }elseif ($b == 2) {
                        array_push($chipherText1, $key2[$i]);
                    }
                    $b++;  
                } 
                if ($b == 3) {
                    $b = 1;
                }
            }
        }

        $countCipherText1 = count($chipherText1);
        // echo "Ciphertext1 = ";
        for ($y=0; $y < $countCipherText1 ; $y++) { 
            // echo $chipherText1[$y].' ';
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
                        $chipherText1[$i] = $getNumberAbjad;
                        break;
                    }
                }
            }
            $number++;
        }

        // echo '<br>';

        $countCipherText1 = count($chipherText1);
        // echo "Ciphertext1 setelah dimutasi 1 = ";
        for ($y=0; $y < $countCipherText1 ; $y++) { 
            // echo $chipherText1[$y].' ';
        }

        // echo '<br>';
        // echo '<br>';

        // ======================
        // convert key1 ke biner

        $key1Biner = [];
        for ($y=0; $y < $countKey1 ; $y++) { 
            $str = strval($key1[$y]);
            $l = strlen($str);
            $result = '';
            while ($l--) {
                $result = str_pad(decbin(ord($str[$l])), 8, "0", STR_PAD_LEFT) . $result;
                array_push($key1Biner, $result);
            }
        }

        // ======================
        // convert key2 ke biner

        $key2Biner = [];
        for ($y=0; $y < $countKey2 ; $y++) { 
            $str = strval($key2[$y]);
            $l = strlen($str);
            $result = '';
            while ($l--) {
                $result = str_pad(decbin(ord($str[$l])), 8, "0", STR_PAD_LEFT) . $result;
                array_push($key2Biner, $result);

            }
        }

        // ======================
        // convert chipertext1 ke biner

        $chipertext1Biner = [];
        $number = 1;
        for ($y=0; $y < $countCipherText1 ; $y++) {
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
        }

        // echo 'Biner key1 = ';
        // print_r($key1Biner);
        // echo '<br>';

        // echo 'Biner key2 = ';
        // print_r($key2Biner);
        // echo '<br>';

        // echo 'Biner chipertext1 = ';
        // print_r($chipertext1Biner);

        // echo "<br>";
        // echo "<br>";

        // ======================
        // XOR key1 dan key 2

        function _xor($text,$key){
            for($i=0; $i<strlen($text); $i++){
                $text[$i] = intval($text[$i])^intval($key[$i]);
            }
            return $text;
        }


        $countKey1Biner = count($key1Biner);
        $XorKey1 = '';
        for ($i=0; $i < $countKey1Biner; $i++) { 
            $index = $i + 1;
            if ($i > 0) {
                $XorKey1 = _xor($XorKey1,$key1Biner[$index]);
            }else{
                $XorKey1 = _xor($key1Biner[$i],$key1Biner[$index]);
            }   
        }

        // echo 'Hasil Xor dari key1 = '.$XorKey1.'<br>';


        $countKey2Biner = count($key2Biner);
        $XorKey2 = '';
        for ($i=0; $i < $countKey2Biner; $i++) { 
            $index = $i + 1;
            if ($i > 0) {
                $XorKey2 = _xor($XorKey2,$key2Biner[$index]);
            }else{
                $XorKey2 = _xor($key2Biner[$i],$key2Biner[$index]);
            }   
        }

        // echo 'Hasil Xor dari key2 = '.$XorKey2.'<br>';

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
        $OrKey = [];
        for ($i=0; $i < $countXorKey1; $i++) { 
            $convertOrKey = _or($XorKey1[$i],$XorKey2[$i]); 
            array_push($OrKey, $convertOrKey);
        }

        // echo 'Hasil Or dari key1 dan key2 = ';
        // for ($i=0; $i < count($OrKey) ; $i++) { 
        //     echo $OrKey[$i];
        // }
        // echo '<br>';

        // ======================
        // NAND cyphertext

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

        // echo 'Hasil XNOR Ciphertext dan Key = ';
        for ($i=0; $i < count($NANDCiphertext) ; $i++) { 
            // echo $NANDCiphertext[$i].' ';
        }
        // echo '<br>';

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

        // echo 'Hasil Permutasi 1 to 0 = ';
        // print_r($permutasi1to0);
        // echo '<br>';

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

        // echo 'Hasil convert Binary to ASCII = ';
        // for ($i=0; $i < count($convertBinaryToASCII) ; $i++) { 
        //     echo $convertBinaryToASCII[$i];
        // }
        // echo '<br>';
        // echo '<br>';

        // ======================
        // permutasi urutan ganjil ke hexa

        $number = 1;
        $resultChipertextLast = [];
        for ($i=0; $i < count($convertBinaryToASCII) ; $i++) { 
            $genapOrNot = $number % 2;
            if ($genapOrNot != 0 ) {
                $resultBinToHex = bin2hex(strval($convertBinaryToASCII[$i]));
                array_push($resultChipertextLast, $resultBinToHex);
            }else{
                array_push($resultChipertextLast, $convertBinaryToASCII[$i]);
            }
            $number++;
        }

        echo 'Hasil akhir Chipertext = ';
        for ($i=0; $i < count($resultChipertextLast) ; $i++) { 
            echo $resultChipertextLast[$i];
        }
        echo '<br>';
        echo '<br>';

        // echo count($resultChipertextLast);


}

function Dekripkillu($ciphertextInput, $key1P, $key2P, $abjadP){
        // ==================================
        // DECRYPT
        $abjad = $abjadP;
        $key1 = $key1P;
        $key2 = $key2P;
        
        
// =====================================================================

        $resultChipertextLast1 = $ciphertextInput;
        $resultChipertextLastArray = str_split($ciphertextInput);
    
        echo 'DECRYPT ';
        echo '<br>';

        $resultChipertextLast = [];
        $number = 1;
        for ($i=0; $i < count($resultChipertextLastArray) ; $i++) { 
            if ($number == 1) {
                $hexa = $resultChipertextLastArray[$i].$resultChipertextLastArray[$i+1];
                array_push($resultChipertextLast, $hexa);
                // echo $hexa;
                $i += 1;
            }else if ($number == 2) {
                array_push($resultChipertextLast ,$resultChipertextLastArray[$i]);
            }
            $number++;
            if ($number == 3) {
                $number = 1;
            }
        }
        // print_r($resultChipertextLast);
        for ($i=0; $i < count($resultChipertextLast) ; $i++) { 
            echo $resultChipertextLast[$i];
        }
        echo '<br>';
        echo '<br>';

        // dari ciphertext mutasi bilangan ganjil dari hexa ke ASCII

        $number = 1;
        $resultHexa = [];
        for ($i=0; $i < count($resultChipertextLast) ; $i++) { 
            $genapOrNot = $number % 2;
            if ($genapOrNot != 0 ) {
                $resultHexToBin = hex2bin($resultChipertextLast[$i]);
                array_push($resultHexa, $resultHexToBin);
            }else{
                array_push($resultHexa, $resultChipertextLast[$i]);
            }
            $number++;
        }

        // echo 'Hexa to ASCII = ';
        // for ($i=0; $i < count($resultHexa) ; $i++) { 
        //     echo $resultHexa[$i];
        // }
        // echo '<br>';
        // echo '<br>';


        // ======================
        // convert ASCII ke biner

        $resultASCIItoBiner = [];
        for ($y=0; $y < count($resultHexa) ; $y++) { 
            $str = strval($resultHexa[$y]);
            $l = strlen($str);
            $result = '';
            while ($l--) {
                $result = str_pad(decbin(ord($str[$l])), 8, "0", STR_PAD_LEFT);
            }
            array_push($resultASCIItoBiner, $result);
        }

        // echo 'ASCII to Biner = ';
        // for ($i=0; $i < count($resultASCIItoBiner) ; $i++) { 
        //     echo $i.' : '.$resultASCIItoBiner[$i].' / ';
        // }

        // echo '<br>';
        // echo '<br>';

        // ======================
        // permutasi huruf pertama menjadi 1

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

        // echo 'Hasil Permutasi 0 to 1 = ';
        // for ($i=0; $i < count($permutasi0to1) ; $i++) { 
        //     echo $i.' = '.$permutasi0to1[$i].' / ';
        // }
        // echo '<br>';
        // echo '<br>';

        // ======================
// convert key1 ke biner
$key1Biner = [];
// echo "key1 convert to biner = ";
for ($y=0; $y < count($key1) ; $y++) { 
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
for ($y=0; $y < count($key2) ; $y++) { 
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

// echo 'Biner key1 = ';
// print_r($key1Biner);
// echo '<br>';

// echo 'Biner key2 = ';
// print_r($key2Biner);
// echo '<br>';


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

        // echo 'Hasil Xor dari key1 = '.$XorKey1.'<br>';


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

        // echo 'Hasil Xor dari key2 = '.$XorKey2.'<br>';

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

        // echo 'Hasil Or dari key1 dan key2 = ';
        // for ($i=0; $i < count($OrKey) ; $i++) { 
        //     echo $OrKey[$i];
        // }
        // echo '<br>';


        // ======================
        // NXOR permutasi 
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

        $NXORCiphertext = [];
        for ($i=0; $i < count($permutasi0to1); $i++) { 
                $resultNXOR = _xnor($permutasi0to1[$i],$OrKey);
                array_push($NXORCiphertext, $resultNXOR);
        }

        // echo 'Hasil XNOR Ciphertext dan Key = ';
        // for ($i=0; $i < count($NXORCiphertext) ; $i++) { 
        //     echo $i.' = '.$NXORCiphertext[$i].' / ';
        // }
        // echo '<br>';

        // ======================
        // convert Binary to ASCII

        function _binaryToASCIIDecr($input) {
            $output = '';
            for($i=0; $i<strlen($input); $i+=8) {
                $output .= chr(intval(substr($input, $i, 8), 2));
            }
            return $output;
        }

        $convertBinaryToASCII = [];
        $number = 1;
        for ($y=0; $y < count($NXORCiphertext) ; $y++) { 
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
        }

        // echo '<br>';
        // echo '<br>';

        // echo 'Hasil convert Binary to ASCII = ';
        // for ($i=0; $i < count($convertBinaryToASCII) ; $i++) { 
        //     echo $convertBinaryToASCII[$i];
        // }
        // echo '<br>';
        // echo '<br>';


        // ======================
        // metode permutasi mengganti yang genap menjadi huruf

        $number = 1;
        $chipherText1Decrypt = [];
        for ($i=0; $i < count($convertBinaryToASCII) ; $i++) { 
            $genapOrNot = $number % 2;
            if ($genapOrNot == 0 ) {
                $getKarakter = $convertBinaryToASCII[$i];
                for ($k=0; $k < count($abjad); $k++) { 
                    if ($getKarakter == $k) {
                        $getGenap = $abjad[$k-1];
                        array_push($chipherText1Decrypt, $getGenap);
                        break;
                    }
                }
            }
            else{
                array_push($chipherText1Decrypt, $convertBinaryToASCII[$i]);
            }
            $number++;
        }

        // echo '<br>';
        // echo "Ciphertext1 = ";
        // for ($y=0; $y < count($chipherText1Decrypt) ; $y++) { 
        //     echo $chipherText1Decrypt[$y].' ';
        // }

        // echo '<br>';
        // echo '<br>';

        // =====================================
        // pembuatan abjad key

        $countAbjad = count($abjad);
        $countKey1 = count($key1);
        $countKey2 = count($key2);

        // echo 'Key 1 : <br>'.PHP_EOL;

        // for ($z=0; $z < $countKey1 ; $z++) { 
        //     echo $key1[$z].' ';
        // }
        // echo '<br>';

        for ($i=25; $i >= 0 ; $i--) { 
            for ($a=0; $a < $countKey1 ; $a++) {         
                if ($abjad[$i] == $key1[$a]) {
                    $i--;
                }
                else{
                    if ($a == ($countKey1-1)) {
                        array_push($key1, $abjad[$i]);
                    }
                }
            } 
        }

        // $countKey1new = count($key1);
        // for ($z=0; $z < $countKey1new ; $z++) { 
        //     echo $key1[$z].' ';
        // }

        // echo '<br>';
        // echo '<br>';

        // ====================
        // echo 'Key 2 : <br>';
        // for ($d=0; $d < $countKey2 ; $d++) { 
        //     echo $key2[$d].' ';
        // }
        // echo '<br>';

        for ($f=25; $f >= 0 ; $f--) { 
            for ($b=0; $b < $countKey2 ; $b++) { 
                if ($abjad[$f] == $key2[$b]) {
                    $f--;
                }
                else{
                    if ($b == ($countKey2-1)) {
                        array_push($key2, $abjad[$f]);
                    }
                }
            }
        }

        // $countKey2new = count($key2);
        // for ($y=0; $y < $countKey2new ; $y++) { 
        //     echo $key2[$y].' ';
        // }


        // echo '<br>';
        // echo '<br>';


        // ======================
        // hasil plaintext

        $chipherText1Dec = [];
        $b=1;
        for ($l=0; $l < count($chipherText1Decrypt); $l++) { 
            for ($i=0; $i < count($key1) ; $i++) { 
                if ($b == 1) {
                        if ($chipherText1Decrypt[$l] == $key1[$i]) {
                            $keyAbdjad = array_search($key1[$i], $key1).' ';
                            for ($a=0; $a < count($abjad); $a++) { 
                                if ($a == $keyAbdjad) {
                                    // echo $abjad[$a];
                                    array_push($chipherText1Dec, $abjad[$a]);
                                }
                            }
                        }
                }elseif ($b == 2) {
                        if ($chipherText1Decrypt[$l] == $key2[$i]) {
                            $keyAbdjad = array_search($key2[$i], $key2).' ';
                            for ($a=0; $a < count($abjad) ; $a++) { 
                                if ($a == $keyAbdjad) {
                                    // echo $abjad[$a];
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
        echo "Plaintext = ";
        for ($y=0; $y < count($chipherText1Dec) ; $y++) { 
            echo $chipherText1Dec[$y].' ';
        }

}
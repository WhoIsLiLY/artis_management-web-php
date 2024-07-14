<?php
// PECL libsodium 0.2.1 and newer

/**
 * Encrypt a message
 * 
 * @param string $message - message to encrypt
 * @param string $key - encryption key
 * @return string
 */

function generateKey(){
    $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
    return $key;
}
function safeEncrypt($message, $key)
{
    // echo $message . " and " . $key;
    $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); // abcde
    $encrypted = sodium_crypto_secretbox($message, $nonce, $key); // xyz
    //echo "NONCE ".$nonce;
    //echo "ENC ".$encrypted;
    //echo "KEY ".$key;
    //echo "Encrypted Message : " . $encrypted . "<br>";
    //echo "ENCRYP". base64_encode($nonce.$encrypted);
    //echo "KEYENCRYP" . $key;
    return base64_encode(
        $nonce.$encrypted // nonce -> message -> abcdexyz
    );
}

/**
 * Decrypt a message
 * 
 * @param string $encrypted - message encrypted with safeEncrypt()
 * @param string $key - encryption key
 * @return string
 */

function safeDecrypt($encrypted, $key)
{   
    //echo "KATA SANDI ".$encrypted . " KEY " . $key . "\n";
    //echo "encrypted:" . $encrypted;
    //echo "key:".$key;
    //echo "ENCRYP AFTER ".$encrypted;
    $decoded = base64_decode($encrypted);
    //echo "Decoded encrypted message: " . $decoded . "<br>";
    // pesan terenkripsi akan di-decode dan dipisan menjadi 2 bagian (karena awalnya, nonce & cyphertext itu diconcat)
    // Pemisahannya dilakukan dengan mb_substring menjadi 8 bit bagian.
    $nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
    //echo "Nonce after substr : " . $nonce . "   <br>";
    $ciphertext = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');
    //echo "Cyphertext after substr : " . $ciphertext . "<br>";
    $plaintext = sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
    //echo $plaintext;
    return $plaintext;
}    
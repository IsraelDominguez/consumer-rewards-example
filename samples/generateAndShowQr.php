<?php

require __DIR__ . '/header.php';

use ConsumerRewards\SDK\ConsumerRewards;

try {

    $sdk = new ConsumerRewards([
        'username' => $_ENV['USERNAME'],
        'password' => $_ENV['PASSWORD'],
        'api' => $_ENV['API'],
        'web' => $_ENV['WEB'],
    ], [
        'logDir' => '../logs/'
    ]);


    /**
     * Test Generate and Show Qr
     */
    $qr = $sdk->getMarketing()->generateQr('947bddc46ab867f11f659174bdd29949a24c1359efb27e57189177ebffb0c157', new \ConsumerRewards\SDK\Transfer\User('c43ba1a87f4ce0c549540257837ea35fb5df6e4d'));

    echo "<img src='data:".$qr->getDocument()->getMimeType().";base64,".$qr->getDocument()->getLob()."' />";


} catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
} catch (\ConsumerRewards\SDK\Exception\ConsumerRewardsException $e) {
    echo $e->getMessage();
}

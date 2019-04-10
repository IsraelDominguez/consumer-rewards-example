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
     * Test Check Qr status, if is valid, show Qr
     *
       Possible QR Status
            Qr::STATUS_REDEEM;
            Qr::STATUS_VALID;
            Qr::STATUS_NOT_PUBLISHED;
            Qr::STATUS_EXPIRED;
     */
    $status = $sdk->getMarketing()->checkById('53c9bcea983ccf67b8bed2f86d1128faae25a829dab020177a704f9cb522e765');

    if ($status === \ConsumerRewards\SDK\Transfer\Qr::STATUS_VALID) {
        $qr = $sdk->getQrs()->findById('53c9bcea983ccf67b8bed2f86d1128faae25a829dab020177a704f9cb522e765');
        echo "<img src='data:" . $qr->getDocument()->getMimeType() . ";base64," . $qr->getDocument()->getLob() . "' />";
    } else {
        echo $status;
    }

} catch (\ConsumerRewards\SDK\Exception\InvalidQrException $e) {
    echo 'Invalid Qr';
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
} catch (\ConsumerRewards\SDK\Exception\ConsumerRewardsException $e) {
    echo $e->getMessage();
}

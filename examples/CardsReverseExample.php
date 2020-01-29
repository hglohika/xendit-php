<?php

/**
 * CardsReverseExample.php
 * php version 7.2.0
 *
 * @category Example
 * @package  Xendit/Examples
 * @author   Ellen <ellen@xendit.co>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://api.xendit.co
 */

use Xendit\Xendit;

require 'vendor/autoload.php';

Xendit::setApiKey(
    <<<'TAG'
xnd_development_prHUBDfVuOQTxyWTQSNkpjn9OwX9ZSUjdqgF9GenZ6hwhUQkc3NZ9WVexdH
TAG
);

$params = [
    'token_id' => '5e2e8231d97c174c58bcf644',
    'external_id' => 'card_' . time(),
    'authentication_id' => '5e2e85f9bae82e4d54d764b5',
    'amount'=> 100000,
    'card_cvn'=>'123',
    'capture'=> false
];

$createCharge = \Xendit\Cards::create($params);
var_dump($createCharge);

$reverseParams = ['external_id' => $createCharge['external_id']];

$reverseAuth = \Xendit\Cards::reverseAuthorization(
    $createCharge['id'],
    $reverseParams
);
var_dump($reverseAuth);
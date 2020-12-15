<?php
    require_once '/../vendor/autoload.php';

    $logic = new App\Logic();
    $api_key = $logic->dataFilter($_GET['key']);

    if(! $logic->authAPI($api_key)) {
        $logic->apiError('invalid api key');
    }

    $amount = $logic->checkFloat($_GET['amount']);
    $from   = $logic->dataFilter($_GET['amount']);

    $status_success = $logic->notifyAboutCashback($amount, $from);
    if($status_success) {
        $logic->apiSuccess();
    }
    $logic->apiError($logic->last_error);

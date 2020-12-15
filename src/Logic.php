<?php
    namespace App;

    class Logic {
        public $last_error = '';

        public function __construct() {
            new Environment();
        }

        public function dataFilter($str = ''): string {
			return Utilities::dataFilter($str);
        }

        public function checkINT($value = 0): int {
			return (int) Utilities::dataFilter($value);
        }

        public function checkFloat($value = 0): float {
            return (float) Utilities::checkFloat($value);
        }

        public function authAPI($key = ''): bool {
            if($key == '') {
                $this->last_error = '';
                return false;
            }
            return $key == getenv('api_key');
        }

        public function apiSuccess($data = []) {
            exit(json_encode([
                'status' => 'success',
                'data'   => $data,
                'error'  => ''
            ]));
        }

        public function apiError($err_info = '') {
            exit(json_encode([
                'status' => 'error',
                'data'   => [],
                'error'  => $err_info
            ]));
        }

        public function notifyAboutCashback($amount = 1, $from = 'test'): bool {
            $amount_str = (string) $amount;
            $message = "+{$amount_str} р от {$from}";

            $api_url  = 'https://api.telegram.org/bot' . getenv('telegram_bot_token') . '/sendMessage';
            $api_url .= '?chat_id=' . getenv('telegram_cid');
            $api_url .= '&text=' . urlencode($message);
            //handle some error?
            return true;
        }
    }

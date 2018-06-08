<?php

namespace App\Services;

use \DrewM\MailChimp\Batch;
use \DrewM\MailChimp\MailChimp;

class MailchimpService
{
    public static function batchSubscribe($emails)
    {
        try {
            $mailchimp = new MailChimp(env('MAILCHIMP_APIKEY'));
            $list_id = env('MAILCHIMP_LIST_ID');
            $batch = $mailchimp->new_batch();

            foreach ($emails as $key => $email) {
                $batch->post("op$key", "/lists/$list_id/members", [
                    'email_address' => $email,
                    'status'        => 'subscribed',
                ]);
            }

            $result = $batch->execute();
        } catch (Exception $e) {
            report($e);
        }

        return $result;
    }
}

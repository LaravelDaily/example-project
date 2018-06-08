<?php

namespace App\Services;

use Newsletter;

class MailchimpService
{
    public static function batchSubscribe($emails)
    {
        try {
            foreach ($emails as $email) {
                if (!Newsletter::isSubscribed($email)) {
                    Newsletter::subscribe($email);
                }
            }
        } catch (Exception $e) {
            report($e);

            return false;
        }

        return true;
    }
}

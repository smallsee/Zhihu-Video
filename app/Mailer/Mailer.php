<?php
namespace App\Mailer;

use Mail;
use Naux\Mail\SendCloudTemplate;

class Mailer
{
    public function sendTo($template, $email, array $data){


        $template = new SendCloudTemplate($template, $data);

        \Mail::raw($template, function ($message) use ($email) {
            $message->from('735065832@qq.com', 'xiaohai');

            $message->to($email);
        });
    }
}
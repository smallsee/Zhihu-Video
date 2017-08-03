<?php
namespace App\Mailer;
use App\User;
use Auth;

class UserMailer extends Mailer
{
    public function followNotifyEmail($email){

        $data = [
            'url' => url('/notifications'),
            'name' => Auth::guard('api')->user()->name
        ];

        $this->sendTo('zhihu_app_follower',$email,$data);

    }

    public function passwordReset($email,$token){

        $data = [
            'url' => url('password/reset', $token)
        ];

        $this->sendTo('laravideo_password_rest',$email,$data);

    }


    public function welcome(User $user){

        $data = [
            'url' => route('email.verify',['token'=>$user->confirmation_token]),
            'name' => $user->name
        ];
        $this->sendTo('test_template_active',$user->email,$data);

    }

}
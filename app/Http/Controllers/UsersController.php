<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Jobs\SendReminderEmail;
class UsersController extends Controller
{
    public function sendEmail()
    {
        $job = (new SendReminderEmail())->delay(Carbon::now()->addSecond(5));
        dispatch($job);

        return 'Email is sent successfully';
    }
}

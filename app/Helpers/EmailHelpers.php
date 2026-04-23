<?php
// namespace App\Helpers;

use Illuminate\Support\Facades\Log;

if (! function_exists('sendEmail')) {
    function sendEmail($data){
        // Log::debug('Test Email');
		
		Mail::to($data['to'])->send(new Email($data));

        return $data;
    }
}
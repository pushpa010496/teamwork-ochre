<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;
use App\CompanyBanner;
use App\CompanyContentMarketing;
use App\CompanyEmailMarketing;
use App\CompanyNewsletter;
use App\CompanyProfile;
use App\CompanyRFQ;
use App\CompanySocialMediaMarketing;

class NotificationController extends Controller
{
   //Banner Notification
	public function bannernotify(){
     
     //Banner expiring
      $time = \Carbon\Carbon::now()->modify('+7 days')->format('Y-m-d');
      $expire_soon = CompanyBanner::whereDate('end_date', '=' , $time)->where('start_date', '<=' , $time)->get();
       $expire_today = CompanyBanner::whereDate('end_date', '=' , date('Y-m-d'))->where('start_date', '<=' , $time)->get();

      if(count($expire_soon) or count($expire_today)){
           $data = [                     
            'data1'=> $expire_soon,
            'data2'=>$expire_today
        ];

      Mail::send('emails.banner_notifi', $data, function($message) use ($data) {
            $message->to('ravi@ochre-media.com');
            // $message->to('omplenquiry@ochre-media.com');
            $message->subject('Banners Update - Ochre media');

          });
      }

        $date = new \DateTime();
       /* $from = $date->modify('-80 days')->format('Y-m-d H:i:s');
        $data = Company::whereDate('start_date', '>=', $from)->get();
        if(count($data)){              
          Mail::to('nagaraj@ochre-media.com')
          ->send(new bannernotify($data));          
        }*/
        
        return 'Success';
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Registered;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        if (\Request::has("data")){
            $params = json_decode(\Request::get('data'));
            \Request::merge(['email' => $params->data->formData[0]->value]);
        }
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        if( $user = Registered::where('email', $request->input('email') )->first() )
        {
            $token = str_random(64);

            DB::table('password_resets')->insert([
                'email' => $user->email, 
                'token' => $token
            ]);

            $user->sendPasswordResetNotification($token);

            return  $this->sendResetLinkResponse(null);
        }

        return $this->sendResetLinkFailedResponse($request,null);
        
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {

        $responseArray['success'] = true;
        $responseArray["data"]["rePass"] = 2;
        $responseArray["data"]["message"] = trans('front.pages.forgotPassword.page_recover_notEmail');
       
       /* $jsonResponse = '{
            "success":true,
            "data":
            {
                
                "rePass":"2",
                "message":'. trans('front.front.pages.forgotPassword.page_recover_notEmail')  .'
            }
        }';  */
        return json_encode($responseArray);
    }

    protected function sendResetLinkResponse($response)
    {
        $jsonResponse = '{
            "success":true,
            "data":
            {
                
                "rePass":"1",
                "message":' . trans('front.pages.forgotPassword.page_recover_sendEmail') . '
            }
        }';  
        
        $responseArray['success'] = true;
        $responseArray["data"]["rePass"] = 1;
        $responseArray["data"]["message"] = trans('front.pages.forgotPassword.page_recover_sendEmail');
        return json_encode($responseArray);
    }
}

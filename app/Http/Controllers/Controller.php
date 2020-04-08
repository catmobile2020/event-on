<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @SWG\Swagger(
 *     basePath="/api",
 *     @SWG\Info(
 *         version="1.0",
 *         title="Event On App",
 *         @SWG\Contact(name="Mahmoud Mohamed",email="m.mohamed@cat.com.eg",url="https://www.linkedin.com/in/mahmoud-mohamed-955932b5/"),
 *     ),
 *     @SWG\SecurityScheme(
 * 			securityDefinition="jwt",
 * 			description="Value: Bearer \<token\><br><br>",
 * 			type="apiKey",
 * 			name="Authorization",
 * 			in="header",
 * 		),
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $api_paginate_num = 10;
    public $web_paginate_num = 20;

    public function responseJson($message,$status)
    {
        $result = [
            'type' => request()->fullUrl(),
            'title' => $message,
        ];
        return response()->json($result , $status);
    }
}
/**
Web API Key
AIzaSyDGYbRFvB48J_Ebu_LiDQR7JCMFKA05okw
App ID
1:760666949958:android:705eb91017940970fe7d47
 */

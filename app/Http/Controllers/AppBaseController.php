<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        // dd($result);
        // return $r/esult;
        return Response::json([
            'success'       => true,
            'status_code'   => 200,
            'message'       => $message,
            'data'          => $result,
        ], 200);
    }

    public function sendError($error, $code = 200)
    {
        return Response::json([
            'success'     => false,
            'status_code' => 422,
            'message'     => $error
        ], 200);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success'       => true,
            'status_code'   => 200,
            'message'       => $message
        ], 200);
    }
}

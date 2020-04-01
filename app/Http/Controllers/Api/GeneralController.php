<?php

namespace App\Http\Controllers\Api;

use App\General;
use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;

class GeneralController extends Controller
{
    /**
     *
     * @SWG\Get(
     *      tags={"general"},
     *      path="/about",
     *      summary="get about details",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="object"),
     * )
     */
    public function about()
    {
        $row = General::where('type',3)->first();
        return GeneralResource::make($row);
    }
    /**
     *
     * @SWG\Get(
     *      tags={"general"},
     *      path="/privacy",
     *      summary="get privacy details",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="object"),
     * )
     */
    public function privacy()
    {
        $row = General::where('type',1)->first();
        return GeneralResource::make($row);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"general"},
     *      path="/terms",
     *      summary="get privacy details",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="object"),
     * )
     */
    public function terms()
    {
        $row = General::where('type',2)->first();
        return GeneralResource::make($row);
    }
}

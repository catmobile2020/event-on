<?php

namespace App\Http\Controllers\Api;

use App\Helpers\UploadImage;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\AccountResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use UploadImage;

    /**
     *
     * @SWG\Get(
     *      tags={"account"},
     *      path="/account/me",
     *      summary="Get the current logged in user",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="object"),
     * )
     */
    public function me()
    {
        return AccountResource::make(auth()->user());
    }

    /**
     *
     * @SWG\post(
     *      tags={"account"},
     *      path="/account/update",
     *      summary="update My Account",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="name",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="mahmoud",
     *      ),@SWG\Parameter(
     *         name="email",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="mahmoudnada5050@gmail.com",
     *      ),@SWG\Parameter(
     *         name="bio",
     *         in="formData",
     *         type="string",
     *         format="string",
     *      ),@SWG\Parameter(
     *         name="photo",
     *         in="formData",
     *         type="file",
     *      ),
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     * @param RegisterRequest $request
     * @return AccountResource
     */
    public function update(RegisterRequest $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        if ($request->photo)
            $this->upload($request->photo,$user,null,true);
        return AccountResource::make(auth()->user());
    }

    /**
     *
     * @SWG\post(
     *      tags={"account"},
     *      path="/account/update-password",
     *      summary="update My Password",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="current_password",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *      ),@SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *      ),
     *      @SWG\Response(response=200, description="User Model"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     * @param Request $request
     * @return AccountResource|\Illuminate\Http\JsonResponse
     */
    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        if (Hash::check($request->current_password,$user->password))
        {
            if ($request->current_password === $request->password)
            {
                return $this->responseJson('error', 'Current And New Password is Same',400);
            }
            $user->update(['password'=>$request->password]);

            return AccountResource::make($user);
        }
        return $this->responseJson('error', 'Current Password Wrong',400);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"notifications"},
     *      path="/notifications",
     *      summary="Get all tips notifications paginate 10 per page",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="objects"),
     * )
     */
    public function allNotifications()
    {
        $rows = auth()->user()->notifications()->latest()->paginate(10);
        return NotificationResource::collection($rows);
    }

}

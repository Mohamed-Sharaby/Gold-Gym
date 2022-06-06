<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Auth
{
    public function guard()
    {
        return 'api';
    }

    public function Model()
    {
        return User::class;
    }

    public function registrationRules(): array
    {

        return [
            'name' => 'required|string|max:191',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'required|phone:eg,sa|unique:users,phone',
            'password' => 'required|confirmed|min:8|string',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            'fcm_token_android' => 'required_without:fcm_token_ios',
            'fcm_token_ios' => 'required_without:fcm_token_android',
        ];
    }


    public function loginRules(): array
    {
        return [
            'phone' => 'required|phone:eg,sa|exists:users,phone',
            'password' => 'required|min:8|string',
            'fcm_token_android' => 'required_without:fcm_token_ios',
            'fcm_token_ios' => 'required_without:fcm_token_android',
        ];
    }


    public function updateProfileRules($user)
    {
        return [
            'name' => 'sometimes|string|max:191',
            'phone' => 'sometimes|phone:sa,eg|unique:users,phone,' . $user->id,
            'email' => 'sometimes|email:dns|unique:users,email,' . $user->id,
            'password' => 'sometimes|confirmed|min:8|string',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ];
    }


    public function resource()
    {
        return UserResource::class;
    }

    public function ConfirmUser(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'phone' => 'required|phone:eg,sa',
            'code' => 'required'
        ]);
        $user = User::where('phone', $request['phone'])->where('is_confirmed', 0)->where('confirmation_code', $request['code'])->first();
        if ($user) {
            $user->update(['is_confirmed' => 1, 'confirmation_code' => Str::random(10)]);
            return \responder::success(__('Confirmed Successfully'));
        } else {
            return \responder::error(__('something went wrong'));
        }
    }

    public function resendConfirmation(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'phone' => 'required|phone:eg,sa',
        ]);
        $user = User::where('phone', $request['phone'])->where('is_confirmed', 0)->first();
        if ($user) {
            $user->update(['confirmation_code' => 123456]);
            return \responder::success(true);
        } else {
            return \responder::error(__('something went wrong'));
        }
    }


    public function forgetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|phone:eg,sa|exists:users,phone',
        ],
            ['phone.phone' => __('Please enter valid phone')]
        );
        $user = User::where('phone', $request->phone);
        $user->first()->update([
            'reset_code' => 123456,
            'reset_at' => now()->toDateTimeString()
        ]);

        return \responder::success(__('reset code sent successfully !'));
    }

    public function checkCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|phone:eg,sa|exists:users,phone',
            'reset_code' => 'required'
        ]);
        $user = User::where('phone', $request->phone)->where('reset_code', $request->reset_code)->exists();

        return \responder::success($user);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|phone:eg,sa|exists:users,phone',
            'reset_code' => 'required',
            'password' => 'required|min:8'
        ]);
        $user = User::where('phone', $request->phone)->where('reset_code', $request->reset_code)->first();
        if (!$user) return \responder::error(__('wrong reset code '));

        $user->update([
            'password' => $request->password,
            'reset_code' => Str::random(15)
        ]);
        $user->token = \JWTAuth::fromUser($user);
        return \responder::success(new UserResource($user));
    }

}

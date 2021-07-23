<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrgRegisterController extends Controller
{
    public function submitForm(Request $request)
    {
        $rules = [
            'name' => ['required', 'regex:/^[\sА-Яа-яЁёa-zA-ZӘәІіҢңҒғҮүҰұҚқӨөҺһ0-9".,\-#№@&()]/'],
            'address' => ['required', 'regex:/^[\sА-Яа-яЁёa-zA-ZӘәІіҢңҒғҮүҰұҚқӨөҺһ0-9".,\-#№@&()]/'],
            'mail_index' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'bin' => 'required|numeric|digits:12',
            'iik' => 'required|',
            'bank_name' => 'required|',
            'bik' => ['required', 'size:8', 'regex:/^[a-zA-Z0-9]+$/'],
            'head_fio' => ['required', 'regex:/^[А-Яа-яЁёa-zA-ZӘәІіҢңҒғҮүҰұҚқӨөҺһ-]/', 'not_regex:[",-#№@&()?!+=^%$:;`]'],
            'otv_fio' => ['required', 'regex:/^[А-Яа-яЁёa-zA-ZӘәІіҢңҒғҮүҰұҚқӨөҺһ-]/'],
            'otv_phone' => 'required|numeric',
            'otv_email' => 'required|email',
            'domain_name' => 'required|',
            'captcha' => 'required|valid_captcha',
            'license_file' => 'required|size:max:2048',
        ];
        $messages = [
            'required' => 'Это поле является обязательным.',
            'numeric' => 'Это поле должно быть числом.',
            'email' => 'Не является email-адресом',
            'name.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы, цифры или символы: ".,\-#№@&()',
            'address.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы, цифры или символы: ".,\-#№@&()',
            'head_fio.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы',
            'otv_fio.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы',
            'bik.regex' =>
                'Это поле должно содержать латиницу и цифры',
            'digits:12' => 'Поле должно содержать 12 цифр.',
            'size:8' => 'Поле должно содержать 8 символов.',
            'license_file.size' => 'Размер файла должен быть менее 2.0 Мб.',
            'valid_captcha' => 'Неправильное слово из капчи.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        };
        return redirect()->back()
            ->withInput();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrgRegisterController extends Controller
{
    public function submitForm(Request $request)
    {
        $rules = [
            'name' => ['required', 'regex:/^[\sА-Яа-яЁёa-zA-ZӘәІіҢңҒғҮүҰұҚқӨөҺһ0-9".,\-#№@&()]+$/u'],
            'address' => ['required', 'regex:/^[\sА-Яа-яЁёa-zA-ZӘәІіҢңҒғҮүҰұҚқӨөҺһ0-9"\.,\-#№@&()]+$/u'],
            'mail_index' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'bin' => 'required|numeric|digits:12',
            'iik' => ['required', 'size:20', 'regex:/^(KZ)/'],
            'bank_name' => ['required', 'regex:/^[A-Za-zА-Яа-яӘәІіҢңҒғҮүҰұҚқӨөҺһ\- ]+$/u'],
            'bik' => ['required', 'size:8', 'regex:/^[a-zA-Z0-9]+$/'],
            'head_fio' => ['required', 'regex:/^[A-Za-zА-Яа-яӘәІіҢңҒғҮүҰұҚқӨөҺһ\- ]+$/u'],
            'otv_fio' => ['required', 'regex:/^[A-Za-zА-Яа-яӘәІіҢңҒғҮүҰұҚқӨөҺһ\- ]+$/u'],
            'otv_phone' => 'required|numeric',
            'otv_email' => 'required|email',
            'domain_name' => 'required|regex:/(.edu.kz)$/u',
            'captcha' => 'required|valid_captcha',
            'license_file' => 'required|max:2048',
        ];
        $messages = [
            'required' => 'Это поле является обязательным.',
            'numeric' => 'Это поле должно быть числом.',
            'email' => 'Не является email-адресом.',
            'name.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы, цифры или символы: ".,\-#№@&()',
            'address.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы, цифры или символы: ".,\-#№@&()',
            'head_fio.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы.',
            'otv_fio.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы.',
            'bank_name.regex' => 'Это поле должно содержать латиницу, кириллицу или казахские буквы.',
            'bik.regex' => 'Это поле должно содержать латиницу и цифры',
            'iik.regex' => 'ИИК начинается с "KZ***".',
            'digits:12' => 'Поле должно содержать 12 цифр.',
            'size:8' => 'Поле должно содержать 8 символов.',
            'size:20' => 'Поле должно содержать 20 символов.',
            'domain_name.regex' => 'Укажите адрес в формате myschool.edu.kz.',
            'license_file.max' => 'Размер файла должен быть не более 2.0 Мб.',
            'valid_captcha' => 'Неправильное слово из капчи.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        };
        return redirect()->back()
            ->with('success', 'Ваши данные успешно отправлены на обработку!');
    }
}

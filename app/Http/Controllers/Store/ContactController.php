<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('store.others.contact');
    }
    
    public function send(Request $request)
    {
        
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;

        $validator = $this->validator($data);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        Mail::to('shadowpro9x@gmail.com')->send(new \App\Mail\SendContact($data));

        return back()->with('message','Cảm ơn bạn đã liên hệ với chúng tôi');
    }

        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'name.required' => 'Vui lòng nhập họ và tên của bạn.',
            'name.max' => 'Họ và tên không quá 100 ký tự',
            'name.string' => 'Họ và tên phải là chuỗi ký tự.',
            'email.required' => 'Vui lòng nhập email của bạn.',
            'email.email' => 'Vui lòng nhập đúng kiểu Email.',
            'email.max' => 'Email không quá 255 ký tự',
            'email.string' => 'Email phải là chuỗi ký tự.',
            'subject.required' => 'Vui lòng nhập chủ đề.',
            'subject.max' => 'Chủ đề không quá 255 ký tự.',
            'subject.string' => 'Chủ đề phải là chuỗi ký tự.',
            'message.required' => 'Vui lòng nhập lời nhắn.',
            'message.string' => 'Lời nhắn phải là chuỗi ký tự.',
        ];
        $rules = [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required','string']
        ];
        return Validator::make($data, $rules, $messages);
    }
}

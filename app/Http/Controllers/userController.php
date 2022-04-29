<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class userController extends Controller
{
    //


    function Create(){

        return view('Create');
    }


    function Store(Request $request){

        //    echo  $request->name;
        //   echo $request->email;
        //    echo $request->input('email');
        //   dd($request->all());
        //   dd($request->except(['_token']));
        //   dd($request->only(['email','_token']));


        // foreach ($request->only(['email','_token'])  as $key => $value) {
        //     # code...

        //     echo $value.'<br>';
        // }


        // echo $request->path();
        // echo $request->url();

        // echo $request->method();
        // dd($request->isMethod('get'));


        // $name = $request->name;
        // $password = $request->password;
        // $email    = $request->email;

        // $errors = [];

        // if(empty($name)){
        //     $errors['Name'] = "Field Required";
        // }


        // if(empty($email)){
        //     $errors['Email'] = "Field Required";
        // }

        // if(empty($password)){
        //     $errors['password'] = "Field Required";
        // }


        // if(count($errors) > 0){
        //     foreach ($errors as $key => $value) {
        //         # code...

        //         echo '* '.$key.' : '.$value.'<br>';
        //     }
        // }else{
        //     echo 'Valid Data';
        // }



        $data =    $this->validate($request, [
            "name"     => "required",
            "password" => "required|min:6|max:10",
            "email"    => "required|email"
        ]);



    }

}

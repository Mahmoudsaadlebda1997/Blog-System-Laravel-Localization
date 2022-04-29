<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blogController extends Controller
{
    //

    function index(){
        // list All Blogs ....
        $data = DB :: table('blog')->join('students', 'students.id','=','blog.addedBy')->select('blog.*','students.name  as userName')->orderby('id','desc')->get();

         return response()->json(["data" => $data  , "message" => 'Data Fetched'],200);
    }



   function store(Request $request){
       // code .....

       $data = $request->all();

     $validator =   Validator :: make($data,[
        "title"   => "required|min:5",
        "content" => "required|min:10",
        "pu_date" => "required|date|after_or_equal:today",
        "image"   => "required|image|mimes:png,jpg"
    ]);

     if($validator->fails()){
         return response()->json(['errors' => $validator->errors()],400);
     }else{

    # SET ADDED BY ID .....
    $data['addedBy'] = 3;

    $data['pu_date'] = strtotime($request->pu_date);


     # Rename Image ....
     $FinalName = uniqid() . '.' . $request->image->extension();

     if ($request->image->move(public_path('/blogs'), $FinalName)) {
         $data['image'] = $FinalName;
     }


     $op =   DB :: table('blog')->insert($data);

     if($op){
         $message = "Raw Inserted";
         $code = 201;
     }else{
         $message = "Error Try Again";
         $code = 400;
     }


       return response()->json(["message" => $message],$code);
   }


   }





   public function destroy($id)
   {
       //

       $data =  DB :: table('blog')->find($id);

       $op = DB :: table('blog')->where('id',$id)->delete();


       if ($op) {

        unlink(public_path('blogs/'.$data->image));
           $message = "Raw Removed";
       } else {
           $message = "Error Try Again";
       }

       return response()->json(["message" => $message],200);

   }





}

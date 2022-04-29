<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class blogController extends Controller
{


      function __construct()
      {

            $this->middleware(['checkBlog'],['except' => ["index","create","store"]]);
      }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // leftJoin() , rightJoin();

        $data = DB :: table('blogs')->join('writers', 'writers.id','=','blogs.writer_id')->select('blogs.*','writers.name  as WriterName')->orderby('id','desc')->get();

         return view('blogs.index',['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create',['title' => "Create Blog "]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $this->validate($request,[
            "title"   => "required|min:10",
            "content" => "required|min:50",
            "pu_date" => "required|date|after_or_equal:today",
            "image"   => "required|image|mimes:png,jpg"
        ]);

        # SET ADDED BY ID .....
        $data['writer_id'] = auth()->user()->id;

        $data['pu_date'] = $request->pu_date;


         # Rename Image ....
         $FinalName = uniqid() . '.' . $request->image->extension();

         if ($request->image->move(public_path('/blogs'), $FinalName)) {
             $data['image'] = $FinalName;
         }


         $op =   DB :: table('blogs')->insert($data);

         if($op){
             $message = "Raw Inserted";
         }else{
             $message = "Error Try Again";
         }

         session()->flash('Message',$message);

         return redirect(url('/Blog'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $data = DB :: table('blogs')->join('writers', 'writers.id','=','blogs.writer_id')->select('blogs.*','writers.name  as WriterName')->where('blogs.id',$id)->orderby('id','desc')->get();

        return view('blogs.show',['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $data = DB :: table('blogs')->find($id);

         return view('blogs.edit',['data' => $data, "title" => "Edit Blog"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $data = $this->validate($request, [
            "title"   => "required|min:10",
            "content" => "required|min:50",
            "pu_date" => "required|date|after_or_equal:today",
            "image"   => "nullable|image|mimes:png,jpg"
        ]);

        $data['pu_date'] = $request->pu_date;

        # Fetch Raw Data ....
        $rawData = DB::table('blogs')->find($id);

        if ($request->hasFile('image')) {
            # Rename Image ....
            $FinalName = uniqid() . '.' . $request->image->extension();

            if ($request->image->move(public_path('/blogs'), $FinalName)) {
                $data['image'] = $FinalName;

                unlink(public_path('blogs/' . $rawData->image));
            }
        } else {
            $data['image'] = $rawData->image;
        }

        # Update Data .....
        $op = DB::table('blogs')->where('id', $id)->update($data);


        if ($op) {
            $message = "Raw Updated";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/Blog'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $op = DB :: table('blogs')->where('id',$id)->delete();

        if ($op) {
            $message = "Raw Removed";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/Blog'));

    }

    public function message(){

    }
}

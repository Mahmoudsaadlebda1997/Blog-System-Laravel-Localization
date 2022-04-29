<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog | Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>




    <div class="container">
        <h2>{{ $title }}</h2>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/Blog/'.$data->id) }}" method="post" enctype="multipart/form-data">


             @method("PUT")

             {{-- <input type="hidden" name="_method" value="put"> --}}

            @csrf

            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="title"
                    placeholder="Enter Name" value="{{ $data->title}}">
            </div>





            <div class="form-group">
                <label for="exampleInputEmail">Content</label>

                <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ $data->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Date</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="pu_date" value="{{$data->pu_date}}">

            </div>


            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file" name="image">
            </div>

            <p> <img src="{{url('/blogs/'.$data->image)}}" alt=""  height="80px" width="80px">  </p>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


</body>

</html>

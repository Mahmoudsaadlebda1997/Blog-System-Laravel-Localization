

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

  {{-- {{ }}    {!! !!} --}}


<?php 
   
//    if(){

//    }else{

//    }


//    foreach(  as ){

//    }


// if(isset($con)){
//     // cod /.... 
// }


$age = 10;
?>


  {{-- @if ($age == 20)
       {{   "age = 20" }}
  @elseif($age == 10)     
    {{  "age = 10"  }}
  @else
  {{   "age != 20" }}
  @endif --}}

  {{-- @foreach ([1,2,3] as  $key => $value )
      {{ $value  }}
  @endforeach --}}


   {{-- @for ()
       
   @endfor --}}

   {{-- @isset()
       
   @endisset --}}

   {{-- @empty() 

   @endempty --}}





@php
    $age = 30; 
    echo $age;
@endphp

</body>
</html>
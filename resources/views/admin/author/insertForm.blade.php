@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height" >
           <h1>insert author</h1>
         
        <form action={{route('authorInsert')}} method="post" enctype="multipart/form-data">
            @csrf
              
               <label for="title">First Name</label>
               <input type="text" name="first_name" placeholder="First Name">
               <br>
               <br>
               <label for="title">Last Name</label>
               <input type="text" name="last_name" placeholder="Last Name">
             
               <br>
               <br>
               <label for="title">Picture</label>
               <input type="file" name="file" placeholder="Picture">

               <br>
               <br>
               <button type="submit" value="submit" name="submit">Insert</button>
           </form>
        </div>


    
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 

@endsection
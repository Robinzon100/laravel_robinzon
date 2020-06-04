@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
            
           <h1>Update author</h1>
         
        <form action="{{route('authorUpdate')}}" method="post" enctype="multipart/form-data">
            @csrf
                {{-- <label for="Id">Id</label> --}}
                <input type="hidden" name="id" placeholder="Id" value="{{ $post->id }}">
                <br>
                <br>
               <label for="title">First Name</label>
               <input type="text" name="first_name" placeholder="Title" value="{{ $post->first_name }}">
               <br>
               <br>
               <label for="title">Last Name</label>
               <input type="text" name="last_name" placeholder="Price" value="{{ $post->last_name }}">
              
               <br>
               <br>
               <label for="title">Picture</label>
               <input type="file" name="picture" placeholder="Picture" value="{{ $post->picture }}">

               <br>
               <br>
               <button type="submit" value="submit" name="submit">Update</button>
           </form>

           
        </div>
        

@endsection
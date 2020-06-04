@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
            
           <h1>Update BOOK</h1>
         
        <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
            @csrf
                {{-- <label for="Id">Id</label> --}}
                <input type="hidden" name="id" placeholder="Id" value="{{ $post->id }}">
                <br>
                <br>
               <label for="title">Name</label>
               <input type="text" name="name" placeholder="Name" value="{{ $post->name }}">
               <br>
               <br>
               <label for="title">PageCount</label>
               <input type="text" name="pageCount" placeholder="PageCount" value="{{ $post->pageCount }}">
               <br>
               <br>
               <label for="title">author_fk</label>
               <input type="text" name="author_fk" placeholder="author_fk" value="{{ $post->author_fk }}">
               <br>
               <br>
           
               <button type="submit" value="submit" name="submit">Update</button>
           </form>

           
        </div>
        

@endsection
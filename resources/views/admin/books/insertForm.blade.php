@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height" >
           <h1>insert BOOK</h1>
         
        <form action="/admin/books/insert" method="post" enctype="multipart/form-data">
            @csrf
              
               <label for="title">Name</label>
               <input type="text" name="name" placeholder="Name">
               <br>
               <br>
               <label for="title">PageCount</label>
               <input type="text" name="pageCount" placeholder="PageCount">
               <br>
               <br>
               <label for="title">author_fk</label>
               <input type="number" name="author_fk" placeholder="Order">
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
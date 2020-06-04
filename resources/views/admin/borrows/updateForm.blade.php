@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height" >
           <h1>Borrows</h1>
         
        <form action="{{route('updateBorrows')}}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value={{$post->id}}>
               <label for="title">Student_fk</label>
               <input type="text" name="student_fk" placeholder="Student_fk" value={{$post->student_fk}}>
               <br>
               <br>
               <label for="title">Book_fk</label>
               <input type="text" name="book_fk" placeholder="Book_fk" value={{$post->book_fk}}>
               <br>
               <br>
              
               <label for="title">TakenDate</label>
               <input type="date" name="takenDate" placeholder="TakenDate" value={{$post->takenDate}}>
               <br>
               <br>
               <label for="title">BroughtDate</label>
               <input type="date" name="broughtDate" placeholder="broughtDate" value={{$post->broughtDate}}>
               <br>
               <br>
               <button type="submit" value="submit" name="submit">Update</button>
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
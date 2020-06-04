@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height" >
           <h1>Borrows</h1>
         
        <form action="{{route('borrowsInsert')}}" method="post" enctype="multipart/form-data">
            @csrf
              
               <label for="title">Student_fk</label>
               <input type="text" name="student_fk" placeholder="Student_fk">
               <br>
               <br>
               <label for="title">Book_fk</label>
               <input type="text" name="book_fk" placeholder="Book_fk">
               <br>
               <br>
              
               <label for="title">TakenDate</label>
               <input type="date" name="takenDate" placeholder="TakenDate">
               <br>
               <br>
               <label for="title">BroughtDate</label>
               <input type="date" name="broughtDate" placeholder="broughtDate">
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
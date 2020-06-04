@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height" >
           <h1>insert students</h1>
         
        <form action={{route('studentsInsert')}} method="post" enctype="multipart/form-data">
            @csrf
              
               <label for="title">First Name</label>
               <input type="text" name="first_name" placeholder="First Name">
               <br>
               <br>
               <label for="title">Last Name</label>
               <input type="text" name="last_name" placeholder="Last Name">
               <br>
               <br>
               <label for="title">Birth Date</label>
               <input type="date" name="birthdate" placeholder="BirthDate">
               <br>
               <br>
               <label for="title">Gender</label>
               <input type="text" name="gender" placeholder="Gender">
               <br>
               <br>
               <label for="title">Phone Number</label>
               <input type="text" name="phone_number" placeholder="Phone number">
               <br>
               <br>
               <label for="title">City</label>
               <input type="text" name="city" placeholder="City">


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
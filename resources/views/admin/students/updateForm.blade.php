@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
            
           <h1>Update Students</h1>
         
        <form action="{{route('updateStudents')}}" method="post" enctype="multipart/form-data">
            @csrf
                {{-- <label for="Id">Id</label> --}}
                <input type="hidden" name="id" placeholder="Id" value="{{ $post->id }}">
                <br>
                <br>
                <label for="title">First Name</label>
               <input type="text" name="first_name" placeholder="First Name" value="{{ $post->first_name }}">
               <br>
               <br>
               <label for="title">Last Name</label>
               <input type="text" name="last_name" placeholder="Last Name" value="{{ $post->last_name }}">
               <br>
               <br>
               <label for="title">Birth Date</label>
               {{-- <input type="hidden" name="birthdate" placeholder="BirthDate" value="{{ $post->birthdate}}"> --}}
               <input type="date" name="birthdate" placeholder="BirthDate" value="{{ $post->birthdate}}">
               <br>
               <br>
               <label for="title">Gender</label>
               <input type="text" name="gender" placeholder="Gender" value="{{ $post->gender }}">
               <br>
               <br>
               <label for="title">Phone Number</label>
               <input type="text" name="phone_number" placeholder="Phone number" value="{{ $post->phone_number}}">
               <br>
               <br>
               <label for="title">City</label>
               <input type="text" name="city" placeholder="City" value="{{ $post->city}}">
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
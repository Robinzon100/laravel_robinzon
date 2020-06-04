@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
           <h1>Students</h1>
          
           <table class="table table-dark">
               <thead>
                 <tr>
                    <th scope="col">Id</th>
                   <th scope="col">First_name</th>
                   <th scope="col">Last_name</th>
                   <th scope="col">Birth Date</th>
                   <th scope="col">Gender</th>
                   <th scope="col">City</th>
                   
                   <th scope="col">Phone number</th>
                 </tr>
               </thead>
               <tbody>
                    @foreach($students as $student)
                 <tr>
                   
                   <td>{{ $student->id}}</td>
                   <td>{{ $student->first_name}}</td>
                   <td>{{ $student->last_name}}</td>
                   <td>{{ $student->birthdate}}</td>
                   <td>{{ $student->gender}}</td>
                   <td>{{ $student->city}}</td>
                   <td>{{ $student->phone_number}}</td>
                
               
                  <td>
                    <a href="{{ url('admin/students/insertForm')}}">Add</a>
                </td>
                <td>
                <a href="/admin/students/updateForm/{{ $student->id}}">Update</a>
               
                </td>
                <td>
                    <form action="{{route('deleteStudents')}}" method="post">
                        @csrf
                        <input type="hidden" value={{ $student->id}} name="id">
                        <button >Delete</button>
                    </form>
    
                    
                </td>
                </tr>
                @endforeach
               </tbody>
             </table>
          
            
        </div>



        
        

@endsection
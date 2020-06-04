@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
           <h1>Author crud</h1>
          
           <table class="table table-dark">
               <thead>
                 <tr>
                    <th scope="col">Id</th>
                   <th scope="col">First_name</th>
                   <th scope="col">Last_name</th>
                  
                   <th scope="col">Picture</th>
                 </tr>
               </thead>
               <tbody>
                    @foreach($authors as $author)
                 <tr>
                   
                   <td>{{$author->id}}</td>
                   <td>{{$author->first_name}}</td>
                   <td>{{$author->last_name}}</td>
                 
                   <td>{{$author->picture}}</td>
                 <td><img src="{{asset('uploads/'.$author->picture)}}" alt="" height="30rem" width="30rem"></td> 
               
                  <td>
                    <a href="{{ url('admin/author/insertForm')}}">Add</a>
                </td>
                <td>
                <a href="/admin/author/updateForm/{{$author->id}}">Update</a>
                </td>
                <td>
                    <form action="{{route('authorDelete')}}" method="post">
                        @csrf
                        <input type="hidden" value={{$author->id}} name="id">
                        <button >Delete</button>
                    </form>
    
                    
                    </td>
                </tr>
                @endforeach
               </tbody>
             </table>
          
            
        </div>
        

@endsection
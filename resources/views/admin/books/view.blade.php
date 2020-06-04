@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
           <h1>CRUD BOOK</h1>
          
           <table class="table table-dark">
               <thead>
                 <tr>
                    <th scope="col">Id</th>
                   <th scope="col">Name</th>
                   <th scope="col">pageCount</th>
                   <th scope="col">Author_fk</th>
                  
                 </tr>
               </thead>
               <tbody>
                    @foreach($books as $book)
                 <tr>
                   
                   <td>{{$book->id}}</td>
                   <td>{{$book->name}}</td>
                   <td>{{$book->pageCount}}</td>
                   <td>{{$book->author_fk}}</td>
                   
                   <td>
                    <a href="{{ url('admin/books/insertForm') }}">Add</a>
                </td>
                <td>
                <a href="/admin/books/updateForm/{{$book->id}}">Update</a>
                </td>
                <td>
                    <form action="{{route('deleteForm')}}" method="post">
                        @csrf
                        <input type="hidden" value={{$book->id}} name="id">
                        <button >Delete</button>
                    </form>
    
                    
                    </td>
                </tr>
                @endforeach
               </tbody>
             </table>
          
            
        </div>
        

@endsection
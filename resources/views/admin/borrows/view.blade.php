@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
           <h1>CRUD BOOK</h1>
          
           <table class="table table-dark">
               <thead>
                 <tr>
                    <th scope="col">Id</th>
                   <th scope="col">Student_fk</th>
                   <th scope="col">Book_fk</th>
                   <th scope="col">TakenDate</th>
                   <th scope="col">BourghtDate</th>
                 </tr>
               </thead>
               <tbody>
                    @foreach($borrows as $borrow)
                 <tr>
                   
                   <td>{{$borrow->id}}</td>
                   <td>{{$borrow->student_fk}}</td>
                   <td>{{$borrow->book_fk}}</td>
                   <td>{{$borrow->takenDate}}</td>
                   <td>{{$borrow->broughtDate}}</td>
                   <td>
                    <a href="{{ url('admin/borrows/insertForm') }}">Add</a>
                </td>
                <td>
                <a href="/admin/borrows/updateForm/{{$borrow->id}}">Update</a>
                </td>
                <td>
                    <form action="{{route('deleteBorrows')}}" method="post">
                        @csrf
                        <input type="hidden" value={{$borrow->id}} name="id">
                        <button >Delete</button>
                    </form>
    
                    
                    </td>
                </tr>
                @endforeach
               </tbody>
             </table>
          
            
        </div>
        

@endsection
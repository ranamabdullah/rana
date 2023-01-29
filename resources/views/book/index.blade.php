<x-app-layout>
    <div class="container">

        <h2>Book (Add/Edit)</h2>

        
        <form method="POST" action="{{ route('book.store') }}">
            @csrf
            @if(isset($book->id))
            <input type="hidden" name="edit_id" value="{{$book->id}}">
            @endif
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{$book->name ?? ''}}" class="form-control" placeholder="name">
            </div>
            <div class="form-group">
                <label>Arrival Date</label>
                <input type="date" name="arrival_date" value="{{$book->arrival_date ?? ''}}" class="form-control" >
            </div>
            <div class="form-group">
                <label>Number of copies</label>
                <input type="number" name="no_of_copies" value="{{$book->no_of_copies ?? ''}}" class="form-control" placeholder="number of copies">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}" {{ isset($category) && $category->id == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" value="{{$book->description ?? ''}}" class="form-control" placeholder="Description">
            </div>
            

       

            <button type="submit" class="btn btn-success">Add/Edit</button>
            <button type="submit" name="search" value="1" class="btn btn-primary pull-right">Search</button>
        </form>

        @if(isset($error_message) && $error_message != '')
            <div class="alert alert-danger" role="alert">{{$error_message}}</div>
        @endif


        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Number of copies</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->category->name}}</td>
                    <td>{{$row->no_of_copies}}</td>
                    <td>
                        <a href="{{route('book.edit',$row->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{route('book.destroy',$row->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

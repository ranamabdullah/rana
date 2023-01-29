<x-app-layout>
    <div class="container">

        <h2>Member (Add/Edit)</h2>

       
        <form method="POST" action="{{ route('member.store') }}">
            @csrf

            @if(isset($member->id))
            <input type="hidden" name="edit_id" value="{{$member->id}}">

            @endif

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{$member->name ?? ''}}" class="form-control" placeholder="name">
            </div>
            <div class="form-group">
                <label>RegDate</label>
                <input type="date" name="regdate" value="{{$member->regdate ?? ''}}" class="form-control" >
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" name="number" value="{{$member->number ?? ''}}" class="form-control" placeholder="number">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ isset($member) && $member->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ isset($member) && $member->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
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
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->number}}</td>
                    <td>{{$row->status}}</td>
                    <td>
                        <a href="{{route('member.edit',$row->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{route('member.destroy',$row->id)}}" method="post">
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

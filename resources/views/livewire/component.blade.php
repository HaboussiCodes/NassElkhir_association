

<div>
<a href="/registerCitizen" class="btn btn-xs btn-success" style='margin-bottom: 10PX'>ADD</a>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



   
    <table class="table table-bordered table-condensed">
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>Family name</td>
            <td>PHONE</td>
            <td>total_points</td>
            <td>ACTION</td>
        </tr>
      @foreach($citizens as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->famName}}</td>
                <td>{{$row->phone_number}}</td>
                <td>{{$row->total_points}}</td>
                <td >
                    <button wire:click="edit({{$row->id}})" class="btn btn-xs btn-warning">Edit</button>
                    <button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">Del</button>
                </td>
            </tr>
        @endforeach 
      
    </table>

</div> 

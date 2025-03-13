

<div>
<a href="/registerCitizen" class="btn btn-xs btn-success" style='margin: 5px'>إضافة</a>

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
            <td>الإسم</td>
            <td>اللقب</td>
            <td>رقم الهاتف</td>
            <td>مجموع النقاط</td>
            <td>عملية</td>
        </tr>
      @foreach($citizens as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->famName}}</td>
                <td>{{$row->phone_number}}</td>
                <td>{{$row->total_points}}</td>
                <td >
                    <button wire:click="edit({{$row->id}})" class="btn btn-xs btn-warning">تعديل</button>
                    <button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">حذف</button>
                </td>
            </tr>
        @endforeach 
      

    </table>
<!-- Paginazione -->
{{ $citizens->onEachSide(7)->links() }}
</div> 


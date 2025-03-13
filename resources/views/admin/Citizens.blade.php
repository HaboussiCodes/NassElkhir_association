<!--  -->
   <!--  @if($updateMode)-->
        <!-- @include('livewire.contacts.update') -->
   <!-- @else --> 
      <!-- @include('livewire.contacts.create') --> 
    <!-- @endif -->


     <!--  @foreach($data as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->phone}}</td>
                <td width="100">
                    <button wire:click="edit({{$row->id}})" class="btn btn-xs btn-warning">Edit</button>
                    <button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">Del</button>
                </td>
            </tr>
        @endforeach -->
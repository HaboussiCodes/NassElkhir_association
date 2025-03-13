@extends('layouts.app')
@section('edit')
<div style="margin-top:4px">
<a href="/home" class="btn btn-xs btn-success" style='margin: 1px'>العودة</a>
</div>
       <div class="row" style="margin-top:3px">
            
             <div class="col-md-8 offset-md-3"> 
                 <h3 class="forum">  تعديل سلم نقاط الاستحقاق للحصول على اعانة   </h3><hr>
                 @livewire('edit',['citizen' => $citizen])
             </div>
       </div> 
      
@endsection
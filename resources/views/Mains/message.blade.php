
@foreach($errors->all() as $error)
<div class="alert alert-danger">
  {{$error}}
</div>
@endforeach

 @if($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{$message}}</p>     
</div>
 @endif
 
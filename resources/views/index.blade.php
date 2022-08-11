@extends('layout')

@section('content')

<div class="container pt-3">



<style>
.uper{
    margin-top:40px;
}
</style>
<div class="uper">
    @if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success')
    }}
</div>
<br />
@endif
<div class="table-responsive-sm">
<table class="table table-stripped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Game Name</td>
        <td>Game Price</td>
        <td colspan="2">Action</td>
    </tr>
</thead>

<tbody>
    @foreach($games as $game)
    <tr>
        <td>{{$game->id}}</td>
        <td>{{$game->name}}</td>
        <td>{{$game->price}}</td>
        <td><a href="{{route('games.edit',$game->id)}}" class="btn btn-primary">Edit</a> </td>
        <td>
            <form action="{{route('games.destroy',$game->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn-btn danger" type="submit">Delete</button>  
            </form>
        </td>
        
    </tr>
    @endforeach

</tbody>
</table>
</div>
</div>
</div>
@endsection

@extends('template')

@section('title', 'welcome')

@section('body')

<div class="d-flex m-5 flex-wrap">
    @foreach ($books as $book)
    <div class="card" style="width: 18rem;">
        <img src="{{asset('/storage/Book/'.$book->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$book->Judul}}</h5>
            <p class="card-text">{{$book->Penulis}}</p>
            <p class="card-text">{{$book->PublishDate}}</p>
            <p class="card-text">{{$book->Stock}}</p>
            <a href="{{route('show', $book->id)}}" class="btn btn-primary">Go somewhere</a>
            <a href="{{route('edit', $book->id)}}" class="btn btn-success">edit</a>
            <form action="/delete-book/{{$book->id}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">delete</button>
            </form>

        </div>
    </div>
    @endforeach
</div>

<form action="/send-mail" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">message</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="message">
    </div>
    <button type="submit" class="btn btn-primary">Send Email</button>
</form>

  {{-- {{$i = 1}}

  @if ($i > 0)
    {{$i}}
  @endif --}}
{{--
  @for ($i = 0; $i < 10; $i++)
    {{$i}}
  @endfor --}}

@endsection

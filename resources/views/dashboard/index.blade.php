@extends('layout')

    @section('content')
    <div class="wrapper" style="margin-top: 80px">
        @if (Session::get('notAllowed'))
            <div class="alert alert-success">
                {{ Session::get('notAllowed') }}
            </div>
        @endif
        @if (Session::get('successAdd'))
            <div class="alert alert-success">
                {{ Session::get('successAdd') }}
            </div>
        @endif
        @if (Session::get('successUpdate'))
            <div class="alert alert-success">
                {{ Session::get('successUpdate') }}
            </div>
        @endif

        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                <div class="h5">My Todo's</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
                <span>
                    <a href="{{route('todo.create')}}" class="text-success">Create</a> | <a href="{{route('todo.complated')}}">Complated</a>
                </span>
            </div>
            <div class="info btn ml-md-4 ml-0">
                <span class="fas fa-info" title="Info"></span>
            </div>
        </div>
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                <div>
                    <span class="text-muted fas fa-comment btn"></span>
                </div>
                <div class="text-muted">{{!is_null($todos) ? count($todos) : '-'}}</div>
                <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
            </div>
        </div>
        <div id="comments" class="mt-1">
            @foreach($todos as $todo)
    
            <div class="comment d-flex align-items-start justify-content-between">
                <div class="mr-2">
                    <form action="/todo/complated/{{$todo['id']}}" method="POST">
                        @csrf 
                        @method('PATCH')
                        <button type="submit" class="fas fa-check" style="background: #B9E0FF; padding: 8px !important;"></button>
                    </form>
                    {{-- <label class="option">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label> --}}
                </div>
                <div class="d-flex flex-column w-75"> 
                    <a href="/todo/edit/{{ $todo['id'] }}" class="text-justify">
                        {{ $todo['title'] }}
                    </a>
                    <p class="text-muted"> {{ $todo['status'] ? 'Complated' : 'On-Progress' }} <br> <span class="date">  {{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</span></p>
                </div>
                <div class="ml-auto">
                    <form action="{{ route('todo.delete', $todo['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="fas fa-trash text-danger btn"></button>
                </form>
                </div>
            </div>
    
            @endforeach
    
        </div>
    </div>
@endsection

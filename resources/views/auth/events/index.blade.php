@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 mb-3" style="display: flex; justify-content:space-between; align-items: center;">
                <h1 style="font-size: 24px; margin-bottom:0px; font-weight:bold;">Lista eventi</h1>
                
                <div>
                    <a href="{{ route('auth.events.create') }}" class="btn btn-success">Crea evento</a>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @if ($message = Session::get('success'))
              <div class="col-12">
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">
                      x
                  </button>
                  <strong>{{ $message }}</strong>
                </div>
              </div>
            @endif         
            @foreach ($events as $event)
            <div class="col-12 col-md-4">
                <div class="card" style="width: 100%;">
                  <div class="card-header font-weight-bold">
                    Titolo: {{ $event->title_it }}
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Data: {{ $event->date }}</li>
                    <li class="list-group-item">Luogo: {{ $event->place }}</li>
                    <li class="list-group-item"><a href="{{ route('auth.events.edit', $event->id ) }}" class="btn btn-success w-100">Modifica evento</a></li>
                  </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
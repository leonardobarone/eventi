@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12 mb-4" style="display: flex; justify-content:space-between; align-items: center;">
            <h1 style="font-size: 24px; margin-bottom:0px; font-weight:bold;">Crea evento</h1>
            
            <div>
                <a href="{{ route('auth.events.index') }}" class="btn btn-success">Lista eventi</a>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    <div class="col-12">
        <form action="{{ route('auth.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- user_id --}}
            <input type="hidden" name="user_id" value="1">
    
            {{-- title_it --}}
            <div class="form-group">
                <label for="title_it">Titolo italiano</label>
                <input name="title_it" type="text" class="form-control @error('title_it') is-invalid @enderror" id="title_it" placeholder="Inserisci un titolo" value="{{old('title_it')}}">
                @error('title_it')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            {{-- title_en --}}
            <div class="form-group">
                <label for="title_en">Titolo inglese</label>
                <input name="title_en" type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" placeholder="Inserisci un titolo" value="{{old('title_en')}}">
                @error('title_en')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            {{-- description_it --}}
            <div class="form-group">
                <label for="description_it">Descrizione italiana</label>
                <textarea name="description_it" class="summernote form-control @error('description_it') is-invalid @enderror" id="description_it">
                    {{ old('description_it') }}
                </textarea>
                @error('description_it')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            {{-- description_en --}}
            <div class="form-group">
                <label for="description_en">Descrizione inglese</label>
                <textarea name="description_en" class="summernote form-control @error('description_en') is-invalid @enderror" id="description_en" rows="10">
                    {{ old('description_en') ? old('description_en') : ''  }}
                </textarea>
                @error('description_en')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- place --}}
            <div class="form-group">
                <label for="place">Luogo</label>
                <input name="place" type="text" class="form-control @error('place') is-invalid @enderror" id="place" placeholder="Inserisci un luogo" value="{{old('place')}}">
                @error('place')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- date --}}
            <div class="form-group">
                <label for="date">Data</label>
                <input class="form-control @error('date') is-invalid @enderror" name="date" type="datetime-local" id="date" value="{{old('date')}}">
                @error('date')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- phone_1 --}}
            <div class="form-group">
                <label for="phone_1">Telefono 1</label>
                <input name="phone_1" type="text" class="form-control @error('phone_1') is-invalid @enderror" id="phone_1" placeholder="Inserisci un numero di telefono (senza prefisso)" value="{{old('phone_1')}}">
                @error('phone_1')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- phone_2 --}}
            <div class="form-group">
                <label for="phone_2">Telefono 2</label>
                <input name="phone_2" type="text" class="form-control @error('phone_2') is-invalid @enderror" id="phone_2" placeholder="Inserisci un numero di telefono (senza prefisso)" value="{{old('phone_2')}}">
                @error('phone_2')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- whatsapp_1 --}}
            <div class="form-group">
                <label for="whatsapp_1">Whatsapp 1</label>
                <input name="whatsapp_1" type="text" class="form-control @error('whatsapp_1') is-invalid @enderror" id="whatsapp_1" placeholder="Inserisci un contatto whatsapp (senza prefisso)" value="{{old('whatsapp_1')}}">
                @error('whatsapp_1')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- whatsapp_2 --}}
            <div class="form-group">
                <label for="whatsapp_2">whatsapp_2</label>
                <input name="whatsapp_2" type="text" class="form-control @error('whatsapp_2') is-invalid @enderror" id="whatsapp_2" placeholder="Inserisci un contatto whatsapp (senza prefisso)" value="{{old('whatsapp_2')}}">
                @error('whatsapp_2')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- site --}}
            <div class="form-group">
                <label for="site">Sito</label>
                <input name="site" type="text" class="form-control @error('site') is-invalid @enderror" id="site" placeholder="Inserisci un sito web (con prefisso)" value="{{old('site')}}">
                @error('site')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- organizer --}}
            <div class="form-group">
                <label for="organizer">Organizzatore</label>
                <input name="organizer" type="text" class="form-control @error('organizer') is-invalid @enderror" id="organizer" placeholder="Inserisci un organizzatore" value="{{old('organizer')}}">
                @error('organizer')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            {{-- playbill --}}
            <div class="form-group">
                <label for="playbill">Locandina</label>
                <input style="padding-bottom: 35px;" aria-describedby="playbillHelp" class="form-control @error('playbill') is-invalid @enderror" name="playbill" type="file" id="playbill">
                <small id="playbillHelp" class="form-text text-muted">Attenzione! Se scatta un errore c'è bisogno di ricaricare la locandina.</small>
                @error('playbill')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
           
            
            {{-- SUBMIT --}}
            <button type="submit" class="btn btn-primary mt-3">Crea evento</button>
        
        </form>
    </div>
    </div>
</div>
@endsection

@section('summernote')
<script>
    $('.summernote').summernote({
        placeholder: 'Inserisci una descrizione',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endsection

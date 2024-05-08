@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12 mb-4" style="display: flex; justify-content:space-between; align-items: center;">
            <h1 style="font-size: 20px; margin-bottom:0px; font-weight:bold;">Modifica evento</h1>
            
            <div>
                <a href="{{ route('auth.events.index') }}" class="btn btn-success">Lista eventi</a>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <form action="{{ route('auth.events.update', $event['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        {{-- user_id --}}
        <input type="hidden" name="user_id" value="1">
        
        {{-- title_it --}}
        <div class="form-group">
            <label for="title_it">Titolo italiano</label>
            <input name="title_it" type="text" class="form-control @error('title_it') is-invalid @enderror" id="title_it" placeholder="Inserisci un titolo" value="{{old('title_it') ? old('title_it') : $event->title_it }}">
            @error('title_it')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        {{-- title_en --}}
        <div class="form-group">
            <label for="title_en">Titolo inglese</label>
            <input name="title_en" type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" placeholder="Inserisci un titolo" value="{{old('title_en') ? old('title_en') : $event->title_en }}">
            @error('title_en')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        {{-- description_it --}}
        <div class="form-group">
            <label for="description_it">Descrizione italiana</label>
            <textarea name="description_it" class="summernote form-control @error('description_it') is-invalid @enderror" id="description_it" rows="10">
                {{ old('description_it') ? old('description_it') : $event->description_it }}
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
                {{ old('description_en') ? old('description_en') : $event->description_en }}
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
            <input name="place" type="text" class="form-control @error('place') is-invalid @enderror" id="place" placeholder="Inserisci un luogo" value="{{old('place') ? old('place') : $event->place }}">
            @error('place')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- date --}}
        <div class="form-group">
            <label for="date">Data</label>
            <input class="form-control @error('date') is-invalid @enderror" name="date" type="datetime-local" id="date" value="{{ old('date') ? old('date') : $event->date }}">
            @error('date')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        
        {{-- phone_1 --}}
        <div class="form-group">
            <label for="phone_1">Telefono 1</label>
            <input name="phone_1" type="text" class="form-control @error('phone_1') is-invalid @enderror" id="phone_1" placeholder="Inserisci un numero di telefono (senza prefisso)" value="{{old('phone_1') ? old('phone_1') : $event->phone_1 }}">
            @error('phone_1')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- phone_2 --}}
        <div class="form-group">
            <label for="phone_2">Telefono 2</label>
            <input name="phone_2" type="text" class="form-control @error('phone_2') is-invalid @enderror" id="phone_2" placeholder="Inserisci un numero di telefono (senza prefisso)" value="{{old('phone_2') ? old('phone_2') : $event->phone_2 }}">
            @error('phone_2')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- whatsapp_1 --}}
        <div class="form-group">
            <label for="whatsapp_1">Whatsapp 1</label>
            <input name="whatsapp_1" type="text" class="form-control @error('whatsapp_1') is-invalid @enderror" id="whatsapp_1" placeholder="Inserisci un contatto whatsapp (senza prefisso)" value="{{old('whatsapp_1') ? old('whatsapp_1') : $event->whatsapp_1 }}">
            @error('whatsapp_1')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

  

        {{-- whatsapp_2 --}}
        <div class="form-group">
            <label for="whatsapp_2">Whatsapp 2</label>
            <input name="whatsapp_2" type="text" class="form-control @error('whatsapp_2') is-invalid @enderror" id="whatsapp_2" placeholder="Inserisci un contatto whatsapp (senza prefisso)" value="{{old('whatsapp_2') ? old('whatsapp_2') : $event->whatsapp_2 }}">
            @error('whatsapp_2')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- site --}}
        <div class="form-group">
            <label for="site">Sito</label>
            <input name="site" type="text" class="form-control @error('site') is-invalid @enderror" id="site" placeholder="Inserisci un sito web (con prefisso)" value="{{old('site') ? old('site') : $event->site }}">
            @error('site')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- organizer --}}
        <div class="form-group">
            <label for="organizer">Organizzatore</label>
            <input name="organizer" type="text" class="form-control @error('organizer') is-invalid @enderror" id="organizer" placeholder="Inserisci un organizzatore" value="{{old('organizer') ? old('organizer') : $event->organizer }}">
            @error('organizer')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- playbill --}}
        <div class="form-group">
            <label for="playbill">Locandina</label>
            <input style="padding-bottom: 35px;" class="form-control @error('playbill') is-invalid @enderror" name="playbill" type="file" id="playbill">
            @error('playbill')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        @if ($event->playbill)
            <img style="width: 100px; height: 100px; object-fit: cover; object-position: center;" src="{{ 'https://eventiprocida.s3.amazonaws.com/events_playbill/' . $event->playbill }}" alt=""> 
            <div class="custom-control custom-checkbox my-2">
                <input name="delete_playbill" type="checkbox" class="custom-control-input" id="delete_playbill" {{ old('delete_playbill') ? 'checked' : '' }}>
                <label class="custom-control-label" for="delete_playbill">Elimina locandina</label>
            </div>
        @endif
        
        {{-- SUBMIT --}}
        <button type="submit" class="btn btn-primary mt-3">Modifica post</button>
    
    </form>

    {{-- ELIMINA (MODAL BUTTON) --}}
    <h2 class="my-3">Elimina evento</h2>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        Elimina evento
    </button>
</div>

<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminazione evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Sei sicuro/a di voler eliminare questo evento? Dopo averlo eliminato non lo potrai più recuperare.
        </div>
        <div class="modal-footer">
            <form action="{{ route('auth.events.destroy', ['event' => $event->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Conferma">
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('summernote')
<script>
    $('.summernote').summernote({
        streetholder: 'Inserisci una descrizione',
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
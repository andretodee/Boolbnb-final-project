{{-- recupero template per la pagine admin --}}
@extends('layouts.admin')

{{-- struttura da inserire come content nel yield --}}
@section('content')
    <div class="container admin-container">
        <div class="row pt-5">
            <div class="col-12">
                <h1 class="float-left">Gestisci i tuoi appartamenti</h1>
                <a class="btn btn-info float-right" href="{{ route('admin.apartments.create') }}">Aggiungi appartamento</a>
            </div>
        </div>
        <hr>
        <div class="row mt-3 mb-3">
            @forelse ($apartments as $apartment)
                <div class="col-6 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-img">
                            <img class="img-thumbnail" src="{{asset('storage/' . $apartment->img)}}" alt="Immagine appartamento">
                        </div>
                      <a class="text-decoration-none" href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}">
                      <div class="card-body">
                        <h5 class="card-title">{{ $apartment->titolo }}</h5>
                        {{-- <p class="card-text">{{ $apartment->descrizione }}</p> --}}
                      </a>
                        <div class="row">
                            <div class="col-12 col-xl-4 d-flex justify-content-center btn-apartment-crud">
                                <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}" class="btn btn-primary float-left">Modifica</a>
                            </div>
                            <div class="col-12 col-xl-4 d-flex justify-content-center btn-apartment-crud">
                                <a href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}#graphic" class="btn btn-primary float-right">Statistiche</a>
                            </div>
                            <div class="col-12 col-xl-4 d-flex justify-content-center btn-apartment-crud">
                                <form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id])}}" method="post" onclick="return confirm('Sei sicuro di voler eliminare questo appartamento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Elimina</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary btn-lg">Promuovi questo appartamento</a>
                            </div>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-center">
                            <div class="custom-control custom-switch">
{{--                              <input type="checkbox" class="custom-control-input input-visibilita" id="visibilita-{{$apartment->id}}" data-id="{{$apartment->id}}" {{($apartment->visibilita == "1") ? 'checked' : ""}}>--}}
{{--                              <label class="custom-control-label" for="visibilita-{{$apartment->id}}">Visibilità annuncio</label>--}}
                                <input type="checkbox" data-id="{{ $apartment->id }}" name="visibilita" class="js-switch" {{ $apartment->visibilita == 1 ? 'checked' : '' }}>
                                <label class="js-switch" for="visibilita-{{$apartment->id}}">Visibilità annuncio</label>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            @empty
                <div class="col-12 mt-5 mb-5">
                    <div class="d-flex align-items-center flex-column text-center" >
                        <h4>Non ci sono ancora appartamenti da mostrare</h4>
                        <a class="btn btn-info btn-lg" href="{{ route('admin.apartments.create') }}">Aggiungi appartamento</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
@section('script')
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' ,color:'#237DC7'});
        });
        $(document).ready(function(){
            $('.js-switch').change(function () {
                let visibilita = $(this).prop('checked') === true ? 1 : 0;
                let apartmentId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.apartments.change.status') }}',
                    data: {'visibilita': visibilita, 'apartment_id': apartmentId},
                    success: function (data) {
                        console.log(data.message);
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>
@endsection


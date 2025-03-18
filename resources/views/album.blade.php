@extends('template.master')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header d-flex  justify-content-between">
                <h4>Album</h4>
                <a href="{{ route('album.download') }}" type="button" class="btn"
                            data-bs-target="#editProfile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M20.986 17c0-.105-.004-.211-.038-.316l-2-6A1 1 0 0 0 18 10h-.561l.682-.678a3 3 0 0 0 0-4.242c-.81-.812-2.068-1.078-3.121-.709V3c0-1.654-1.346-3-3-3S9 1.346 9 3v1.371c-1.052-.369-2.311-.103-3.121.709a3.003 3.003 0 0 0 .002 4.244l.68.676H6a1 1 0 0 0-.948.684l-2 6a1 1 0 0 0-.038.316C3 17 3 22 3 22a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1s0-5-.014-5M7.293 6.494a1 1 0 0 1 1.414 0L11 8.787V3a1 1 0 0 1 2 0v5.787l2.293-2.293a1.025 1.025 0 0 1 1.414 0a1 1 0 0 1 .002 1.412L12 12.59L7.293 7.908a1 1 0 0 1 0-1.414M6.721 12h1.852l3.429 3.41L15.43 12h1.852l1.667 5H5.055zM19 21H5v-3h14z" />
                            </svg>
                        </a>
            </div>
            <div class="card-body">

                @foreach ($album as $item)
                    <div class="accordion" id="accordion{{ $item->id }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $item->id }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $item->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $item->id }}">
                                    {{ $item->album }}
                                </button>
                            </h2>
                            <div id="collapse{{ $item->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordion{{ $item->id }}">
                                <div class="accordion-body">
                                    <div class="row">
                                        @foreach ($item->fotos as $itemfoto)
                                            <div class="col-md-4 mb-3">
                                                <div class="card mt-2" style="width: 18rem;">
                                                    <img src="{{ asset('storage/images/' . $itemfoto->foto) }}"
                                                        style="text-align: center;width: 285px; height: 200px;"
                                                        class="card-img-top" alt="...">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Films</div>

                <div class="panel-body">
                    <div id="fims-listing"></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/films.js') }}"></script>
@endpush
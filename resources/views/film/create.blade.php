@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Film</div>

                <div class="panel-body">

                    <div class="">
                        <form class="form-horizontal" action="" method="post" id="create-film">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="description" id="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Release Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="release_date" id="release_date" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group" id="rating">
                                <label class="control-label col-sm-2">Rating</label>
                                <label class="radio-inline">
                                    <input type="radio" name="rating" value="1"> 1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rating" value="2"> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rating" value="3"> 3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rating" value="4"> 4
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rating" value="5"> 5
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Ticket Price</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ticket_price" id="ticket_price" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Country</label>
                                <div class="col-sm-10">
                                    <input type="text" name="country" id="country" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Genre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="genre" id="genre" class="form-control"/>
                                    <p class="help-block">For mulitple please enter comma seprated </p>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="photo" id="photo" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">

</style>
@endsection
@push('scripts')
<script src="{{ asset('js/films.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    addFilm();
});
</script>
@endpush
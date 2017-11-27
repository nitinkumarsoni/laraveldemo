@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $film->name }}</div>

                <div class="panel-body">
                    <p>{{ $film->description }}</p>
                    <b>Release Date : </b> {{ $film->release_date }} <br />
                    <b>Rating : </b> {{ $film->rating }} <br />
                    <b>Ticket Price : </b> {{ $film->ticket_price }} <br />
                    <b>Country : </b> {{ $film->country }} <br />
                    @if (Auth::user())
                    <hr class="hr-primary"/>
                    <div class="">
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Comment</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary">Add Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">

</style>
@endsection

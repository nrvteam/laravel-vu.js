@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button
                        type="button"
                        class="btn btn-sm btn-primary"
                        data-toggle="modal"
                        data-target="#modal-movie"
                    > Add movie</button><hr/>
                        <h3>My movies</h3>
                    @include ('manager/_list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

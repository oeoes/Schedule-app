@extends('layout.master-new-version')

@section('content')

<div class="container mt-5">
    @foreach($lecturer as $l)
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card p-3 border-0 shadow-sm mb-2">
                    <div class="row">
                        <div class="col-3">
                            <div class="rounded-circle" style="height: 65px; width: 65px; overflow: hidden">
                                <img class="img-fluid" src="{{ asset('images/\/').$l->photo}}" alt="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h4">{{ $l->name }}</div>
                        </div>
                        <div class="col-3">
                            @if($l->is_claimed == 'n')
                            <a href="{{ route('claim.lecturer', ['id' => $l->id]) }}" class="btn btn-success form-control state">Claim</a>
                            @else
                            <div class="btn btn-secondary form-control state">Claimed</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
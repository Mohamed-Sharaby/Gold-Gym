@extends('dashboard.layouts.layout')

@section('title')
    {{ __('dashboard.company') }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('css/chat.css')}}">
    <link href="{{mix('css/app.css')}}">
@endpush
@section('content')

    <div class="card-box">
        <h4 class="mt-0 header-title">{{ $chat->user->name}}
        </h4>
        <div id="datatable-buttons" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="chat">
                    <admin-chat chat="{{$chat->id}}"/>
                </div>
            </div>

        </div>
    </div>


@endsection
@push('my-js')
    <script src="{{mix('js/app.js')}}"></script>
@endpush

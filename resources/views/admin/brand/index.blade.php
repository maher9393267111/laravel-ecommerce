@extends('layouts.admin')

@section('content')

<div>

    {{-- // message Section  --}}
    {{-- <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
            <h6 class="alert alert-success ">{{ session('message') }},</h6>    
            @endif
            <div class="me-md-3 me-xl-5">
                <h3>Categories Home</h3>
                <p class="mb-md-0">Your analytics dashboard template.</p>
            </div>




</div> --}}

<div>
    <livewire:admin.brands.index/>
</div>



</div>

@endsection
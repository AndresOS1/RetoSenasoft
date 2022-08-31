@extends('layouts.dashboard')
@section('content')
    <div class="col-12">
        <div class="col-6 d-flex justify-content-center">
            <form action="{{route('proveedor.index')}}" method="POST" >
                @csrf
                <div class="w-100 d-flex justify-content-center alagin-items-center">
                        <input type="text" class="form-control w-75">
                        <label for="">nombre del proveedor</label>
                </div>
            </form>
        </div>
    </div>
@endsection
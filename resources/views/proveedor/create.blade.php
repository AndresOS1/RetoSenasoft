 @extends('layouts.dashboard')
@section('content')
@include('sweetalert::alert')
    <div class="col-12 justify-content-center d-flex">
        <div class="col-6 d-flex justify-content-center">
            <form action="{{route('proveedor.store')}}" method="POST"  class="w-100">
                @csrf
                <div class="w-100 d-flex justify-content-center alagin-items-center flex-column">
                            <h1 class="d-flex">crear Proveedor</h1>
                </div>
                <div class="w-100 d-flex justify-content-center alagin-items-center flex-column">
                        <input type="text" class="form-control w-75" name="nombre">
                        <label for="" class="d-flex">nombre del proveedor</label>
                </div>
                <div class="w-100 d-flex justify-content-center alagin-items-center flex-column">
                         <button class="btn btn-primary w-75">aceptar</button>
                </div>

            </form>
        </div>
    </div>
@endsection 
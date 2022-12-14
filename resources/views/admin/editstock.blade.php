@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">

    <h5>Chỉnh sửa mẫu</h5>
    <hr>

    <form method="POST" action="{{ route('admin.editstock',['id'=>$stock->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row ">

            <div class="col-12">
                <label for="model" class="">{{ __('Mẫu') }}</label>
                <div class="form-group">
                    <div>
                        <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('name') ?? $stock->name}}" required autocomplete="model" autofocus>
                        @error('model')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="quantity" class="">{{ __('Số lượng') }}</label>
                <div class="form-group">
                    <div>
                        <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') ?? $stock->quantity}}" required autocomplete="quantity" autofocus>
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        
        <button type="submit" class="btn btn-primary ">Chỉnh sửa</button>
    
    </form>

</div>
    
@endsection
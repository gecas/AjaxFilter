
@extends('admin.index')

@section('admin')
<style>

    .form-control{
    	margin-bottom: 15px;
    }
</style>

<div class="container col-md-6 col-md-offset-3">

<h3 class="text-center">Sukurti naują produktą : </h3>

		<form method="POST" action="/products" enctype="multipart/form-data">
		{!! csrf_field() !!}

			<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-4 control-label">Pavadinimas</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="price" class="col-md-4 control-label">Kaina</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">

                    @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                <label for="file" class="col-md-4 control-label">Nuotrauka</label>

                <div class="col-md-6">
                    <input type="file" accept="image/*" class="form-control" name="file" value="{{ old('file') }}">

                    @if ($errors->has('file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                <label for="size" class="col-md-4 control-label">Dydis</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="size" value="{{ old('size') }}">

                    @if ($errors->has('size'))
                        <span class="help-block">
                            <strong>{{ $errors->first('size') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                <label for="category" class="col-md-4 control-label">Kategorija</label>

                <div class="col-md-6">
                    <select name="category" class="form-control" id="">
                        @foreach($categories as $category)
                            <option value="{!! $category->id !!}">{!! $category->title !!}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('category'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                <label for="color" class="col-md-4 control-label">Spalva</label>

                <div class="col-md-6">
                    <select name="color" class="form-control" id="">
                        @foreach($colors as $color)
                            <option value="{!! $color->id !!}">{!! $color->title !!}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('color') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

			<div class="form-group">
			<button type="submit" class="btn btn-primary form-control">Sukurti produktą</button>
			</div>


		</form>
		</div>

		
@endsection

@section('scripts')
<script>

</script>
@endsection
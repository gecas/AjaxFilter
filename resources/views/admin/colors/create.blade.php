
@extends('admin.index')

@section('admin')
<style>
    .form-control{
        margin-bottom: 15px;
    }
</style>
<div class="container col-md-6 col-md-offset-3">

<h3 class="text-center">Pridėti naują spalvą : </h3>

		<form method="POST" action="/colors">
		{!! csrf_field() !!}

			<div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                <label for="color" class="col-md-4 control-label">Spalva</label>

                <div class="col-md-6">
                    <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}">

                    @if ($errors->has('color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('color') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

			<div class="form-group">
			<button type="submit" class="btn btn-primary form-control">Pridėti spalvą</button>
			</div>


		</form>
		</div>

		
@endsection

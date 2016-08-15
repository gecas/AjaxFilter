
@extends('admin.index')

@section('admin')
<style>
    .colorpicker-2x .colorpicker-saturation {
        width: 200px;
        height: 200px;
    }
    
    .colorpicker-2x .colorpicker-hue,
    .colorpicker-2x .colorpicker-alpha {
        width: 30px;
        height: 200px;
    }
    
    .colorpicker-2x .colorpicker-color,
    .colorpicker-2x .colorpicker-color div {
        height: 30px;
    }
    .form-control{
    	margin-bottom: 15px;
    }
</style>

<div class="container col-md-6 col-md-offset-3">

<h3 class="text-center">Sukurti naują kategoriją : </h3>

		<form method="POST" action="/categories">
		{!! csrf_field() !!}

			<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                <label for="category" class="col-md-4 control-label">Kategorija</label>

                <div class="col-md-6">
                    <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}">

                    @if ($errors->has('category'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                <label for="color" class="col-md-4 control-label">Spalvos kodas</label>

                <div class="col-md-6">
                    <input id="cp" type="text" class="form-control" name="color" value="{{ old('color') }}">

                    @if ($errors->has('color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('color') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

			<div class="form-group">
			<button type="submit" class="btn btn-primary form-control">Sukurti kategoriją</button>
			</div>


		</form>
		</div>

		
@endsection

@section('scripts')
<script>
    $(function() {
        $('#cp').colorpicker({
            customClass: 'colorpicker-2x',
            sliders: {
                saturation: {
                    maxLeft: 200,
                    maxTop: 200
                },
                hue: {
                    maxTop: 200
                },
                alpha: {
                    maxTop: 200
                }
            }
        });
    });
</script>
@endsection
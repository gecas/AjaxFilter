@extends('admin.index')

@section('admin')

<div class="table-responsive">
	<h3 class="text-center">Spalvos</h3>
  <p class="text-center">
    <a href="/colors/create" class="btn btn-primary">Pridėti spalvą</a>
  </p>
  <table class="table table-striped table-hover">

    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Redaguoti</th>
            <th>Ištrinti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($colors as $color)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $color->title !!}</td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/colors/{!! $color->id !!}/edit">Redaguoti</a>
            </td>
           <td><button class="btn btn-danger" data-toggle="modal" data-target="#myColorDeleteModal" color-id="{!! $color->id !!}">Ištrinti</button></td>

         </tr>
         @endforeach
        </tbody>

  </table>

</div>


<!-- Modal -->
<div id="myColorDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti spalvą</h4>
      </div>
      <div class="modal-body">
      <p class="text-center"> Ar tikrai norite ištrinti spalvą ? </p>
      </div>
      <div class="modal-footer">
      <form action="" id="modal-color-delete-form" method="POST">
      {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
     <button type="submit" class="btn btn-danger">Ištrinti</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
        </form>
      </div>
    </div>

  </div>
</div>


@endsection
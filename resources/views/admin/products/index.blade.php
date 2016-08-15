@extends('admin.index')

@section('admin')

<div class="table-responsive">
	<h3 class="text-center">Produktai</h3>
  <p class="text-center">
    <a href="/products/create" class="btn btn-primary">Sukurti produktą</a>
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
		
        @foreach($products as $product)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $product->title !!}</td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/categories/{!! $product->id !!}/edit">Redaguoti</a>
            </td>
           <td><button class="btn btn-danger" data-toggle="modal" data-target="#myProductDeleteModal" product-id="{!! $product->id !!}">Ištrinti</button></td>

         </tr>
         @endforeach
        </tbody>

  </table>

</div>


<!-- Modal -->
<div id="myProductDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti preke</h4>
      </div>
      <div class="modal-body">
      <p class="text-center"> Ar tikrai norite ištrinti preke ? </p>
      </div>
      <div class="modal-footer">
      <form action="" id="modal-product-delete-form" method="POST">
      {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
     <button type="submit" class="btn btn-danger">Ištrinti</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
        </form>
      </div>
    </div>

  </div>
</div>


@stop

@section('scripts')
 <script>
  $('#myProductDeleteModal').on('show.bs.modal', function (event) {
    var product_id = $(event.relatedTarget).attr("product-id");
    var input = $(this).find("#modal-product-delete-form").attr("action", "/products/"+product_id);
  });
</script> 
@stop
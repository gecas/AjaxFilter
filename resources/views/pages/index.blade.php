@extends('layout')

@section('content')
<style>
	.categories{
		list-style: none;
		padding: 0;
		display: table;
		margin: auto;
	}
	.categories li{
		//float: left;
		display: inline;
		margin:0 4px;
	}
	.categories li a{
		padding: 6px;
		border-radius: 4px;
		color:#000;
		text-decoration: none;
		background-color: grey;
	}
	.categories li a:hover{
		background-color: lightblue;
	}
	label{
		font-weight: normal;
		color: #000;
	}

	/* Base for label styling */
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 25px;
  cursor: pointer;
}

/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  content: '';
  position: absolute;
  left:0; top: 2px;
  width: 17px; height: 17px;
  border: 1px solid #aaa;
  background: #f8f8f8;
  border-radius: 3px;
  box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
}
/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '✔';
  position: absolute;
  top: 3px; left: 4px;
  font-size: 18px;
  line-height: 0.8;
  color: #09ad7e;
  transition: all .2s;
}
/* checked mark aspect changes */
[type="checkbox"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
[type="checkbox"]:checked + label:after {
  opacity: 1;
  transform: scale(1);
}
/* disabled checkbox */
[type="checkbox"]:disabled:not(:checked) + label:before,
[type="checkbox"]:disabled:checked + label:before {
  box-shadow: none;
  border-color: #bbb;
  background-color: #ddd;
}
[type="checkbox"]:disabled:checked + label:after {
  color: #999;
}
[type="checkbox"]:disabled + label {
  color: #aaa;
}
/* accessibility */
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before {
  border: 1px dotted blue;
}

/* hover style just for information */
label:hover:before {
  border: 1px solid #4778d9!important;
}
.col-md-6{
	padding: 0;
	margin:0;
}
.loading-gif {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(/images/loader.gif) center no-repeat #fff;
}
.product-image{
	width: 225px;
	height: 300px;
	background-size:cover;
	background-position: center; 
	margin:4px 4px 4px 4px;
}

.product{
	padding: 4px;
	margin: 0;
}
.size-wrap-left{
	float: left;
	left: 0;
}
.size-wrap-right{
	float: right;
	right: 0;
}

</style>
<div class="container" style="margin-top:50px;">

            <div class="col-md-3" style="background:lightgrey; height:600px;">
            <h4 class="text-center">FILTRUOTI</h4>

            <h6 class="text-center">SPALVA</h6>

		    @foreach($colors as $color)
				<div class="form-group">
					<input type="checkbox" id="test{!! $color->id !!}" name="color[]" v-on:change="filterItems" v-model="checkedColors" value="{!! $color->slug !!}" />
		            <label for="test{!! $color->id !!}">{!! $color->title !!}</label>
				</div>
		    @endforeach

		    <h6 class="text-center">DYDIS</h6>

		    <div class="col-md-12">

		    <div class="col-md-6 pull-left">
			    <div class="form-group">
						<input type="checkbox" name="size[]" v-on:change="filterItems" v-model="checkedSizes" id="sizeS" value="s" />
			            <label for="sizeS">S</label>
				</div>
				<div class="form-group">
						<input type="checkbox" name="size[]" v-on:change="filterItems" v-model="checkedSizes" id="sizeM" value="m" />
			            <label for="sizeM">M</label>
				</div>

			</div>

			<div class="col-md-6 pull-right">
			    <div class="form-group">
							<input type="checkbox" name="size[]" v-on:change="filterItems" v-model="checkedSizes" id="sizeL" value="l" />
				            <label for="sizeL">L</label>
				</div>

				<div class="form-group">
							<input type="checkbox" name="size[]" v-on:change="filterItems" v-model="checkedSizes" id="sizeXL" value="xl" />
				            <label for="sizeXL">XL</label>
				</div>
				
			</div>

			</div>
		  
            </div>

            <div class="col-md-9" >
            <div class="col-md-12" style="background:lightgrey; height:150px;">
            <h4 class="text-center">SUKNELES</h4>
            <ul class="categories">
           {{--  @foreach($categories as $category)
					<li><a href="/kategorija/{!! $category->slug !!}">{!! $category->title !!}</a></li>
		    @endforeach	 --}}
            </ul>
            </div>
            <div class="col-md-12">
            	<div v-for="product in products" track-by="$index" class="product col-md-3">
	            	<div class="product-image"
				       :style="{ backgroundImage: 'url(' + product.image_path+product.image_name + ')' }">
				  </div>
				  <p class="text-left">@{{ product.title }}</p>
				  <p class="">Dydis : @{{ product.size }}</p>
				  <b>@{{ product.price | currency }}</b>
			     </div>
            </div>
            </div>

</div>
@stop
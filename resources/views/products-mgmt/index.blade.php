@extends('products-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of employees</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('products-management.create') }}">Add new employee</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('products-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Item Name', 'title'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['title'] : '', isset($searchingVals) ? $searchingVals['title'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="box">
      <div class="row">
        <div class="col-sm-12">           
           
            @foreach ($products as $product)
              <!-- /.item -->
              <div class"row">
              <div class="col-md-4"> 
                          <div class="box box-solid">
                                      <div class="product-img">
                                      <img src="../{{$product->picture }}" width="50px" height="50px"/>
                                      </div>
                                      <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{ $product->title }}<span
                                            class="label label-danger pull-right">{{ $product->price }}</span></a>
                                        <span class="product-description">
                                        {{ $product->description }}
                                            </span>
                                      </div>
                          </div>
               </div>
               </div>

            @endforeach
           
           
         
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($products)}} of {{count($products)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection
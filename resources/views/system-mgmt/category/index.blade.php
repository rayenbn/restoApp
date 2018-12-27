@extends('system-mgmt.category.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of categories</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('category.create') }}">Add new Category</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('category.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="box">
      <div class="row">
        <div class="col-sm-12">
         
            {{$categories}}
            @foreach ($categories as $category)
               <!-- <tr role="row" class="odd">
                  <td>{{ $category->category_name }}</td>
                  <td>{{ $category->order }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('category.destroy', ['id' => $category->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                        <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                    </form>
                  </td>-->
               

              <!-- /.item -->
              <div class"row">
              <div class="col-md-4"> 
                          <div class="item">
                                      <div class="product-img">
                                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                                      </div>
                                      <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{ $category->category_name }}<span
                                            class="label label-danger pull-right">$350</span></a>
                                        <span class="product-description">
                                        {{ $category->order }}
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
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($categories)}} of {{count($categories)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $categories->links() }}
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
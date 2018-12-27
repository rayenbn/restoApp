@extends('system-mgmt.category.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new caegory</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('category.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                            <label for="category_name" class="col-md-4 control-label">Category Name</label>

                            <div class="col-md-6">
                                <input id="category_name" type="text" class="form-control" name="category_name" value="{{ old('category_name') }}" required autofocus>

                                @if ($errors->has('category_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            <label for="order" class="col-md-4 control-label">Category Order</label>

                            <div class="col-md-6">
                                <input id="order" type="text" class="form-control" name="order" value="{{ old('order') }}" required autofocus>

                                @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('order') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

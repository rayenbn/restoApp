@extends('system-mgmt.tables.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new table</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('tables.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('table_number') ? ' has-error' : '' }}">
                            <label for="table_number" class="col-md-4 control-label">Table Number</label>

                            <div class="col-md-6">
                                <input id="table_number" type="text" class="form-control" name="table_number" value="{{ old('table_number') }}" required autofocus>

                                @if ($errors->has('table_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('table_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <!-- <div class="form-group{{ $errors->has('country_code') ? ' has-error' : '' }}">
                            <label for="country_code" class="col-md-4 control-label">Country Code</label>

                            <div class="col-md-6">
                                <input id="country_code" type="text" class="form-control" name="country_code" value="{{ old('country_code') }}" required>
                                @if ($errors->has('country_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->

                         <div class="form-group">
                            <label class="col-md-4 control-label">Table status</label>
                            <div class="col-md-6">
                                <select class="form-control js-country" name="status">
                                    <option value="0">active</option>
                                        <option value="1">desactive</option>
                                  
                                </select>
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

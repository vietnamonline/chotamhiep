@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{route('blog.tags.create')}} " class="btn btn-rounded btn-info pull-right">{{__('Add New Brand')}}</a>
        </div>
    </div>

    <br>
    <div class="panel">
        <div class="panel-heading bord-btm clearfix pad-all h-100">
            <h3 class="panel-title pull-left pad-no">{{__('Tags')}}</h3>
            {{--<div class="pull-right clearfix">--}}
                {{--<form class="" id="sort_brands" action="" method="GET">--}}
                    {{--<div class="box-inline pad-rgt pull-left">--}}
                        {{--<div class="" style="min-width: 200px;">--}}
                            {{--<input type="text" class="form-control" id="search" name="search">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        </div>
        <div class="panel-body">
            <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Date')}}</th>
                    <th width="10%">{{__('Options')}}</th>
                </tr>

                </thead>
                <tbody>
                    @foreach($data as $value)
                        <tr>
                            <td>{{$value['id']}}</td>
                            <td>{{$value['blog_tags_name']}}</td>
                            <td>{{Carbon\Carbon::parse($value['created_at'])->format('d/m/yy')}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{Route('blog.tags.edit',['id'=>$value['id']])}}">{{__('Edit')}}</a></li>
                                        <li><a href="{{Route('blog.tags.delete',['id'=>$value['id']])}}" onclick="return confirm('Are you sure?')">{{__('Delete')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="panel-footer text-right">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection

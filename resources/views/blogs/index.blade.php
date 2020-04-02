@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{route('blog.create')}} " class="btn btn-rounded btn-info pull-right">{{__('Add New Brand')}}</a>
        </div>
    </div>

    <br>

    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading bord-btm clearfix pad-all h-100">
            <h3 class="panel-title pull-left pad-no">{{__('Category')}}</h3>
            <div class="pull-right clearfix">
                <form class="" id="sort_brands" action="{{ route('blog.index') }}" method="GET">
                    <div class="box-inline pad-rgt pull-left">
                        <div class="" style="min-width: 200px;">
                            <input type="text" class="form-control" id="search" placeholder="Search" name="search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Category Id')}}</th>
                    <th>{{__('Tags Id')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Status')}}</th>
                    <th>{{__('Date')}}</th>
                    <th width="10%">{{__('Options')}}</th>
                </tr>

                </thead>
                <tbody>
                    @foreach($data as $value)
                        <tr>
                            <td>{{$value['id']}}</td>
                            <td>{{$value['category_name']}}</td>
                            <td>{{$value['tags_name']}}</td>
                            <td>{{$value['blog_title']}}</td>
                            <td><label class="switch">
                                    <input onchange="update_featured(this)" value="{{$value['id']}}" type="checkbox"
                                    {{$value['blog_status'] == 0?'checked':''}}>
                                    <span class="slider round"></span></label></td>
                            <td>{{Carbon\Carbon::parse($value['created_at'])->format('d/m/yy')}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ route('blog.update',['id'=>$value['id']]) }}">{{__('Edit')}}</a></li>
                                        <li><a href="{{ route('blog.del',['id'=>$value['id']]) }}" onclick="return confirm('Are you sure?')">{{__('Delete')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
            <div class="clearfix">
                <div class="pull-right">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var Typeahead = require('typeahead');
        console.log(Typeahead);
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('blog.active') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured categories updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection

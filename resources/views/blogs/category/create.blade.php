@extends('layouts.app')

@section('content')
    <form class="form-horizontal" action="{{ route('blog.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-lg-12">
            <div class="panel">
                <div id="home" class="container tab-pane active" style="width: 100%;"><br>
                    <form class="form-horizontal" action="{{ route('blog.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">{{__('Name')}}</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="banner">{{__('Image')}}</label>
                        <div class="col-sm-10">
                            <input type="file" id="image" name="image" class="form-control" multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

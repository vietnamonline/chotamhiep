@extends('layouts.app')

@section('content')
    <form class="form-horizontal" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

    <div class="col-lg-12">
        <div class="panel">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active " data-toggle="tab" href="#home">{{__('Blogs Information')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Image</a>
                </li>
            </ul>

            <!--Horizontal Form-->
            <!--===================================================-->

            <div class="tab-content" style="margin-bottom: 50px;">
                <div id="home" class="container tab-pane active" style="width: 100%;"><br>
                    {{--<form class="form-horizontal" action="{{ route('blog.update') }}" method="POST" enctype="multipart/form-data">--}}
                        {{--@csrf--}}
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">{{__('Title')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="{{__('Title')}}" id="name" name="title" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">{{__('Category')}}</label>
                                <div class="col-sm-10">
                                    <select class="category" name="state" onclick="getValue()">
                                        @if($category)
                                            @foreach($category as $key => $value)
                                                <option value="{{ $value['id'] }}">{{ $value['blog_category_name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">{{__('Tags')}}</label>
                                <div class="col-sm-10">
                                    <select class="tags" name="state">
                                        @if($tags)
                                            @foreach($tags as $key => $value)
                                                <option value="{{ $value['id'] }}">{{ $value['blog_tags_name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="banner">{{__('Banner')}} <small>(200x300)</small></label>
                                <div class="col-sm-10">
                                    <input type="file" id="banner" name="banner" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('Description')}}</label>
                                <div class="col-sm-10">
                                    <textarea name="content" rows="8" id="content" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('SEO Title')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="seo_title" placeholder="{{__('SEO Title')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('SEO Content')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="seo_content" placeholder="{{__('SEO Content')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('SEO Key')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="seo_key" placeholder="{{__('SEO Key')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('Active')}}</label>
                                <div class="col-sm-10">
                                    <label class="switch" style="top: 7px;">
                                        <input onchange="update_featured(this)" value="0" type="checkbox" name="status">
                                        <span class="slider round"></span></label>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                        </div>
                    {{--</form>--}}
                </div>
                <div id="menu1" class="container tab-pane fade" style="width: 100%;"><br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="banner">{{__('Image')}}</label>
                        <div class="col-sm-10">
                            <input type="file" id="image" name="image[]" class="form-control" multiple>
                        </div>
                    </div>
                    <div class="col-sm-3 item-image" data-image-id="123"><img id="myImg" src="https://pystravel.vn/uploads/posts/albums/415/3223b33e2d950d9406c994fe2fe76139.jpg" alt="Snow" style="width:100%;max-width:300px">
                        <br>
                        <p class="text-center">adasd</p>
                    </div>
                    <div class="col-sm-3 item-image" data-image-id="321"><img id="myImg" src="https://pystravel.vn/uploads/posts/albums/415/3223b33e2d950d9406c994fe2fe76139.jpg" alt="Snow" style="width:100%;max-width:300px">
                        <br>
                        <p class="text-center">adasd</p>
                    </div>
                    <input type="hidden" name="image_id">
                    <input type="hidden" name="category">
                    <input type="hidden" name="tags">
                </div>
            </div>


        </div>
    </div>
    </form>
@endsection
@section('script')
    <script src="/bower_components/tinymce/tinymce.min.js"></script>
    <script>
        $(".category").select2()
            .on("select2:select", function (e) {
                var selected_element = $(e.currentTarget);
                var select_val = selected_element.val();
                $("input[name='category']").val(select_val);
            });
        $(".tags").select2()
            .on("select2:select", function (e) {
                var selected_element = $(e.currentTarget);
                var select_val = selected_element.val();
                $("input[name='category']").val(select_val);
            });
        $(document).ready(function() {
            $("input[name='category']").val($('.category').val());
            $("input[name='tags']").val($('.tags').val());

            $('.item-image').click(function () {
                if ($(this).hasClass('disabled_item') == true){
                    $(this).removeClass('disabled_item');

                }else{
                    $(this).addClass('disabled_item');
                }

                // get id image
                var array_avatar_delele = [];
                $('.item-image').each(function(){
                    if($(this).hasClass('disabled_item')){
                        array_avatar_delele.push($(this).attr('data-image-id'))
                    }
                });

                array_avatar_delele.join(',');
                $('input[name="image_id"]').val(array_avatar_delele);
            })
        });
        tinymce.init({
            selector: '#content',
            width: 800,
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help',
                'insertdatetime media nonbreaking save table contextmenu directionality'
            ],
            contextmenu: "paste | link image inserttable | cell row column deletetable",
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help',
            menu: {
                favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
            },
            // contextmenu_never_use_native: true,
            menubar: 'favs file edit view insert format tools table help',
            // content_css: 'css/content.css',
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'postAcceptor.php');
                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), fileName(blobInfo));
                xhr.send(formData);
            }
        });
        function update_featured(el){
            if(el.checked){
                $("input[name='status']").val(1);
            }
            else{
                $("input[name='status']").val(0);
            }

        }


    </script><meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

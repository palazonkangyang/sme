@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["url" => route("admin.page.update", $page->id), "files" => true]) !!}

    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="form-group{!! $errors->has("name") ? " has-error" : "" !!}">
                        {!! Form::label("Name") !!}
                        {!! Form::text("name", Input::old("name", $page->name), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("name") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("slug") ? " has-error" : "" !!}">
                        {!! Form::label("Slug") !!}

                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">{!! url() !!}/</span>
                            {!! Form::text("slug", Input::old("slug", $page->slug), ["class" => "form-control"]) !!}

                        </div>
                        <p class="help-block">{{ $errors->first("slug") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("content") ? " has-error" : "" !!}">
                        {!! Form::label("Content") !!}
                        {!! Form::textarea("content", Input::old("content", $page->content), ["class" => "form-control", "id" => "editor"]) !!}
                        <p class="help-block">{{ $errors->first("content") }}</p>
                    </div>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Banner Information</h3>
                </div>

                <div class="box-body">
                    <div class="form-group{!! $errors->has("banner_title") ? " has-error" : "" !!}">
                        {!! Form::label("Banner Title") !!}
                        {!! Form::text("banner_title", Input::old("banner_title", $page->banner_title), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("banner_title") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("banner_sub_title") ? " has-error" : "" !!}">
                        {!! Form::label("Banner sub Title") !!}
                        {!! Form::text("banner_sub_title", Input::old("banner_sub_title", $page->banner_sub_title), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("banner_sub_title") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("banner_button_url") ? " has-error" : "" !!}">
                        {!! Form::label("Button URL") !!}
                        {!! Form::text("banner_button_url", Input::old("banner_button_url", $page->banner_button_url), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("banner_button_url") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("banner_image") ? " has-error" : "" !!}">
                        {!! Form::label("Banner Image") !!}
                        {!! Form::file("banner_image") !!}
                        <p class="help-block">{{ $errors->first("banner_image") }}</p>
                    </div>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Meta Information</h3>
                </div>
                <div class="box-body">
                    <div class="form-group{!! $errors->has("meta_title", $page->meta_title) ? " has-error" : "" !!}">
                        {!! Form::label("Meta Title") !!}
                        {!! Form::text("meta_title", Input::old("meta_title", $page->meta_title), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("meta_title") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("meta_keywords") ? " has-error" : "" !!}">
                        {!! Form::label("Meta Keywords") !!}
                        {!! Form::textarea("meta_keywords", Input::old("meta_keywords", $page->meta_keywords), ["class" => "form-control", "rows" => 3]) !!}
                        <p class="help-block">{{ $errors->first("meta_keywords") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("meta_description") ? " has-error" : "" !!}">
                        {!! Form::label("Meta Description") !!}
                        {!! Form::textarea("meta_description", Input::old("meta_description", $page->meta_description), ["class" => "form-control", "rows" => 3]) !!}
                        <p class="help-block">{{ $errors->first("meta_description") }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            @if (! empty($page->banner_image))
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Banner Image</h3>
                    </div>

                    <div class="box-body">
                        <img src="{!! $page->getBannerURL() !!}" class="img-responsive"/>
                    </div>
                </div>
            @endif

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Additional Information</h3>
                </div>

                <div class="box-body">
                    <div class="form-group{!! $errors->has("template") ? " has-error" : "" !!}">
                        {!! Form::label("Page Template") !!}
                        {!! Form::select("template", ["" => "Select:"] + $page->pageTemplates(), Input::old("template", $page->template), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("template") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $page->allStatuses(), Input::old("status", $page->status), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                </div>

                <div class="box-footer">
                    {!! Html::link(Route("admin.page.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
                    {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript">
//        $(function () {
//            CKEDITOR.replace('editor');
//        });
    </script>

@endsection
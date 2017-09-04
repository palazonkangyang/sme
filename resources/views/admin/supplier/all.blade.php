@extends('admin.layouts.main')
@section('content')
    <div class="row" id="listView">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>
                    <div class="box-tools">
                        {!! Form::open(["id" => "listViewForm", "method" => "get"]) !!}
                        <div style="width: 150px;" class="input-group input-group-sm">
                            <input type="text" placeholder="Search" value="{{ Input::get("q") }}"
                                   class="form-control pull-right" name="q"/>

                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box-header -->
                @if($items->count() > 0)
                    {!! Form::open( [ "id" => "listItemsForm" ] ) !!}
                    {!! ListView::getParamFields() !!}

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <th>{!! ListView::sortColumn("Email", "email") !!}</th>
                                <th>{!! ListView::sortColumn("Company", "company_name") !!}</th>
                                <th>{!! ListView::sortColumn("Contact Person", "contact_person") !!}</th>
                                <th>{!! ListView::sortColumn("Contact No", "contact_no") !!}</th>
                                <th>{!! ListView::sortColumn("Featured", "featured") !!}</th>
                                <th>{!! ListView::sortColumn("Status", "status") !!}</th>
                                <th>{!! ListView::sortColumn("Created At", "created_at") !!}</th>
                                <th>{!! ListView::sortColumn("Updated At", "updated_at") !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{!! $ItemNumberStart++ !!}</td>
                                    <td>
                                        {{ $item->email }} <br/>
                                        
                                        <a href="{!! route("admin.supplier.edit", [$item->id]) !!}"><i
                                                    class="fa fa-edit"></i> Edit</a>

                                        @if($item->role !==0)
                                            &nbsp;&nbsp;<a class="delete-confirm"
                                                           href="{!! route("admin.supplier.delete", [$item->id]) . "?_token=" . csrf_token() !!}"><i
                                                        class="fa fa-trash"></i> Delete</a>
                                        @endif
                                    </td>
                                    <td>{{ $item->company_name }}</td>
                                    <td>{{ $item->contact_person }}</td>
                                    <td>{{ $item->contact_no }}</td>
                                    <td>{{ $item->featured == 1 ? "Not Featured" : "Featured" }}</td>
                                    <td>{{ $item->status == 1 ? "Active" : "Inactive" }}</td>
                                    <td>{{ $item->getCreatedAtFormatted() }}</td>
                                    <td>{{ $item->getUpdatedAtFormatted()  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! Form::close() !!}
                    {!! $items->appends($paginationAppends)->render() !!}
                @else
                    <div class="alert alert-info">
                        @if( Input::get("q") )
                            Hmm .., There is nothing matched for the keyword
                            <i><strong>{{ Input::get("q") }}</strong></i>
                            . You may try to search with other keyword.
                        @else
                            Hmm .., There is nothing to display here yet.
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
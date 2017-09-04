@extends('buyer.layouts.main')
@section('content')
    <div class="row" id="listView">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>
                    
                </div>


                <!-- /.box-header -->
                @if($items!=[])
                    {!! Form::open( [ "id" => "listItemsForm" ] ) !!}
                    {!! ListView::getParamFields() !!}

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <th>{!! ListView::sortColumn("Location", "location") !!}</th>
                                <th>Product</th>
                                <th>{!! ListView::sortColumn("Created At", "created_at") !!}</th>
                                <th>{!! ListView::sortColumn("Updated At", "updated_at") !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        {{ $item->name }} <br/>
                                        <a href="{!! route("buyer.collection.product.edit", [$item->id]) !!}"><i
                                                    class="fa fa-edit"></i> Edit</a>

                                        @if($item->role !==0)
                                            &nbsp;&nbsp;<a class="delete-confirm"
                                                           href="{!! route("buyer.collection.product.delete", [$item->id]) . "?_token=" . csrf_token() !!}"><i
                                                        class="fa fa-trash"></i> Delete</a>
                                        @endif
                                    </td>
                                    <td>{{ $item->getProduct->name }}</td>
                                    <td>{{ $item->getCreatedAtFormatted() }}</td>
                                    <td>{{ $item->getUpdatedAtFormatted()  }}</td>
                                </tr>
                            @endforeach
                            </tbody>                        </table>
                    </div>
                    {!! Form::close() !!}
                    
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
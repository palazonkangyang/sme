@extends('supplier.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-5 col-lg-offset-3">
            
           
                    {!! Form::open( [ "id" => "listItemsForm" ] ) !!}
                    {!! ListView::getParamFields() !!}
                  <div class="row" id="listView">
        <div class="col-xs-12">
            <div class="box">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Ticket Number</th>
                                <th>Product</th>
                                <th>Collection Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                           <?php $i = 1; ?>
                           
                            @if($items !=[])
                            @foreach($items as $key=>$item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td type="hidden">{{ $tickets_no }}</td>
                                    <td>{{ $item->name }}</td>
                                    @if($item->status == "processed")
                                    <?php $status = 'Collected';?>
                                    <td>{{ $status }}</td>
                                    <td> <a style="visibility: visible;" href="{!! route("supplier.collection.product.edit",[$item->id]) !!}"><i
                                                    class="fa fa-edit" ></i> Action</a></td>
                                    @else
                                    <?php $status = 'Not Collected';?>
                                    <td>{{ $status }}</td>
                                    <td> <a style="visibility: visible;" href="{!! route("supplier.collection.product.verification.post",[$item->id]) !!}"><i
                                                    class="fa fa-edit" ></i> Action</a></td>
                                    @endif                                                                                                            
                              
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                    <td colspan="5" align="center">Hmm .., There is nothing to display here yet.</td></tr>
                        @endif

                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    {!! Form::close() !!}
                   
           
        </div>
    </div>
@endsection
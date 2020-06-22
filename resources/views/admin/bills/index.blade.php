@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('adminPanel.Invoices')}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header {{session('locale')=='ar' ? 'text-left' : 'text-right'}}">
                    <a class="btn btn-success" href="{{route('admin.bills.create')}}"><i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body" style="overflow: auto">
                    <table id="bills" class="table-striped table">
                        <thead>
                        <tr>
                            <th>{{__('bills.branch_name')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Address')}}</th>
                            <th>{{__('bills.tax_number')}}</th>
                            <th>{{__('bills.bill_number')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                        </thead>
                        @foreach(\App\Bill::all() as $item)
                            <tr>
                                <td>{{$item->branch['name']}}</td>
                                <td>{{$item['phone']}}</td>
                                <td>{{$item['address']}}</td>
                                <td>{{$item['tax_number']}}</td>
                                <td>{{$item['bill_number']}}</td>
                                <td class="d-flex">
                                    <a class="btn btn-primary ml-2" href="{{route('admin.bills.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                    <form class="form-inline" action="{{route('admin.bills.destroy', $item)}}" method="post" onsubmit="return confirm('{{__('Are you sure ?')}}')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="bills"></x-datatable>
@endsection
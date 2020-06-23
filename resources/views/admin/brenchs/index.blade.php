@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <h4 class="col-12 text-center mb-3">{{__('branch.all_header')}}</h4>
        <table id="brench" class="table table-bordered">
            <thead>
                <th>{{__('branch.name')}}</th>
                <th>{{__('branch.country')}}</th>
                <th>{{__('branch.city')}}</th>
                <th>{{__('branch.address')}}</th>
                <th>{{__('branch.manger_phone')}}</th>
                <th>{{__('branch.tax_number')}}</th>
                <th>{{__('branch.tax_image')}}</th>
                <th>{{__('branch.email')}}</th>
                <th>{{__('branch.long')}}</th>
                <th>{{__('branch.lat')}}</th>
                <th>{{__('branch.controller')}}</th>
            </thead>
            @foreach($brenchs as $brench)
                <tr>
                    <td>{{$brench->name}}</td>
                    <td>{{$brench->country}}</td>
                    <td>{{$brench->city}}</td>
                    <td>{{$brench->address}}</td>
                    <td>{{$brench->manger_phone}}</td>
                    <td>{{$brench->tax_number}}</td>
                    <td>
                        <img class="img-thumbnail w-100" src="{{asset($brench->tax_image)}}">
                    </td>
                    <td>{{$brench->email}}</td>
                    <td>{{$brench->long}}</td>
                    <td>{{$brench->lat}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('admin.brenchs.edit',$brench)}}">
                            {{__('branch.edit')}}
                        </a>
                        <form action="{{route('admin.brenchs.destroy',$brench)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                {{__('branch.delete')}}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if($brenchs->count() == 0)
                <tr>
                    <td colspan="11">
                        <h4 class="col-12 text-center">
                            {{__('branch.empty')}}
                        </h4>
                    </td>
                </tr>
            @endif
        </table>
    </div>
@endsection
@section('javascript')
    <x-datatable id="brench"></x-datatable>
@endsection


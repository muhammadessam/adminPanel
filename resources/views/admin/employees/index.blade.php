@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        @if(@Route::current()->getName() == "admin.employees.index")
            <h3 class="col-12 text-center">{{__('human_r.all_employees')}}</h3>
        @elseif(@Route::current()->getName() == "admin.stoned_emps")
            <h3 class="col-12 text-center">{{__('human_r.stoned_employees')}}</h3>
        @elseif(@Route::current()->getName() == "admin.active_emps")
            <h3 class="col-12 text-center">{{__('human_r.active_employees')}}</h3>
        @elseif(@Route::current()->getName() == "admin.brench_emps")
            <h3 class="col-12 text-center">
                {{__('human_r.search in brench')}}
                {{$brench->name}}
            </h3>
        @endif
        <table class="table table-bordered mt-3">
            <tr>
                <th>{{__('employee.name')}}</th>
                <th>{{__('employee.nation')}}</th>
                <th>{{__('employee.job')}}</th>
                <th>{{__('employee.identity_number')}}</th>
                <th>{{__('employee.phone')}}</th>
                <th>{{__('employee.bank_account')}}</th>
                <th>{{__('employee.sex')}}</th>
                <th>{{__('employee.salary')}}</th>
                <th>{{__('employee.status')}}</th>
                <th>{{__('employee.brench')}}</th>
                <th>{{__('branch.controller')}}</th>
            </tr>
            @foreach($emps as $emp)
                <tr>
                    <th rowspan="2">{{$emp->name}}</th>
                    <th>{{$emp->nation}}</th>
                    <th>{{$emp->job}}</th>
                    <th>{{$emp->identity_number}}</th>
                    <th>{{$emp->phone}}</th>
                    <th>{{$emp->bank_account}}</th>
                    <th>{{$emp->sex}}</th>
                    <th>{{$emp->salary}}</th>
                    <th>{{__('employee.'.$emp->status)}}</th>
                    <th>{{$emp->brench->name}}</th>
                    <th rowspan="2">
                        <a class="btn btn-info" href="{{route('admin.employees.edit',$emp)}}">
                            {{__('employee.edit')}}
                        </a>
                        <a class="btn mt-2 btn-warning" href="{{route($emp->status == "stoned"?'admin.activating':'admin.stoning',$emp)}}">
                            {{__('employee.change status')}}
                        </a>
                    </th>
                </tr>
                <tr>
                    <td colspan="3">
                        {{__('employee.image')}}
                        <hr>
                        <img height="80px"  width="200px" class="img-thumbnail" src="{{asset($emp->image)}}">
                    </td>
                    <td colspan="3">
                        {{__('employee.identity_img')}}
                        <hr>
                        <img height="80px" width="200px" class="img-thumbnail" src="{{asset($emp->identity_img)}}">
                    </td>
                    <td colspan="3">
                        {{__('employee.contract_img')}}
                        <hr>
                        <img height="80px" width="200px" class="img-thumbnail" src="{{asset($emp->contract_img)}}">
                    </td>
                </tr>
            @endforeach
            @if($emps->count() == 0)
                <tr>
                    <td colspan="11">
                        <h4 class="col-12 text-center">{{__('employee.empty')}}</h4>
                    </td>
                </tr>
            @endif
        </table>
    </div>
@endsection

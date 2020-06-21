@extends('admin.layout.layout')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('adminPanel.Settings')}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.settings.update', 1)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="is_site_active">{{__('adminPanel.is_site_active')}}</label>
                            <select class="form-control" name="is_site_active" id="is_site_active">
                                <option {{\App\Models\Settings::all()->first()->is_site_active ?'selected':'' }} value="1">{{__('Active')}}</option>
                                <option {{!\App\Models\Settings::all()->first()->is_site_active ?'selected':'' }} value="0">{{__('Not Active')}}</option>
                            </select>
                            <x-error name="is_site_active"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="program_status">{{__('adminPanel.is_program_active')}}</label>
                            <select class="form-control" name="program_status" id="program_status">
                                <option {{\App\Models\Settings::all()->first()->program_status ?'selected':'' }} value="1">{{__('Active')}}</option>
                                <option {{!\App\Models\Settings::all()->first()->program_status ?'selected':'' }} value="0">{{__('Not Active')}}</option>
                            </select>
                            <x-error name="program_status"></x-error>
                        </div>

                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{ __('Save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
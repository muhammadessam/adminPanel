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
                    <form action="{{ route('admin.settings.update', \App\Models\Settings::all()->first())}}" method="post">
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

                        <div class="row">
                            <div class="col-6">
                                <label for="closingMessageEnglish">{{__('adminPanel.closing_message')}} - {{__('English')}}</label>
                                <textarea class="form-control msg" name="message_en" id="message_en" cols="30" rows="10">
                                    {{\App\Models\Settings::all()->first()->trans->where('lang_code', 'en')->first()->message}}
                                </textarea>
                                <x-error name="message_en"></x-error>
                            </div>
                            <div class="col-6">
                                <label for="closingMessageArabic">{{__('adminPanel.closing_message')}} - {{__('Arabic')}}</label>
                                <textarea class="form-control msg" name="message_ar" id="message_ar" cols="30" rows="10">
                                    {{\App\Models\Settings::all()->first()->trans->where('lang_code', 'ar')->first()->message}}
                                </textarea>
                                <x-error name="message_ar"></x-error>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="program_status">{{__('adminPanel.is_program_active')}}</label>
                            <select class="form-control" name="program_status" id="program_status">
                                <option {{\App\Models\Settings::all()->first()->program_status ?'selected':'' }} value="1">{{__('Active')}}</option>
                                <option {{!\App\Models\Settings::all()->first()->program_status ?'selected':'' }} value="0">{{__('Not Active')}}</option>
                            </select>
                            <x-error name="program_status"></x-error>
                        </div>

                        <div class="form-group">
                            <label for="end_date">{{__('adminPanel.program_end_date')}}</label>
                            <input type="date" name="program_end_date" id="end_date" class="form-control" value="{{\App\Models\Settings::all()->first()->program_end_date}}">
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{ __('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: "#message_ar",
            language: 'ar',
            directionality : "rtl"
        });
        tinymce.init({
            selector: "#message_en",
        });
    </script>
@endsection
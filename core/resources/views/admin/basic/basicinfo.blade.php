@extends('admin.layout')

@if(!empty($abe->language) && $abe->language->rtl == 1)
@section('styles')
<style>
form input,
form textarea,
form select {
    direction: rtl;
}

form .note-editor.note-frame .note-editing-area .note-editable {
    direction: rtl;
    text-align: right;
}
</style>
@endsection
@endif

@section('content')
<div class="page-header">
    <h4 class="page-title">Basic Informations</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="{{route('admin.dashboard')}}">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Basic Settings</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Basic Informations</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="" action="{{route('admin.basicinfo.update', $lang_id)}}" method="post">
                @csrf
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-title">Update Basic Informations</div>
                        </div>
                        <div class="col-lg-2">
                            @if (!empty($langs))
                            <select name="language" class="form-control"
                                onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                                <option value="" selected disabled>Select a Language</option>
                                @foreach ($langs as $lang)
                                <option value="{{$lang->code}}"
                                    {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}
                                </option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            @csrf
                            <div class="form-group">
                                <label>Website Title **</label>
                                <input class="form-control" name="website_title" value="{{$abs->website_title}}">
                                @if ($errors->has('website_title'))
                                <p class="mb-0 text-danger">{{$errors->first('website_title')}}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Office Time **</label>
                                <input class="form-control" name="office_time" value="{{$bs->office_time}}"
                                    placeholder="Office Time">
                                @if ($errors->has('office_time'))
                                <p class="mb-0 text-danger">{{$errors->first('office_time')}}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Base Color Code **</label>
                                <input class="jscolor form-control ltr" name="base_color" value="{{$abs->base_color}}">
                                @if ($errors->has('base_color'))
                                <p class="mb-0 text-danger">{{$errors->first('base_color')}}</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <div class="form">
                <div class="form-group from-show-notify row">
                    <div class="col-12 text-center">
                        <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

@endsection
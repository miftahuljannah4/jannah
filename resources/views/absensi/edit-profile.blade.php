@extends('layouts.template')

@section('header')
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Edit Profile</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
@endsection

@section('content')
    <div class="row" style="margin-top: 4rem;">
        <div class="col">
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            @if (Session::get('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
        </div>
    </div>
    <form action="/update/{{$staf->nik}}/profile" method="POST" enctype="multipart/form-data" class="ml-2 mr-2">
        @csrf
        <div class="col">
            <div class="form-group boxed">
                <label class="label"> User Name</label>
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{$staf->user_name}}" name="user_name" placeholder="user_name" autocomplete="off">
                </div>
            </div>
            <div class="form-group boxed">
                <label class="label"> Nama Lengkap</label>
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{$staf->nama_lengkap}}" name="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off">
                </div>
            </div>
            <div class="form-group boxed">
                <label class="label"> No Telepon</label>
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{$staf->no_telp}}" name="no_telp" placeholder="No. HP" autocomplete="off">
                </div>
            </div>
            <div class="form-group boxed">
                <label class="label"> Password</label>
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="" name="password" placeholder="Password" >
                </div>
            </div>

            <div class="form-group boxed">
                <div class="input-wrapper">
                    <button type="submit" class="btn btn-primary btn-block">
                        <ion-icon name="refresh-outline"></ion-icon>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

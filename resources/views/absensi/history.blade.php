@extends('layouts.template')

@section('header')
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">History</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
@endsection

@section('content')
    <div class="row" style="margin-top: 4rem;">
        <div class="col">
            <div class="card-body">
            <div class="row ">
                <div class="col-12">
                    <div class="form-group">
                        <label class="label"> Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="" class="text-mute">- Select month -</option>
                            @for($i=1; $i<=12; $i++)
                                <option value="{{$i}}" {{ date('m') == $i ? 'selected' : ''}}>{{$monthName[$i]}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="form-group">
                        <label class="label"> Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">Year</option>
                            @php
                                $startYear = 2022;
                                $endYear = date('Y');
                            @endphp
                            @for($tahun=$startYear; $tahun<=$endYear; $tahun++)
                                <option value="{{$tahun}}" {{ date('Y') == $tahun ? 'selected' : ''}}>{{$tahun}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" id="button-search">
                            <ion-icon name="search-outline"></ion-icon>
                            Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col" id="showHistory"></div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function(){
            $('#button-search').click(function(e){
                var bulan = $('#bulan').val();
                var tahun = $('#tahun').val();
                $.ajax({
                    type: 'POST',
                    url: '/get-history',
                    data:{
                        _token: "{{csrf_token()}}",
                        bulan: bulan,
                        tahun: tahun,
                    },
                    cache: false,
                    success: function(respond){
                        $('#showHistory').html(respond);
                    }
                });
            });
        });
    </script>
@endpush

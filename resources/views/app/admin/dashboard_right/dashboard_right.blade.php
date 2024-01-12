@extends('app.admin.layout.app_right')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Admin Dashboard</h5>
    </div>
    <div class="dashboard-body">
        <div class="card card-sm crd_drk mb-2">
            <div class="card-body">
                Hello Admin, Welcome back.
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-sm crd_drk">
                    <img class="card-img-top mt-2" src="{{ asset('imgs/icons/people-fill.svg') }}" width="80px"
                        height="80px">
                    <div class="card-body text-center">
                        <h5 class="card-title">10.4K</h5>
                        <p class="card-text">Listeners Online</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-sm crd_drk">
                    <img class="card-img-top mt-2 text-warning" src="{{ asset('imgs/icons/envelope-fill.svg') }}" width="80px"
                        height="80px">
                    <div class="card-body text-center">
                        <h5 class="card-title">99+</h5>
                        <p class="card-text">Messages</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-sm crd_drk">
                    <img class="card-img-top mt-2" src="{{ asset('imgs/icons/graph-up.svg') }}" width="160px"
                        height="160px">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-8">
                <div class="card card-sm crd_drk">
                    <div class="card-body">
                         {{-- notifications body starts --}}
                @include('app.chat.chat_admin')
                {{-- notifications body ends --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-sm crd_drk">
                    <img class="card-img-top mt-2 text-warning" src="{{ asset('imgs/icons/pie-chart.svg') }}" width="80px"
                        height="158px">
                    <div class="card-body text-center">
                        <p class="card-text">Resource Allocation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

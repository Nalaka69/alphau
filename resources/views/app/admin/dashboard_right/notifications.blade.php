@extends('app.admin.layout.app_right')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Notifications</h5>
    </div>
    <div class="dashboard-body">
        {{-- <div class="card card-sm crd_drk mb-2">
            <div class="card-body">
                This is some text within a card body.
            </div>
        </div> --}}
        <div class="card card-sm crd_drk mb-2">
            <div class="card-body">
                {{-- notifications body starts --}}
                @include('app.chat.chat_admin')
                {{-- notifications body ends --}}
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     $('#tbl_students').DataTable();
        // });
    </script>
@endsection

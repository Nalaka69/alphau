@extends('app.moderator.layout.app')
@section('title')
    School Admin
@endsection
@section('schoolbody')
    <div class="ms_free_download">
        <div class="ms_heading">
            <h1>Students List</h1>
            <span class="veiw_all"><a href="{{route('moderator.student.new')}}">New Student</a></span>
        </div>
        <div class="album_inner_list">
            <div class="album_list_wrapper">
                <table id="table_students_list">
                    <thead class="album_list_name">
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Index</th>
                        {{-- <th>Functions</th> --}}
                      </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function showStudentTable() {
            $(document).ready(function() {
                $('#table_students_list').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('moderator.list.students') }}",
                        dataSrc: 'students_list'
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'first_name'
                        },
                        {
                            data: 'last_name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'student_index'
                        },
                        // {
                        //     data: null,
                        //     render: function(data, type, row) {
                        //         return '<i class="bi bi-trash text-danger btn delete-student-btn" data-id="' +
                        //             row.id + '"></i>';
                        //     }
                        // }
                    ]
                });
            });
        }
        showStudentTable()
    </script>
@endsection

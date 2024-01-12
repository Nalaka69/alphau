@extends('app.admin.layout.app_right')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Users</h5>
    </div>
    <div class="dashboard-body">
        <div>
            <div class="d-flex flex-row-reverse mb-2">
                <div class="p-2">
                    <img class="icn_imgs" data-bs-toggle="modal" data-bs-target="#model_school" id="new_school_modal"
                        src="{{ asset('imgs/icons/building-fill-add.svg') }}" alt="">
                </div>
            </div>
            <!--School Modal Modal -->
            <div class="modal fade" id="model_school" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mdl_title mb-2">
                                Add New School
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="province" class="form-label frm_lbl">Province</label>
                                    <select class="form-select" id="province" onchange="loadDistricts()">
                                        <option value="Northern">Northern</option>
                                        <option value="Western">Western</option>
                                        <option value="Southern">Southern</option>
                                        <option value="Eastern">Eastern</option>
                                        <option value="Central">Central</option>
                                        <option value="North Western">North Western</option>
                                        <option value="North Central">North Central</option>
                                        <option value="Uva">Uva</option>
                                        <option value="Sabaragamuwa">Sabaragamuwa</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="district" class="form-label frm_lbl">District</label>
                                    <select class="form-select" id="district">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="school_name" class="form-label frm_lbl">School Name</label>
                                    <input type="text" class="form-control" id="school_name">
                                </div>
                                <div class="mb-3">
                                    <label for="school_adddress" class="form-label frm_lbl">School Address</label>
                                    <textarea type="text" class="form-control" id="school_adddress" rows="2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="school_index" class="form-label frm_lbl">School Index No:</label>
                                    <input type="text" class="form-control" id="school_index">
                                </div>
                                <div id="loadingSpinner" class="text-center" style="display: none;">
                                    <div class="spinner-border text-success" role="status">
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="button" data-bs-dismiss="modal"
                                            id="btn_cncl">Cancel</Button>
                                    </div>
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="submit" id="btn_sbmt_school">OK</Button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mb-2">
            <table id="tbl_schools" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>School</th>
                        <th>District</th>
                        <th>Province</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>
                    </tbody>
            </table>
        </div>
    </div>
    <script>
        function loadDistricts() {
            var selectedProvince = document.getElementById('province').value;
            var districtOptions = {
                'Western': ['Colombo', 'Gampaha', 'Kalutara'],
                'Central': ['Kandy', 'Matale', 'Nuwara Eliya'],
                'North Western': ['Kurunegala', 'Puttalam'],
                'North Central': ['Anuradhapura', 'Polonnaruwa'],
                'Northern': ['Jaffna', 'Kilinochchi', 'Mullaitivu', 'Vavuniya', 'Mannar'],
                'Eastern': ['Ampara', 'Trincomalee', 'Batticaloa'],
                'Southern': ['Matara', 'Hambantota', 'Galle'],
                'Uva': ['Badulla', 'Monaragala'],
                'Sabaragamuwa': ['Ratnapura', 'Kegalle']
            };
            var districtDropdown = document.getElementById('district');
            districtDropdown.innerHTML = '';
            for (var i = 0; i < districtOptions[selectedProvince].length; i++) {
                var option = document.createElement('option');
                option.value = districtOptions[selectedProvince][i];
                option.text = districtOptions[selectedProvince][i];
                districtDropdown.appendChild(option);
            }
        }
    </script>
    <script>
        function showTable() {
            $(document).ready(function() {
                $('#tbl_schools').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.school.list') }}",
                        dataSrc: 'schools_list'
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'school_name'
                        },
                        {
                            data: 'province'
                        },
                        {
                            data: 'district'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<i class="bi bi-trash text-danger btn delete-btn" data-id="' +
                                    row.id + '"></i>';
                            }
                        }
                    ]
                });
            });
            // Handling delete button click------
            $('#tbl_schools').on('click', '.delete-btn', function() {
                var del_school_id = $(this).data('id');
                var delData = new FormData();
                delData.append('id', del_school_id);
                Swal.fire({
                    position: 'center',
                    icon: 'question',
                    title: "Warning",
                    text: "Are you sure you want to delete ?",
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.school.delete') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: delData,
                            contentType: false,
                            processData: false,
                            success: function(data, status, xhr) {
                                var statusCode = xhr.status;
                                if (statusCode === 200) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: "Success",
                                        text: "Deletion Completed.",
                                        showConfirmButton: true,
                                        // timer: 1500
                                    }).then((result) => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: "Error",
                                        text: "Deletion Failed",
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }
                            },
                        });
                    }
                });
            });
        }
        showTable()
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_sbmt_school').click(function(e) {
                e.preventDefault();
                $('#loadingSpinner').show();
                $('#btn_sbmt_school').prop('disabled', true);
                $('#btn_cncl').prop('disabled', true);

                var formData = new FormData();
                formData.append('province', $('#province').val());
                formData.append('district', $('#district').val());
                formData.append('school_name', $('#school_name').val());
                formData.append('school_adddress', $('#school_adddress').val());
                formData.append('school_index', $('#school_index').val());

                if (!$('#province').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_school').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Province is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#district').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_school').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'District is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#school_name').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_school').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'School is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#school_adddress').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_school').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Address is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#school_index').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_school').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Index is required.',
                        showConfirmButton: true
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.school.store') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data, status, xhr) {
                            var statusCode = xhr.status;
                            if (statusCode === 200) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: "Success",
                                    text: "School Submitted",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    location.reload();
                                });
                            } else if (statusCode === 422) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Input Valid Data!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: "Error",
                                    text: "School Submission Failed",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        },
                    });
                }
            });
        });
    </script>
@endsection

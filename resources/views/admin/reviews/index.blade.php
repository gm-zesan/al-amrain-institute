@extends('admin.app')
@section('title')
    Reviews
@endsection

@push('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
    <style>
        .rating-stars i {
            font-size: 15px;
            margin-right: 2px;
        }

        .text-warning {
            color: #ffc107;
        }

        .text-muted {
            color: #d6d6d6;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Reviews</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('reviews.create') }}" class="add-new">Create Review<i
                                class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 8%">SL NO</th>
                                    <th scope="col" style="width: 15%">Student</th>
                                    <th scope="col" style="width: 15%">Course</th>
                                    <th scope="col" style="width: 10%">Rating</th>
                                    <th scope="col" style="width: 34%">Feedback</th>
                                    <th scope="col" style="width: 8%">Status</th>
                                    <th scope="col" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/reviews';

        $(document).ready(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [20, 50, 100, 500],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: true
                    },
                    {
                        data: 'student_id',
                        name: 'student_id',
                        orderable: true
                    },
                    {
                        data: 'course_id',
                        name: 'course_id',
                        orderable: true
                    },
                    {
                        data: 'rating',
                        name: 'rating',
                        orderable: true,
                        render: function(data, type, row) {
                            return data;
                        }
                    },
                    {
                        data: 'feedback',
                        name: 'feedback',
                        orderable: true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true
                    },
                    {
                        data: 'id',
                        orderable: false,
                        render: function(data) {
                            var btns = '<div class="action-btn">';
                            btns += '<form action="' + SITEURL + '/dashboard/reviews/' + data +
                                '" method="POST" style="display: inline;">' +
                                '@csrf' +
                                '@method('PUT')' +
                                '<button type="submit" class="btn btn-edit" title="update status"><i class="ri-loop-right-line"></i></button>' +
                                '</form>';
                            btns += '<form action="' + SITEURL + '/dashboard/reviews/' + data +
                                '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure to delete this review?\');">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button type="submit" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></button>' +
                                '</form>';
                            btns += '</div>';
                            return btns;
                        }
                    }
                ],
                order: [
                    [0, 'asc']
                ],
            });
        });
    </script>
@endpush

@extends('admin.app')
@section('title')
    Contact Messages
@endsection



@push('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
    <style>
        .readColor tbody tr {
            background-color: #eee !important;
        }

        .readColor tbody tr.readColorTr {
            background-color: #fff !important;
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
                            <div class="table-title">Contact Messages</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('message') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Message</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100 readColor" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 8%">SL NO</th>
                                    <th scope="col" style="width: 10%">Name</th>
                                    <th scope="col" style="width: 20%">Email</th>
                                    <th scope="col" style="width: 15%">Phone</th>
                                    <th scope="col" style="width: 17%">Subject</th>
                                    <th scope="col" style="width: 25%">Message</th>
                                    <th scope="col" style="width: 5%">Action</th>
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
        var listUrl = SITEURL + '/dashboard/message';

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
                        data: 'name',
                        name: 'name',
                        orderable: true
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: true
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        orderable: true
                    },
                    {
                        data: 'subject',
                        name: 'subject',
                        orderable: true
                    },
                    {
                        data: 'message',
                        name: 'message',
                        orderable: true,
                        render: function(data) {
                            return data.length > 50 ? data.substr(0, 47) + '...' : data;
                        }
                    },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            var trClass = data.read_status == 1 ? 'readColorTr' : '';
                            var actionButtons = '<div class="action-btn">';
                            actionButtons +=
                                '<a class="btn btn-edit" data-bs-toggle="modal" onclick="modalRead(this,\'' +
                                data.message + '\')" id="' + data.id +
                                '"><i class="ri-book-read-line"></i></a>';
                            actionButtons +=
                                '<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion(\'' +
                                SITEURL + '/dashboard/message/delete/' + data +
                                '\')"><i class="ri-delete-bin-2-line"></i></a>';
                            actionButtons += '</div>';

                            setTimeout(function() {
                                $('.readColor').find('tbody tr').eq(meta.row).addClass(
                                    trClass);
                            }, 0);

                            return actionButtons;
                        }
                    }
                ],
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endpush

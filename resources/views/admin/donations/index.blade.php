@extends('admin.app')
@section('title')
    Donation
@endsection



@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush



@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Donation</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('donations')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Donation</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('donation.create')}}" class="add-new">Create Donation<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Donation</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Transaction Id</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
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
        var listUrl = SITEURL + '/dashboard/donation';

        $(document).ready( function () {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'donation_fund_id', name: 'donation_fund_id', orderable: true },
                    { data: 'payment_method', name: 'payment_method', orderable: true },
                    { data: 'transaction_id', name: 'transaction_id', orderable: true },
                    { data: 'amount', name: 'amount', orderable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/donation/edit/' + data + '"title="edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<a href="' + SITEURL + '/dashboard/donation/delete/' + data + '" title="delete" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></a>';
                            
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'asc']],
            });
        });
    </script>
@endpush

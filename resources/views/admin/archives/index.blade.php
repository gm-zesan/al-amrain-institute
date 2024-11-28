@extends('admin.app')
@section('title')
    Archive
@endsection


@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Archive</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('archives')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Archive</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('archive.create')}}" class="add-new">Create Archive<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archives as $key => $archive)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ $archive->image ? asset('storage/' . $archive->image) : asset('images/admin/default.jpg') }}" alt="" style="max-height: 45px; width: 130px; object-fit: contain;">
                                        </td>
                                        <td>
                                            <div class="action-btn">
                                                <a href="{{ route('archive.edit', $archive->id) }}" class="btn btn-edit" title="edit"><i class="ri-edit-line"></i></a>
                                                <a href="{{ route('archive.delete', $archive->id) }}" class="btn btn-delete" title="delete"><i class="ri-delete-bin-2-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



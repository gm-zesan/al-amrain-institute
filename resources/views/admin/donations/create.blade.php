@extends('admin.app')
@section('title')
    Donation
@endsection


@push('custom-style')
    <style>
        .select2-container.select2-container--default {
            max-width: 694.656px;
            width: 100% !important;
        }
    </style>
@endpush


@section('content')


<div class="container-fluid my-3">
    <form action="{{ route('donation.store') }}" method="POST">
        @csrf
        <div class="row g-4">
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Donation</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('donations')}}">Donation</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Create Donation</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('donations')}}" class="add-new">Donation<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        
                        <div class="row">
                            
                            <div class="col-12">
                                <label for="" class="form-label custom-label">Select Your Fund</label>
                                <select class="form-select custom-input" name="donation_fund_id" id="donation_fund_id">
                                    <option value="" disabled selected>Select Your Fund</option>
                                    @foreach ($funds as $fund)
                                        <option value="{{ $fund->id }}">{{ $fund->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('donation_fund_id'))
                                    <div class="error_msg">
                                        {{ $errors->first('donation_fund_id') }}
                                    </div>
                                @endif
                            </div>


                            <div class="col-md-6 col-12">
                                <label for="payment_method" class="form-label custom-label">Payment Method</label>
                                <select class="form-select custom-input" name="payment_method" id="payment_method">
                                    <option value="" disabled selected>Select Payment Method</option>
                                    <option value="Islami-Bank">Islami Bank Bangladesh Ltd</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Nagad">Nagad</option>
                                </select>
                                @if($errors->has('payment_method'))
                                    <div class="error_msg">
                                        {{ $errors->first('payment_method') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="transaction_id" class="form-label custom-label">Transaction ID</label>
                                <input type="text" class="form-control custom-input" name="transaction_id" id="transaction_id" placeholder="Transaction ID">
                                @if($errors->has('transaction_id'))
                                    <div class="error_msg">
                                        {{ $errors->first('transaction_id') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="amount" class="form-label custom-label">Amount</label>
                                <input type="number" class="form-control custom-input" name="amount" id="amount" placeholder="Amount">
                                @if($errors->has('amount'))
                                    <div class="error_msg">
                                        {{ $errors->first('amount') }}
                                    </div>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
            </div>





            <div class="col-md-4 col-12">
                <div class="row g-4">
                    <div class="col-12 order-last order-md-first">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Action</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn submit-button">Save
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('donations')}}" class="btn leave-button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

@endsection

@push('custom-scripts')
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>

    {{-- CK Editor --}}
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        setTimeout(function(){
                CKEDITOR.replace('description', {
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                });
            },100);
    </script>

        
    {{-- image upload and preview js --}}
    <script>
        function imageUpload( e ) {
            console.log(e);
            var imgPath = e.value;
            var ext = imgPath.substring( imgPath.lastIndexOf( '.' ) + 1 ).toLowerCase();
            if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                readURL( e, e.id );
                $( '.' + e.id + 'error' ).hide()
                $( '#' + e.id + 'Delete' ).removeClass( 'd-none' );
            } else {
                $( '.' + e.id + 'error' ).html( 'Select a jpg, jpeg, png type image file.' ).show();
                $("#" + e.id + "_data").attr("value", "");
                $( '#' + e.id + 'Preview' ).attr( 'src', "" );
                $( '#' + e.id ).val( null );
                $( '#' + e.id + 'Delete' ).addClass( 'd-none' );
            }
        }

        var imageName;
        function readURL( input, id ) {
            if ( input.files && input.files[ 0 ] ) {
                imageName = input.files[0].name;
                var reader = new FileReader();
                reader.readAsDataURL( input.files[ 0 ] );
                reader.onload = function ( e ) {
                    $( '#' + id + 'Preview' ).removeClass( 'd-none' );
                    $( '#' + id + 'PreviewNo' ).addClass( 'd-none' );
                    $( '#' + id + 'Preview' ).attr( 'src', e.target.result ).show();
                    $( '#' + id + 'Delete' ).css( 'display', 'flex' );
                    $( '#' + id + 'Delete' ).removeClass( 'd-none' );
                    $( '#' + id + 'Name' ).html( input.files[ 0 ].name );
                    $("#" + id + "_data").attr("value", imageName);
                };
            }
        }
        function removeImage(id) {
            $( "#" + id ).val( null );
            // $( '#' + id + 'Preview' ).attr( 'class', noImage  );
            $( '#' + id + 'Preview' ).addClass( 'd-none' );
            $( '#' + id + 'PreviewNo' ).removeClass( 'd-none' );
            $( "#" + id + "_data").attr("value", "");
            $( '#' + id + 'Name' ).html( 'Not selected' );
            $( '#' + id + 'Delete' ).css( 'display', 'none' );
            $( '#' + id + 'Delete' ).addClass( 'd-none' );
        }
    </script>


@endpush

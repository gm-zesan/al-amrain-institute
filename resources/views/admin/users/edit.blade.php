@extends('admin.app')
@section('title')
    User
@endsection
@section('content')
    <div class="container-fluid my-3">
        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST"
            enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="card table-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">User</div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{route('users')}}">User</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> Create User</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="{{route('users')}}" class="add-new">User List<i class="ms-1 ri-list-ordered-2"></i></a>
                        </div>
                        <div class="card-body custom-form">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label custom-label">First Name</label>
                                    <input type="text" class="form-control custom-input" name="first_name" value="{{ $user->contactBook->first_name }}" id="first_name">
                                    @if($errors->has('first_name'))
                                        <div class="error_msg">
                                            {{ $errors->first('first_name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="last_name" class="form-label custom-label">Last Name</label>
                                    <input type="text" class="form-control custom-input" name="last_name" value="{{ $user->contactBook->last_name }}" id="last_name">
                                    @if($errors->has('last_name'))
                                        <div class="error_msg">
                                            {{ $errors->first('last_name') }}
                                        </div>
                                    @endif
                                </div>
                                

                                <div class="col-md-6">
                                    <label for="email" class="form-label custom-label">Email</label>
                                    <input type="email" class="form-control custom-input" name="email" value="{{$user->email}}" id="email">
                                    @if($errors->has('email'))
                                        <div class="error_msg">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Phone No</label>
                                    <input type="text" class="form-control custom-input" name="phone_no" value="{{$user->contactBook->phone_no}}">
                                    @if($errors->has('phone_no'))
                                        <div class="error_msg">
                                            {{ $errors->first('phone_no') }}
                                        </div>
                                    @endif
                                </div>


                                {{-- date_of_birth --}}
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Date of Birth</label>
                                    <input type="date" class="form-control custom-input" name="date_of_birth" value="{{$user->contactBook->date_of_birth}}">
                                    @if($errors->has('date_of_birth'))
                                        <div class="error_msg">
                                            {{ $errors->first('date_of_birth') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">National Id</label>
                                    <input type="text" class="form-control custom-input" name="nid" value="{{$user->contactBook->nid}}">
                                    @if($errors->has('nid'))
                                        <div class="error_msg">
                                            {{ $errors->first('nid') }}
                                        </div>
                                    @endif
                                </div>

                                
                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Address</label>
                                    <input type="text" class="form-control custom-input" name="address" value="{{$user->contactBook->address}}">
                                    @if($errors->has('address'))
                                        <div class="error_msg">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>

                                

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">Gender</label>

                                    <div class="settings-radio-input">
                                        <div class="inner-settings-radio-input">
                                            <input type="radio" name="gender" id="Male" value="Male" {{ $user->contactBook->gender == 'Male' ? 'checked' : '' }}>
                                            <label for="Male">Male</label>
                                        </div>
                                        <div class="inner-settings-radio-input">
                                            <input type="radio" name="gender" id="Female" value="Female" {{ $user->contactBook->gender == 'Female' ? 'checked' : '' }}>
                                            <label for="Female">Female</label>
                                        </div>
                                        <div class="inner-settings-radio-input">
                                            <input type="radio" name="gender" id="Other" value="Other" {{ $user->contactBook->gender == 'Other' ? 'checked' : '' }}>
                                            <label for="Other">Other</label>
                                        </div>
                                    </div>
                                </div>



                                

                                <div class="col-12">
                                    <label for="" class="form-label custom-label">Description</label>
                                    <textarea class="form-control custom-input" name="description" id="description" rows="5" style="resize: none; height: auto">{{ $user->contactBook->description }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="error_msg">
                                            {{ $errors->first('description') }}
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
                                            <button type="submit" class="btn submit-button">Update
                                                <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('users')}}" class="btn leave-button">Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Profile Image</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="cover_image">
                                            <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                            <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                            <div class="user-image">
                                                @if($user->contactBook->image)
                                                    <img id="cover_imagePreview" src="{{asset($user->contactBook->image)}}" alt="" class="image-preview">
                                                @else
                                                    <i id="cover_imagePreviewNo" class="ri-user-3-line no-image-preview"></i>
                                                @endif
                                                <img id="cover_imagePreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview d-none">
                                                <span class="formate-error cover_imageerror"></span>
                                                <div class="user-info">
                                                    <h5 id="setName">{{$user->contactBook->first_name}} {{$user->contactBook->last_name}}</h5>
                                                    <p id="setEmail">{{$user->email}}</p>
                                                </div>
                                            </div>
                                            <span class="upload-btn">Upload Iamge</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div>

                                    @if($errors->has('image'))
                                        <div class="error_msg">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
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

    <script>
        $(document).ready(function(){
            $('#name').keyup(function(){
                var name = $(this).val();
                if(name == ''){
                    $('#setName').html('Your Name');
                }else{
                    $('#setName').html(name);
                }
            });
            $('#email').keyup(function(){
                var email = $(this).val();
                if(email == ''){
                    $('#setEmail').html('example@gmail.com');
                }else{
                    $('#setEmail').html(email);
                }
            });
        });
    </script>

    
    {{-- image upload and preview js --}}
    <script>
        function imageUpload( e ) {
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
                    setProfileImage(e, imageName);
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
            setProfileImage();
        }
    </script>


@endpush

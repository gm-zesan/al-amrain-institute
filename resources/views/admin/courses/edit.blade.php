@extends('admin.app')
@section('title')
    Edit Course
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
    <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-4">
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Course</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('courses.index') }}">Courses</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Course</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('courses.index') }}" class="add-new">Courses<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="title" class="form-label custom-label">Title</label>
                                <input type="text" class="form-control custom-input" name="title" value="{{ $course->title }}">
                                @if ($errors->has('title'))
                                    <div class="error_msg">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="type" class="form-label custom-label">Type</label>
                                <select class="form-select single-select2" name="type">
                                    <option value="recorded" {{ $course->type == 'recorded' ? 'selected' : '' }}>Recorded</option>
                                    <option value="live" {{ $course->type == 'live' ? 'selected' : '' }}>Live</option>
                                </select>
                                @if ($errors->has('type'))
                                    <div class="error_msg">{{ $errors->first('type') }}</div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="price" class="form-label custom-label">Price</label>
                                <input type="number" class="form-control custom-input" name="price" value="{{ $course->price }}" step="0.01">
                                @if ($errors->has('price'))
                                    <div class="error_msg">{{ $errors->first('price') }}</div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="starting_date" class="form-label custom-label">Starting Date</label>
                                <input type="date" class="form-control custom-input" name="starting_date" value="{{ $course->starting_date }}">
                                @if ($errors->has('starting_date'))
                                    <div class="error_msg">{{ $errors->first('starting_date') }}</div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="end_date" class="form-label custom-label">End Date</label>
                                <input type="date" class="form-control custom-input" name="end_date" value="{{ $course->end_date }}">
                                @if ($errors->has('end_date'))
                                    <div class="error_msg">{{ $errors->first('end_date') }}</div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="total_seats" class="form-label custom-label">Total Seats</label>
                                <input type="number" class="form-control custom-input" name="total_seats" value="{{ $course->total_seats }}">
                                @if ($errors->has('total_seats'))
                                    <div class="error_msg">{{ $errors->first('total_seats') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label custom-label">Description</label>
                                <textarea class="form-control custom-input" name="description" id="description" rows="5" placeholder="Course Description" style="resize: none; height: auto">{{ $course->description }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="error_msg">{{ $errors->first('description') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="what_will_learn" class="form-label custom-label">What will learn</label>
                                <textarea class="form-control custom-input" name="what_will_learn" id="what_will_learn" rows="5" placeholder="What will learn" style="resize: none; height: auto">{{ $course->what_will_learn }}</textarea>
                                @if ($errors->has('what_will_learn'))
                                    <div class="error_msg">{{ $errors->first('what_will_learn') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="prerequisites" class="form-label custom-label">Prerequisites</label>
                                <textarea class="form-control custom-input" name="prerequisites" id="prerequisites" rows="5" placeholder="Prerequisites" style="resize: none; height: auto">{{ $course->prerequisites }}</textarea>
                                @if ($errors->has('prerequisites'))
                                    <div class="error_msg">{{ $errors->first('prerequisites') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="time_schedule" class="form-label custom-label">Time Schedule</label>
                                <textarea class="form-control custom-input" name="time_schedule" id="time_schedule" rows="5" placeholder="Time Schedule" style="resize: none; height: auto">{{ $course->time_schedule }}</textarea>
                                @if ($errors->has('time_schedule'))
                                    <div class="error_msg">{{ $errors->first('time_schedule') }}</div>
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
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('courses.index') }}" class="btn leave-button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Course Image</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="image-select-file">
                                    <label class="form-label custom-label" for="image">
                                        <input type="hidden" id="image_data" name="image_data">
                                        <input type="file" id="image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                        <div class="user-image">
                                            <img id="imagePreview" src="{{ $course->image ? asset('storage/' . $course->image) : asset('admin/images/default.jpg') }}" alt="course-image" class="image-preview">
                                            <span class="formate-error imageerror"></span>
                                        </div>
                                        <span class="upload-btn">Upload Image</span>
                                    </label>
                                </div>
                                <div class="delete-btn mt-2 d-none remove-image" id="imageDelete" onclick="removeImage('image')">Remove image</div>
                                @if ($errors->has('image'))
                                    <div class="error_msg">{{ $errors->first('image') }}</div>
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
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        setTimeout(function(){
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('what_will_learn', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('prerequisites', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('time_schedule', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
                filebrowserUploadMethod: 'form'
            });
        }, 100);
    </script>

    {{-- Image Upload and Preview JS --}}
    <script>
        function imageUpload(e) {
            var imgPath = e.value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                readURL(e, e.id);
                $('.' + e.id + 'error').hide();
                $('#' + e.id + 'Delete').removeClass('d-none');
            } else {
                $('.' + e.id + 'error').html('Select a jpg, jpeg, png type image file.').show();
                $("#" + e.id + "_data").val("");
                $('#' + e.id + 'Preview').attr('src', "");
                $('#' + e.id).val(null);
                $('#' + e.id + 'Delete').addClass('d-none');
            }
        }

        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + id + 'Preview').attr('src', e.target.result).show();
                    $('#' + id + 'Delete').removeClass('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage(inputId) {
            $("#" + inputId + "_data").val("");
            $("#" + inputId).val(null);
            $("#" + inputId + "Preview").attr('src', "");
            $("#" + inputId + "Delete").addClass('d-none');
        }
    </script>
@endpush
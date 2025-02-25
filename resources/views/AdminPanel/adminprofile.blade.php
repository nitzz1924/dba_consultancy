{{-- ---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏--------------------------- --}}
<x-app-layout>
    @section('title', 'My Profile')
    <div class="container-fluid">
        <div class="position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg profile-setting-img">
                <img src="{{ asset('assets/images/loginback.jpg') }}" class="profile-wid-img" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-12">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-body active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i>
                                    Personal Details
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <form action="{{ route('updateAdminProfile')}}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="">
                                                <label for="labelid">Name</label>
                                                <input value="{{$profiledata->name}}"class="form-control" placeholder="enter label" name="name" type="text" id="labelid" required>
                                            </div>
                                            <input type="hidden" name="adminid" value="{{$profiledata->id}}">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="">
                                                <label for="labelid">Email</label>
                                                <input value="{{$profiledata->email}}"class="form-control" placeholder="enter label" name="email" type="email" id="labelid" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="">
                                                <label for="labelid">Phone Number</label>
                                                <input value="{{$profiledata->phonenumber}}" class="form-control" placeholder="enter label" name="phonenumber" type="text" id="labelid" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mt-3">
                                                <label for="labelid">Company Name</label>
                                                <input value="{{$profiledata->companyname}}" class="form-control" placeholder="enter label" name="companyname" type="text" id="labelid" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mt-3">
                                                <label for="example-search-input" class="">Profile Photo</label>
                                                <input onchange="readURL(this);" name="dp" class="form-control" placeholder="enter value" name="iconimage" type="file" value="">
                                            </div>
                                            <div class="img-preview mt-3">
                                                <img id="imagemain" src="{{ asset('assets/images/Admin/'.$profiledata->profile_photo_path) }}" alt="profile image" class="img-fluid" style="width: 100px; height: 100px;">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 d-flex align-items-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <script>
        setTimeout(function() {
            $('#successAlert').fadeOut('slow');
        }, 2000);

        setTimeout(function() {
            $('#dangerAlert').fadeOut('slow');
        }, 2000);


        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagemain').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</x-app-layout>

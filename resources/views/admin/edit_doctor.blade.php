<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.sidebar')

      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper">
        <div class="container" style="padding:50px ;">

            @if(session()->has('message'))
            <div class="alert alert-success">

                {{ session()->get('message') }}

            </div>
            @endif

            <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Doctor Name</label>
                    <input value="{{ $data->name }}" required="" style="color:black ;" type="text" class="form-control"  placeholder="Enter Doctor Name" name="name">
                </div>

                <div class="form-group">
                    <label>phone Number</label>
                    <input value="{{ $data->number }}" required="" style="color:black ;" type="text" class="form-control"  placeholder="Enter Number" name="number">
                </div>

                <div class="form-group">
                    <label>Speciality</label>
                    <select value="{{ $data->speciality }}" required="" style="color:white ;" class="form-control" name="speciality" id="">
                    
                        <option value="pathology">Pathology</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="surgery">Surgery</option>
                        <option value="urology">Urology</option>
                        <option value="nuclear medicine">Nuclear medicine</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Room Number</label>
                    <input value="{{ $data->room }}" required="" style="color:black ;" type="number" class="form-control"  placeholder="Enter Room Number" name="room">
                </div>

                <div class="form-group">
                  <label>Doctor Image</label>
                  <img style="height: 100px" src="doctorimage/{{  $data->image }}" alt="">
              </div>

                <div class="form-group">
                    <label>Doctor Photo</label>
                    <br>
                   <input required="" type="file" name="file">
                </div>

                <div class="form-group">
                   <input class="btn btn-success" type="submit">
                </div>
           </form>
        </div>
      </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
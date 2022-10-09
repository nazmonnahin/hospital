
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.sidebar')

      @include('admin.navbar')


    <div class="container-fluid page-body-wrapper">
      <div class="container" style="margin-top: 70px">
        <table class="table" style="background-color: azure">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Number</th>
                <th scope="col">Speciality</th>
                <th scope="col">Room</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($data as $doctor)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->number }}</td>
                    <td>{{ $doctor->speciality }}</td>
                    <td>{{ $doctor->room }}</td>
                    <td><img src="doctorimage/{{ $doctor->image }}" alt=""></td>

                    <td>
                        <a class="btn btn-warning" href="{{ url('editdoctor',$doctor->id) }}">Edit</a>
                    </td>

                    <td>
                        <a class="btn btn-danger" href="{{ url('delete_doctor',$doctor->id) }} class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"">Delete</a>
                    </td>

                   </tr>   
                @endforeach

            </tbody>
          </table>
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
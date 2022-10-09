
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
        
        <div aline="center" style="padding: 100px">
            <table>
                <tr style="background-color: black">
                    <th style="padding: 20px">Patient Name</th>
                    <th style="padding: 20px">Doctor Name</th>
                    <th style="padding: 20px">Date</th>
                    <th style="padding: 20px">Status</th>
                    <th style="padding: 20px">Approve</th>
                    <th style="padding: 20px">Cancel</th>
                </tr>

                @foreach ($data as $appoinment)
                    
                <tr align="center" style="background-color: skyblue">
                    <td>{{ $appoinment->name }}</td>
                    <td>{{ $appoinment->doctor }}</td>
                    <td>{{ $appoinment->date }}</td>
                    <td>{{ $appoinment->status }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ url('approved',$appoinment->id) }}">Approve</a>
                    </td>

                    <td>
                        <a class="btn btn-danger" href="{{ url('cancel',$appoinment->id) }}">Cancel</a>
                    </td>
                
                </tr>

                @endforeach
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
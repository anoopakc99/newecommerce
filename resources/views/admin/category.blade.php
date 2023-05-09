<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color{
            color:black;
        }
        .center{
            margin:auto;
            width:50%;
            text-align:center;
            margin-top: 30px;
            border:3px solid white;

        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

            @endif
            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>

                <form action="{{url('/add_category')}}" method="post">
                    @csrf
                    <input class="input_color" type="text" name="category_name" placeholder="Category Name">

                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">

                </form>
            </div>

            <table class="center">
         <tr>
            <td>Category Name</td>
            <td>Action</td>
        </tr>
    @foreach($data as $data)
          <tr>
            <td>{{$data->category_name}}</td>
            <td>
                <a onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
            </td>
          </tr>
          @endforeach
          </table>
          </div>
    
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
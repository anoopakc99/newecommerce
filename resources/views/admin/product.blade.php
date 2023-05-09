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
        label{
            display: inline-block;
            width: 200px;

        }
        .div_desin{
            padding-bottom: 15px;
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
                <h2 class="h2_font">Add Product</h2>

                <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_desin">
                    <label >Product Title</label>
                    <input class="input_color" type="text" name="title" placeholder="Title " required="">

                    </div>
                    <div class="div_desin">
                    <label >Product Description</label>
                    <input class="input_color" type="text" name="description" placeholder="description" required="">

                    </div>
                    <div class="div_desin">
                    <label >Product Price</label>
                    <input class="input_color" type="number" name="price" placeholder="Price " required="">
                    </div>
                    <div class="div_desin">
                    <label >Discount Price</label>
                    <input class="input_color" type="number" name="discount_price" placeholder="discount price ">

                    </div>
                    <div class="div_desin">
                    <label >Product quantity</label>
                    <input class="input_color" type="number" min="0" name="quantity" placeholder="quantity " required="">

                    </div>
                   
                    <div class="div_desin">
                    <label >Product Category</label>
                   <select class="input_color"name="category" required="" >
                    <option value="" selected="">Add a category</option>
                    @foreach($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                    @endforeach
                   </select>

                    </div>
                    
                    <div class="div_desin">
                    <label >Product Image</label>
                    <input class="input_color" type="file"  name="image" placeholder="Image " required="">

                    </div>

                    <div class="div_desin">
                  
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Product">

                    </div>

                </form>
            </div>

          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
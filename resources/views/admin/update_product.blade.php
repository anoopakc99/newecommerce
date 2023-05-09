<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
                <h2 class="h2_font">Update Product</h2>

                <form action="{{url('/update_product_confirm',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_desin">
                    <label >Product Title</label>
                    <input class="input_color" type="text" name="title" value="{{$product->title}}" placeholder="Title " required="">

                    </div>
                    <div class="div_desin">
                    <label >Product Description</label>
                    <input class="input_color" type="text" name="description"  value="{{$product->description}}" placeholder="description" required="">

                    </div>
                    <div class="div_desin">
                    <label >Product Price</label>
                    <input class="input_color" type="number" name="price"  value="{{$product->price}}" placeholder="Price " required="">
                    </div>
                    <div class="div_desin">
                    <label >Discount Price</label>
                    <input class="input_color" type="number" name="discount_price"  value="{{$product->discount_price}}" placeholder="discount price ">

                    </div>
                    <div class="div_desin">
                    <label >Product quantity</label>
                    <input class="input_color" type="number" min="0" name="quantity"  value="{{$product->quantity}}" placeholder="quantity " required="">

                    </div>
                   
                    <div class="div_desin">
                    <label >Product Category</label>
                   <select class="input_color"name="category"  required="" >
                    <option value="{{$product->category}}"  selected="">{{$product->category}} </option>
                
                    @foreach($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                    @endforeach
                   </select>

                    </div>
                    
                    <div class="div_desin">
                    <label >Current Product Image</label>
                    <img style="margin:auto;" height="100" width="100" src="/product/{{$product->image}}" alt="">
                   

                    </div>

                    <div class="div_desin">
                    <label >Change Product Image</label>
                    <input type="file" name="image">

                    </div>
                  
                    <input type="submit" class="btn btn-primary" name="submit" value="Update Product">

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
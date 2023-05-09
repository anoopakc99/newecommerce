<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

   <style>
     .title_deg
     {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        /* padding-bottom: 40px; */
     }
     .center{
            margin:auto;
            width:100%;
            text-align:center;
            margin-top: 30px;
            border:2px solid white;

        }
        .img_size
        {
            width: 200px;
            height: 100px;
        }
        .th_deg
        {
            background-color: skyblue;
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
            <h1 class="title_deg">All Orders</h1>

            <table class="center">
         <tr class="th_deg">
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Product title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Payment Status</th>
            <th>Delivery Status</th>
            <th>Image</th>
            <th>Delivered</th>
        </tr>
        @foreach($order as $order)
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td><img class="img_size" src="/product/{{$order->image}}" alt=""></td>
                <td>
                   @if($order->delivery_status=='processing') 
                         <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is deliverd !!!')" class="btn btn-primary">Delivered</a>
                         @else

                         <p style="color:green;">Delivered</p>
                   @endif
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
@extends('layout.app')
@section('content')

<div class="container-fluid page-body-wrapper">
        <div class="container" align="center">

            <table>
                <tr style="background-color: #7AB730; color: black">
                    <td style="padding: 20px">Product Title</td>
                    <td style="padding: 20px">Price</td>
                    <td style="padding: 20px">Quantity</td>
                    <td style="padding: 20px">Status</td>
                    <td style="padding: 20px">Action</td>
                </tr>
                @foreach($order as $orders)

                <tr align="center">
                    <td style="padding: 20px">{{$orders->product_name}}</td>
                    <td style="padding: 20px">{{$orders->price}}</td>
                    <td style="padding: 20px">{{$orders->quantity}}</td>
                    <td style="padding: 20px">{{$orders->status}}</td>

                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure??')" href="{{route('deleteorder', $orders->id)}}">Delete</a></td>
                </tr>
                @endforeach  
            </table>
            <a href="{{route('showcart')}}" class="btn btn-success">Back To Cart</a>
        </div>
</div>

@endsection
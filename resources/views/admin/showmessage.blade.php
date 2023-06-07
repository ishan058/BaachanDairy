@extends('layout.adminapp')
@section('content')

<div class="container-fluid page-body-wrapper">
    <div class="container" align="center">

        <table>
            <tr style="background-color: grey;">
                <td style="padding: 20px">Customer Name</td>
                <td style="padding: 20px">Email</td>
                <td style="padding: 20px">Phone</td>
                <td style="padding: 20px">Message</td>
                <td style="padding: 20px">Action</td>
            </tr>
            @foreach($info as $message)
            <tr align="center" style="background-color: black; ">
                <td style="padding: 20px">{{$message->Name}}</td>
                <td style="padding: 20px">{{$message->Email}}</td>
                <td style="padding: 20px">{{$message->Phone}}</td>
                <td style="padding: 20px">{{$message->Message}}</td>
                <td style="padding: 20px"><a class="btn btn-danger" onclick="return confirm('Are you sure??')" href="{{route('deletemessage', $message->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection
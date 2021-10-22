@extends('layouts.notifications.app-inquire')
@section('content')

    <tr>
        <td style="padding:0px 50px 0px 50px">
            <p style="font-size:18px">{{$name}}</p>
            <p>{{__('message.msc_client_email')}}</p>
        </td>
    </tr>

@stop

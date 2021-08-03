@extends('layouts.notifications.app-inquire')
@section('content')

    <tr>
        <td style="padding:20px 0px 20px 50px">
            <p style="font-size:18px"><b>Mensaje de</b>: {{$nombre}}</p>
            <p>Mensaje del formulario de Detail.</p>
            <center style="background:#f6f6f6; padding:10px;">
                <table>
                    <tbody>
                    <tr>
                        <td style="text-align:left">
                            <p><strong>Package: {{$paquete}}</strong></p>
                            <p><strong>Email: {{$email}}</strong></p>
                            <p><strong>Phone: {{$telefono}}</strong></p>
                            <p><strong>Comment: {{$comentario}}</strong></p>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>

@stop

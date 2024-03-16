@extends('layouts.guest_master')
@section('dynamic_section')
    <table class="table table-striped">
        @foreach ($result as $k)
            <tr>
                <td>
                    {{ $k->fullname }}
                </td>
                <td>
                    {{ $k->email }}
                </td>
                <td>
                    {{ $k->password }}
                </td>
                <td>
                    {{ $k->gender }}
                </td>
                <td>
                    {{ $k->mobile }}
                </td>
                <td>
                    {{ $k->hobbies }}
                </td>
                <td>
                    <img src="{{ URL::to('/') }}/uploads/{{ $k->profile_picture }}" alt="" class="img-fluid">
                </td>
                <td>
                    <a href="{{ URL::to('/') }}/edit_user/{{ $k->email }}">
                        <input type="button" class="btn btn-primary" Value="Edit">
                    </a>
                </td>
                <td>
                    <a href="{{ URL::to('/') }}/delete_user/{{ $k->email }}">
                        <input type="button" class="btn btn-danger" Value="Delete">
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

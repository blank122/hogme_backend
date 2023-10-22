@extends('admin.livestock.livestock')
@section('livestock')

    <div class="head-title">
        <div class="left">
            <h1>Livestock Types</h1>
            <ul class="breadcrumb">
                <li>
                    <a class ="active"
                    href={{ route('announcementIndex') }}>Livestock</a>
                </li>

                <li><i class='bx bx-chevron-right' ></i></li>

                <li>
                    <a class="active" href="#">Create</a>
                </li>
            </ul>
        </div>

    </div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {{-- Create announcement form --}}
    <div class="announcement-container">
        <form action="{{ route('announcementPost') }}" method="post">
            @csrf
            @method('post')
            <div class="announcement-form-group">
                <label for="announcementTitle"> Livestock Type </label>
                <input type="text" id="announcementTitle" name="Livestock Type" required>
            </div>
            <div class="announcement-form-group">
                <button type="submit" class="announcement-btn">Add Livestock Type</button>
            </div>
        </form>
    </div>

@endsection
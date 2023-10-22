@extends('admin.announcement.announcement')
@section('announcement')

    <div class="head-title">
        <div class="left">
            <h1>Upload Tutorials</h1>
            <ul class="breadcrumb">
                <li>
                    <a class ="active"
                    href={{ route('announcementIndex') }}>Tutorials</a>
                </li>

                <li><i class='bx bx-chevron-right' ></i></li>

                <li>
                    <a class="active" href="#">Upload</a>
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
        <form action="{{ route('announcementPost') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="announcement-form-group">
                <label for="announcementTitle">Tutorial Title:</label>
                <input type="text" id="announcementTitle" name="title" required>
            </div>
            <div class="announcement-form-group">
                <label for="announcementContent">Announcement Content:</label>
                <textarea id="announcementContent" name="content" required></textarea>
            </div>
            <div class="announcement-form-group">
                <button type="submit" class="announcement-btn">Create Announcement</button>
            </div>
        </form>
    </div>

@endsection
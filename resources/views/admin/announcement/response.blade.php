@extends('admin.announcement.announcement')
@section('announcement')

    <div class="head-title">
        <div class="left">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-success">
                    {{ session()->get('error') }}
                </div>
            @endif
            <h1>Announcement</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Announcement</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a href="{{ route('announcementCreate') }}" class="btn-download">
            <i class='bx bxs-cloud-download' ></i>
            <span class="text">Create Announcement</span>
        </a>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Announcement</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>
                                <p>{{ $announcement->title }}</p>
                                <td>{{ Str::limit($announcement->content, 50, '...') }}</td>
                                <td>{{ $announcement->created_at->format('Y-m-d') }}</td>
                                <td><a href="{{ route('announcementEdit', ['announcement'=>$announcements]) }}"><span class="status completed">Edit</span></a></td>
                                <td><a href="#"><span class="status pending">Delete</span></a></td>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

@endsection
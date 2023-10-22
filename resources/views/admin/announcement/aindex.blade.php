@extends('admin.announcement.announcement')
@section('announcement')

    @if (Session::has('success'))
        <script>
            swal("Message", "{{ Session::get('success') }}", 'success',{
                button:true,
                button:"OK",
                timer:3000,
                dangerMode:true,
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            swal("Message", "{{ Session::get('error') }}", 'error',{
                button:true,
                button:"OK",
                timer:3000,
                dangerMode:true,
            });
        </script>
    @endif

    <div class="head-title">
        <div class="left">
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
                    @foreach ($announcement as $announcements)

                        <tr>
                            <td>
                                <p>{{ $announcements->title }}</p>
                                <td>{{ Str::limit($announcements->content, 50, '...') }}</td>
                                <td>{{ $announcements->created_at->format('Y-m-d') }}</td>
                                <td><a href="{{ route('announcementEdit', ['announcement'=>$announcements]) }}"><span class="status completed">Edit</span></a></td>
                                <td>
                                    <form action="{{ route('announcementDelete', ['announcement' =>$announcements]) }}" method="post" class="dropdown-item py-2 logout">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn status pending" type="submit">
                                            <span class="">Delete</span>
                                        </button>
                                    </form>
                                </td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $announcement->links() }}
            </div>
        </div>
    </div>
@endsection
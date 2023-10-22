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
            <h1>Archive Records</h1>
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
                        <th>Deleted At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcement as $announcements)

                        <tr>
                            <td>
                                <p>{{ $announcements->title }}</p>
                                <td>{{ Str::limit($announcements->content, 50, '...') }}</td>
                                <td>{{ $announcements->deleted_at->format('Y-m-d') }}</td>
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
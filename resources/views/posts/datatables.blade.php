@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Semua Berita</h1>
    <table id="dataTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Status</th>
                <th>Tindakan</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('posts.allPosts') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'content', name: 'content' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endsection

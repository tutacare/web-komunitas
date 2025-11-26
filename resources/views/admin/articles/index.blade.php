@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Articles</h4>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Create New</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>
                                    @if ($article->thumbnail)
                                        <img src="{{ asset('storage/' . $article->thumbnail) }}" width="70">
                                    @endif
                                </td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at->format('d M Y') }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete this article?')"
                                            class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection

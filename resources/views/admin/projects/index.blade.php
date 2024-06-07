@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>description</th>
                    <th>link_git</th>
                    <th>type</th>
                </tr>
            </thead>
            <tbody class="table-group-divider table-hover table-striped">
                @foreach ($projects as $project)
                    <tr class="p-3">
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->link_git }}</td>
                        <td>{{ $project->type_id }}</td>


                        <td><a class="btn btn-primary" href="{{ route('admin.projects.show', $project) }}">Details</a>
                        </td>
                        <td>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete {{ $project->name }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    
                                    <form class="delete-character" action="{{ route('admin.projects.destroy',$project) }}" method="POST">

                                        
                                        @method('DELETE')
                                        @csrf
                        
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection

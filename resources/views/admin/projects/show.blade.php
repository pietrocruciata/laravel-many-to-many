@extends('layouts.app')

@section('title', 'show')

@section('content')
<div class=" p-3">
    <a class="btn btn-warning" href="{{ route('admin.projects.index') }}">All projects</a>
    <p><strong>ID:</strong> {{$project->id}}</p>
    <p><strong>NAME:</strong> {{$project->name}}</p>
    <p><strong>SLUG:</strong> {{$project->slug}}</p>
    <p><strong>DESCRIPTION:</strong> {{$project->description}}</p>
    <p><strong>LINK GITHUB:</strong> {{$project->link_git}}</p>
   
    <div class="d-flex gap-3">
        <a class="btn btn-primary" href="{{route('admin.projects.edit', $project)}}">Edit</a>
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
                
                <form class="delete-project" action="{{ route('admin.projects.destroy',$project) }}" method="POST">

                    
                    @method('DELETE')
                    @csrf
    
                    <button class="btn btn-danger">Delete</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
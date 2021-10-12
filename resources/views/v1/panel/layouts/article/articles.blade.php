@php
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    <div class="d-flex justify-content-center mb-5">
        <a href=" {{route('articles.create')}} " class="btn btn-primary justify-center">Create New Article</a>
    </div>
    <div class="container">
        @foreach ($articles as $article)
            <div class="card custom-card-color">
                <div class="card-header">
                    <img src=" {{$article->image ? $article->image : '/defaultImages/1.jpg'}} " alt="rover" />
                </div>
                <div class="card-body pb-0">
                    {{-- <span class="tag tag-teal">{{$article->created_at}}</span> --}}
                    <h4>{{$article->title ? $article->title : 'NO TEXT'}}</h4>
                    <p>{{$article->body ? $article->body : 'NO TEXT'}}</p>
                    <div class="user">
                        <img src=" {{$article->user->avatar ? $article->user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                        <div class="user-info">
                            <h5> {{$article->user->name . ' ' . $article->user->family}} </h5>
                            <small class="custom-user-info"> {{ Carbon::parse($article->created_at)->format('d/m/Y') }} </small>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#deleteArticle-{{$article->id}}" data-whatever="@mdo">Delete</button>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#article-{{$article->id}}" data-whatever="@mdo">Show</button>
                </div>
            </div>

            {{-- modal --}}
            <div class="modal fade" id="article-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <div class="d-flex justify-content-center mb-2">
                                <img src="{{$article->image ? $article->image : '/defaultImages/1.jpg'}}" alt="image" class="custom-width-images">
                            </div>
                            <h5> {{$article->title ? $article->title : 'NO TEXT'}} </h5>
                            <p> {{$article->body ? $article->body : "NO TEXT"}} </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {{-- <button type="button" class="btn btn-primary">Send message</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
            {{-- modal --}}
            <div class="modal fade" id="deleteArticle-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('DELETE')
                                    <h5 class="text-center">Are you sure you want to delete article {{$article->title}}?</h5>
                                    <div class="mt-3 ml-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete Article</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {!! $articles->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection


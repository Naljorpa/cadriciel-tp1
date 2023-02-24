@extends('layouts.app')
@section('title','repertoire')
@section('content')
@php $locale = session()->get('locale'); @endphp
<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
    <div class="container mt-5">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <span>@lang('lang.rep')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">@lang('lang.rep')</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-5 mb-5">
            <a href="{{route('repertoire.create')}}" class="site-btn">
                @lang('lang.addDoc')
            </a>
        </div>
        {{$repertoires}}
        <div class="row mb-5 col-12">
            <div class="col-12">
                <table class="table table-responsive-md align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>@lang('lang.title')</th>
                            <th>@lang('lang.download')</th>
                            <th>@lang('lang.author')</th>
                            <th>@lang('lang.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($repertoires as $repertoire)
                        <tr>
                            @if($locale=='en'|| $repertoire->title_fr == null)
                            <td>
                                {{ ucfirst($repertoire->title) }}
                            </td>
                            @else
                            <td>
                                {{ ucfirst($repertoire->title_fr) }}
                            </td>
                            @endif
                            <td>
                                @php
                                $extension = pathinfo($repertoire->location, PATHINFO_EXTENSION);
                                switch ($extension) {
                                case 'pdf': $icon = 'pdf-icon.svg';
                                break;
                                case 'doc': $icon = 'doc-icon.png';
                                break;
                                case 'zip': $icon = 'zip-icon.svg';
                                break;
                                case 'docx': $icon = 'doc-icon.png';
                                break;
                                }
                                @endphp
                                <a href="{{ route('repertoire.download', $repertoire->id) }}">
                                    <div class="icone-doc">
                                        <img src="{{ asset('img/'. $icon)}} " alt="File icon">
                                    </div>
                                </a>

                            </td>
                            <td>{{ ucfirst($repertoire->repertoireHasUser->nom) }}</td>
                            <td>
                                @if(Auth::user()->id == ucfirst($repertoire->repertoireHasUser->id))
                                <a class="btn btn-link btn-sm btn-rounded" href="{{ route('repertoire.edit', $repertoire->id) }}">@lang('lang.update')</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    @lang('lang.delete')
                                </button>
                                @else
                                @endif
                            </td>
                        </tr>
                        @empty <p class="text-warning">
                            @lang('lang.notAvail') </p>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>


    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.eraseArt')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @lang('lang.eraseSure')
            </div>
            <div class="modal-footer">
                <form action="{{ route('repertoire.edit', $repertoire->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="@lang('lang.delete')">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
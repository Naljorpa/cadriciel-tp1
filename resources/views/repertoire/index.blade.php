@extends('layouts.app')
@section('title','repertoire')
@section('content')
@php $locale = session()->get('locale'); @endphp
<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
    <div class="container">
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
        <div class="col-12 text-center pt-3 pb-5">
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
                                case 'pdf':
                                $icon = 'pdf-icon.svg';
                                break;
                                case 'doc':
                                $icon = 'doc-icon.png';
                                break;
                                case 'zip':
                                $icon = 'zip-icon.svg';
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
                                <a class="btn btn-link btn-sm btn-rounded" href="{{ route('repertoire.show', $repertoire->id) }}">@lang('lang.modSup')</a>
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

@endsection
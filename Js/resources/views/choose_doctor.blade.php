
@extends('layouts.user')


@section('content')
 <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ asset('') }}home">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$categories[0]->category}}</li>
                            </ol>
                        </nav>
                    <div class="row">
                        @foreach($doctor as $doc)
                            <div class="col-sm-3" >
                                <div style="background:white; padding: 0.41em 0.5em;" class="text-center mb-2">
                                    <img src="{{ asset('') }}images/{{$doc->image}}" style="border-radius: 0px; padding: 0px" alt="{{$doc->name}}" class="img-thumbnail">
                                    <p class="text-center" style="margin: 0px; padding: 5px !important;">{{$doc->name}}</p>
                                    <a href="{{ asset('') }}doctor/{{$doc->doctors_id}}" class="btnr buttoncenter btn btn-primary">Choose</a>
                                </div>
                            </div>
                             
                        @endforeach
                    </div>
                </div>     
@endsection


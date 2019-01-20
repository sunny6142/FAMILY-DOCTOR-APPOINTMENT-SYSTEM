@extends('layouts.user')

@section('content')
<main class="middle">
            <div class="pr-5 pt-0 pl-5">
            <div class=" text-center mb-3"> <strong>Home</strong> </div>
                <div class="text-center">
                    <ul class="list-group">
                        @foreach($categories as $cat)
                            <a style="text-decoration: none; color: black;" href="{{ asset('') }}choose/doctor/{{$cat->cat_id}}">
                                <li class="border_controller list-group-item d-flex justify-content-between align-items-center">
                                    {{$cat->category}} ({{$cat->val}})
                                        
                                        <i class="fa fa-chevron-right" style="color: black;"></i>
                                       
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
</main>
@endsection
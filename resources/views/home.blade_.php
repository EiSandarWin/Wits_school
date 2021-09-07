@extends('layouts.app')

@section('content')

    @php
        $r_search = request()->search === null? '' : request()->search;
        $r_searchselect = request()->searchselect === null? '' : request()->searchselect;
    if(old()){
            $r_search = old('search');
            $r_searchselect = old('searchselect');
        }
    @endphp

<div class="container">
    <div class="confirmarea">

        <form method="POST" action="{{ route('search.route') }}" class="searchbox" role="search">
            {{csrf_field()}}

            <input type="text" name="search" class="search"  placeholder="氏名 ,氏名（カナ）,保護者氏名" value="{{$r_search}}">
            <select class="search" id = "searchselect" name="searchselect" style="">
                <option selected disabled>教室を選んでください</option>
                @foreach($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                @endforeach
                </select>

            <input type="submit" name="submit" class="submit" value="検索" >

{{--            <button type="submit" class="btn btn-success" style="margin-left: auto">--}}
{{--                Print--}}
{{--            </button>--}}

            <form action="{{route('export')}}" method="get">
                <input type="hidden" name="search" value="{{$r_search}}">
                <input type="hidden" name="searchselect" value="{{$r_searchselect}}">
                <button type="submit" class="btn btn-success"> Print </button>
            </form>

            <!--<a href="{{route('export')}}">Print</a>-->


            <!--<button class="btn btn-primary" style="height: 37px;"><i class="fa fa-search" aria-hidden="true"></i> </button>-->

            <!--<div class="col-sm-3">
                {{ Form::date('start_date',null,['class'=>'form-control','placeholder'=>'Date']) }}
            </div>
            <div class="col-sm-3">
                {{ Form::date('end_date',null,['class'=>'form-control','placeholder'=>'Date']) }}
            </div>
            -->
        <hr style="border: 1px solid lightblue;">

        <div class="templatearea"></div>

        <table class="maintable">
            <thead class="theadarea">
                <tr>
                    <th >氏名</th>
                    <th >氏名（カナ）</th>
                    <th >保護者氏名</th>
                    <th >スタッフ名</th>
                    <th >教室名</th>
                    <th width="120" >アクション</th>



                </tr>

            </thead>
            <tbody>
            @if(isset($searchdata))
            @foreach($searchdata as $value)
                <tr>
                    <td>{{$value->student_name}}</td>
                    <td>{{$value->student_name_kana}}</td>
                    <td>{{$value->parent_name}}</td>
                    <td>{{$value->user_name}}</td>
                    <td>{{$value->branch->name}}</td>


                    <td>


                        <a class="btn btn-success btn-sm" href="{{url('detail', $value->id)}}" >詳細</a>

                    </td>

                </tr>
            @endforeach
            @endif
            </tbody>


        </table>
            </form>
            <!--<div class="card-body">
              @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>-->

    </div>

</div>


@endsection

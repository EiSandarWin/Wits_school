@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>スタッフ</h2>{{--user--}}
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> 新規追加</a>{{--create user--}}
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>氏名</th>　{{--Name--}}
   <th>氏名(カナ）</th>{{--Name(kana)--}}
   <th>メール</th>{{--mail--}}
   <th>教室名</th>{{--Branch Name--}}
   <th>権限</th>{{--Role--}}
   <th width="280px">操作</th>{{--Action--}}
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->name_kana }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->branch->name}}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">表示</a>{{--Name--}}
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">編集</a>{{--Name--}}
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger','onclick'=>'return confirm("削除してよろしいですか")']) !!}{{--delete--}}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>Wits.com</small></p>
@endsection

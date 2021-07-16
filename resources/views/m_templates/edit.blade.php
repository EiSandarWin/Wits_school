@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>編集 確認事項</h2> {{--Edit Template--}}
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('m_templates.index') }}"> 戻る</a> {{--back--}}
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('m_templates.update',$m_template->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>氏名:</strong>
		            <input type="text" name="name" value="{{ $m_template->name }}" class="form-control" placeholder="確認事項"> {{--template--}}
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">登録</button> {{--submit--}}
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Wits.com</small></p>
@endsection

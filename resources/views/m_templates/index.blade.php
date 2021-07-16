@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>確認事項名</h2> {{--Template Name--}}
            </div>
            <div class="pull-right">
                @can('m_templates-create')
                <a class="btn btn-success" href="{{ route('m_templates.create') }}"> 新規追加</a> {{--create template--}}
                @endcan
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
            <th>氏名</th> {{--Name--}}

            <th width="280px">操作</th> {{--Action--}}
        </tr>
	    @foreach ($m_templates as $m_template)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $m_template->name }}</td>

	        <td>
                <form action="{{ route('m_templates.destroy',$m_template->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('m_templates.show',$m_template->id) }}">表示</a> {{--show--}}
                    @can('m_templates-edit')
                    <a class="btn btn-primary" href="{{ route('m_templates.edit',$m_template->id) }}">編集</a> {{--Edit--}}
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('m_templates-delete')
                    <button type="submit" class="btn btn-danger" onclick ="return confirm('削除してよろしいですか')">削除</button> {{--Delete--}}
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $m_templates->links() !!}


<p class="text-center text-primary"><small>Wits.com</small></p>
@endsection

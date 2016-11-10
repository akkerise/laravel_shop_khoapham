@extends('admin.master')
@section('title_action')
Product
@endsection
@section('action')
List
@endsection
@section('content')

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
<?php $stt = 0;?>
@if(!empty($product))
        @foreach($product as $p)
        {{-- {{ dd($p) }} --}}
<?php $stt++?>
<tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ number_format($p->price,0,",",".") }} VNĐ</td>
            <td>
<?php
// var_dump($p->created_at);
echo \Carbon\Carbon::createFromTimeStamp(strtotime($p->created_at))->diffForHumans();
?>
{{-- {{ $p->create_at->diffForHumans() }} --}}
</td>
            <td>
<?php
$cate = DB::table('cates')->where('id', $p->cate_id)->first();
?>
                @if(!empty($cate))
                {!! $cate->name !!}
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ URL::route('admin.product.getDelete',$p->cate_id) }}">Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::route('admin.product.getEdit',$p->cate_id) }}">Edit</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
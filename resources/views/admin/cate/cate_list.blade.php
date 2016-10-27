@extends('admin.master')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach ($list as $l)
        <?php $stt += 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{ $l->name }}</td>
            <td>{{ $l->alias}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ URL::route('admin.cate.getDelete',$l->id) }}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::route('admin.cate.getEdit',$l->id) }}">Edit</a></td>
        </tr>
        @endforeach
        {{-- <tr class="even gradeC" align="center">
            <td>2</td>
            <td>Bóng Đá</td>
            <td>Thể Thao</td>
            <td>Ẩn</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr> --}}
    </tbody>
</table>
@endsection
@section('action')
List
@endsection
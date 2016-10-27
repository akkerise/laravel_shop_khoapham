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
        @foreach ($list as $l)
        {{-- {{ dd($l['id']) }} --}}
        <tr class="odd gradeX" align="center">
            {{-- <td>{!! $l["id"] !!}</td> --}}
            <td>{!! $l["name"] !!}</td>
            <td>
                @if($l["parent_id"] == 0)
                    {{ "None" }}
                @else
                    <?php 
                        // echo $l->parent_id;
                        $parent = DB::table('cates')->where('id',$l["parent_id"])->first();
                        // dd($parent);
                        echo $parent->name;
                        // dd($parent->name);
                    ?>
                    {{-- {{ $parent->alias }} --}}
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
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
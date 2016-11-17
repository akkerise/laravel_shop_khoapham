@extends('admin.master')
@section('title_action')
User
@endsection
@section('action')
Add
@endsection
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
<?php $stt = 0?>
@foreach($users as $user)
<?php $stt++?>
        <tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{ $user->username }}</td>
            <td><?php
if ($user->level == 1) {
	echo "Admin";
} else if ($user->level == 2) {
	echo "Superadmin";
} else {
	echo "Member";
}
?></td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.user.getDelete',$user->id) }}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
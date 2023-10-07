<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // 1. add new student (who add this student)
    // 2. give placement test (take result)
    // 3. add probniy lesson or add group
    // 4.
    public function index(Request $request)
    {
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.phone as phone',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->latest('users.created_at')
            ->get();
        return view('student.index', [
            'students' => $students,
        ]);
    }
}

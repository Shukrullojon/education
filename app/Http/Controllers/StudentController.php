<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PC;
use App\Models\PU;
use App\Models\PUR;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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
            'users.status as status',
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

    public function create()
    {
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $pcs = PC::where('status', 1)->get()->pluck('name', 'id');
        return view('student.create', [
            'events' => $events,
            'pcs' => $pcs,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'status' => 'required',
            'phone' => 'required',
            'event_id' => 'required',
        ]);
        $role = Role::where('name', 'Student')->first();
        $student = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'status' => $request->status,
            'phone' => $request->phone,
            'reception_id' => auth()->user()->id,
            'password' => Hash::make($request->phone),
            'is_payment' => ($request->status) ? 1 : 0,
        ]);
        $student->assignRole([$role->id]);
        $student->events()->attach($request->event_id, ['change_user_id' => auth()->user()->id]);
        if ($request->pc_id)
            PU::create([
                'user_id' => $student->id,
                'p_c_id' => $request->pc_id,
                'attach_user_id' => auth()->user()->id,
                'status' => 1,
            ]);

        if ($request->status == 0) {
            return redirect()->route('studentArchive')->with('success', 'Student archived successfully');
        } else if ($request->status == 1) {
            return redirect()->route('studentWaiting')->with('success', 'Student waiting successfully');
        } else if ($request->status == 2) {
            return redirect()->route('studentActive')->with('success', 'Student active successfully');
        } else {
            return back();
        }
    }

    public function waiting()
    {
        $events = Event::where('status', 1)->get();
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 1)
            ->latest('users.created_at')
            ->get();
        return view('student.waiting', [
            'students' => $students,
            'events' => $events,
        ]);
    }

    public function work(){
        $pu = PU::where('user_id',auth()->user()->id)->where('status',1)->latest()->first();
        $pur = PU::where('status',2)
            ->where('user_id',auth()->user()->id)
            ->latest()
            ->get();
        return view('student.work',[
            'pu' => $pu,
            'pur' => $pur,
        ]);
    }

    public function workStore(Request $request){
        $this->validate($request, [
            'p_u_id' => 'required',
        ]);
        PU::where('id',$request->p_u_id)->update([
            'status' => 2,
        ]);
        foreach ($request->test as $key => $t){
            PUR::create([
                'p_u_id' => $request->p_u_id,
                'p_t_id' => $key,
                'answer' => $t,
            ]);
        }
        return redirect()->route('studentWork');
    }

    public function result($id){
        $pu = PU::where('id',$id)->where('user_id',auth()->user()->id)->first();
        return view('student.result',[
            'pu' => $pu,
        ]);
    }
}

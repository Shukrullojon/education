<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\PC;
use App\Models\PU;
use App\Models\PUR;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Services\UserService;

class StudentController extends Controller
{
    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function all(Request $request)
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
            ->where('users.status',3)
            ->latest('users.updated_at')
            ->get();
        return view('student.all', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $pcs = PC::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::where('status', 1)->get()->pluck('name', 'id');
        return view('student.create', [
            'events' => $events,
            'pcs' => $pcs,
            'groups' => $groups,
        ]);
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'nullable|email',
            'status' => 'required|in:0,1,2,3',
            'phone' => 'required|unique:users,phone',
            'event_id' => 'required|exists:events,id',
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

        // begin - id_code generatsiya
        $filial_id = '01';
        $this->service->createIdCode($student,$filial_id);
        // end - id_code generatsiya
        
        $student->assignRole([$role->id]);
        if ($request->event_id) {
            EventUser::create([
                'user_id' => $student->id,
                'change_user_id' => auth()->user()->id,
                'event_id' => $request->event_id,
            ]);
        }
        if ($request->group_id){
            GroupStudent::create([
                'group_id' => $request->group_id,
                'student_id' => $student->id,
                'status' => 1,
            ]);
        }
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
        }else if($request->status == 3){
            return redirect()->route('studentAll')->with('success', 'Student active successfully');
        } else {
            return back();
        }
    }

    public function show($id){
        $student = User::find($id);
        return view('student.show',[
            'student' => $student,
        ]);
    }

    public function edit($id){
        $events = Event::where('status', 1)->get()->pluck('name', 'id');
        $pcs = PC::where('status', 1)->get()->pluck('name', 'id');
        $groups = Group::where('status', 1)->get()->pluck('name', 'id');
        $student = User::find($id);
        return view('student.edit',[
            'student' => $student,
            'events' => $events,
            'pcs' => $pcs,
            'groups' => $groups,
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'nullable|email',
            'status' => 'required|in:0,1,2,3',
            'phone' => 'required|unique:users,phone,'.$id,
            'event_id' => 'required|exists:events,id',
        ]);
        $student = User::find($id);
        if ($request->pc_id){
            PU::create([
                'user_id' => $student->id,
                'p_c_id' => $request->pc_id,
                'attach_user_id' => auth()->user()->id,
                'status' => 1,
            ]);
        }

        if ($request->group_id){
            GroupStudent::create([
                'group_id' => $request->group_id,
                'student_id' => $student->id,
                'status' => 1,
            ]);
        }

        if($request->event_id){
            EventUser::create([
                'user_id' => $student->id,
                'change_user_id' => auth()->user()->id,
                'event_id' => $request->event_id,
            ]);
        }

        $student->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'status' => $request->status,
            'phone' => $request->phone,
        ]);
        if ($request->status == 0) {
            return redirect()->route('studentArchive')->with('success', 'Student archived successfully');
        } else if ($request->status == 1) {
            return redirect()->route('studentWaiting')->with('success', 'Student waiting successfully');
        } else if ($request->status == 2) {
            return redirect()->route('studentActive')->with('success', 'Student active successfully');
        }else if($request->status == 3){
            return redirect()->route('studentAll')->with('success', 'Student active successfully');
        } else {
            return back();
        }
    }
    public function waiting()
    {
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
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
        ]);
    }

    public function active(){
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 2)
            ->latest('users.updated_at')
            ->get();
        return view('student.active', [
            'students' => $students,
        ]);
    }

    public function archive(){
        $students = User::select(
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->where('users.status', 0)
            ->latest('users.updated_at')
            ->get();
        return view('student.archive',[
            'students' => $students,
        ]);
    }
    public function work(){
        $pu = PU::where('user_id',auth()->user()->id)->where('status','!=',3)->latest()->first();
        $pur = PU::where('status',3)
            ->where('user_id',auth()->user()->id)
            ->latest()
            ->get();
        return view('student.work',[
            'pu' => $pu,
            'pur' => $pur,
        ]);
    }

    public function start($id){
        $pu = PU::where('id',$id)->first();
        $pu->update([
            'status' => 2,
            'start_time' => empty($pu->start_time) ? date('Y-m-d H:i:s') : $pu->start_time
        ]);
        return redirect()->route('studentWork');
    }

    public function workStore(Request $request){
        $this->validate($request, [
            'p_u_id' => 'required',
        ]);
        $pu = PU::where('id',$request->p_u_id)->first();
        $pu->update([
            'status' => 3,
            'spend_time' => (int) ($pu->pc->minute * 60 - $request->spend_time) / 60
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
        $pu = PU::where('id',$id)->first();
        return view('student.result',[
            'pu' => $pu,
        ]);
    }
}

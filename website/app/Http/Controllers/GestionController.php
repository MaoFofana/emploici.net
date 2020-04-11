<?php

namespace App\Http\Controllers;

use App\Events\WebsocketEvent;
use App\Models\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestionController extends Controller
{
    //


    public function index(){
        $jobs = Job::all()->where('datelimite', ">=",date("Y-m-d H:i:s"))->take(5)->reverse();
        return view('welcome', ['jobs'=>$jobs]);
    }
    public function offres(){
        $user = Auth::user();
        return view('compte.offres', ['user'=>$user, 'message'=>'']);
    }

    public function detail(Request $request){
        $id= $request->input('id');
        $job = Job::find($id);
        return view('emploi.details', ['job'=>$job]);
    }

    public function destroyoffre(Request $request){
        $id= $request->input('id');
        $job = Job::find($id);
        $job->forceDelete();;
        return redirect('/offres');
    }

    public function liste(){
        $jobs = Job::where('datelimite', ">=",date("Y-m-d H:i:s"))->paginate(15);
        return view('liste', ['jobs'=>$jobs, 'message'=>'']);
    }

    public function information(Request $request){
        // cache the file
        $file = $request->file('file');

        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'user-' . time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('public', $filename);
        $user = Auth::user();
        $user -> link = $filename;
        $user ->save();
        if(\auth()->user()->role != "ADMIN"){
            return  redirect('/information');
        }else {
            return redirect("/profile");
        }

    }

    public function cv(Request $request){
        // cache the file
        $file = $request->file('file');
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'usercv-' . time() . '.' . $file->getClientOriginalExtension();
        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('public', $filename);
        $user = Auth::user();
        $user -> cv = $filename;
        $user ->save();
        return redirect('/information');

    }

    public function search(Request $request){
        $mot = $request->input('mot');
        $typeoffre = $request->input('typeoffre');
        $secteur = $request->input('secteur');
        $niveau = $request->input('niveau');


            $jobsend = Job::where([
                ['niveauetude','like',"%{$niveau}%"],['typeoffre','like',"%{$typeoffre}%"],
            ['secteuractivite','like',"%{$secteur}%"], ['titre','like',"%{$mot}%"]])->paginate(15);

        return view('liste', ['jobs'=>$jobsend, 'message'=>""]);
    }

    public function candidats(Request $request){
        $id = $request->input('id');
        $jobs = Job::find($id);

        $postuler = $jobs->postuler;

        return view('listepostulant', ['postulant'=>$postuler]);
    }

    public function isAdmin(Request $request){
        $id = $request->input('id');

        $user = User::find($id);
        if( $user->role == "ADMIN"){
            $user->role = "CHERCHEUR";
        }else {
            $user->role = "ADMIN";
        }
        $user->save();
        return redirect('/users');

    }
}

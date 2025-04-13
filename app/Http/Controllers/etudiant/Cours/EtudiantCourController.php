<?php

namespace App\Http\Controllers\etudiant\Cours;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Etudiant;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtudiantCourController extends Controller
{
    public function index(Request $request)
    {

        $etudiant = Etudiant::where('user_id', Auth::user()->id)->first();


        $cours = Cours::where('filiere_id', $etudiant->filiere_id)->with(['professeur.user', 'seances'])->orderBy('date_creation', 'desc')->get();

        $search = $request->input('search');
        if ($search) {
            $cours = $cours->filter(function($item) use ($search) {
                return stripos($item->titre, $search) !== false ||
                       stripos($item->professeur->user->name, $search) !== false;
            });
        }

        return view('etudiant.pages.cours.index', compact('cours', 'search'));
    }
    public function NotificationNonLue (Request $request){
        return Notification::where('user_id', auth()->id())
        ->where('statut', 'envoyée')
        ->orderBy('created_at', 'desc')
        ->get();
    }
    public function indexNotifications()
    {
        $notifications = Notification::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();
        return view('etudiant.pages.notifications.notifications', compact('notifications'));
    }
    public function changeStatusNotification (Request $request)
    {
        $notificationId = $request->input('notificationId');
        $notification = Notification::find($notificationId);
        if ($notification) {
            $notification->statut = 'vue';
            $notification->save();
        }
        return response()->json(['success' => true]);
    }
}

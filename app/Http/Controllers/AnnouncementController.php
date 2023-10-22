<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    //
    public function getannouncements()
    {
        $announcements = Announcement::all();

        return response()->json($announcements, 200);

    }

    /**
     * Summary of getannouncement
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getannouncement()
    {
        $announcements = Announcement::orderBy('created_at', 'DESC')->first();
        return response()->json($announcements, 200);
    }

    public function index()
    {
        //return view for the announcement model
        //return the table view to show the announcement model
        $announcement = Announcement::paginate(5);
        // dd($announcement);
        return view('admin.announcement.aindex', compact('announcement'));

    }

    public function archive()
    {
        //return view for the announcement model
        //return the table view to show the announcement model
        $announcement = Announcement::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);
        // dd($announcement);
        return view('admin.announcement.aarchive', compact('announcement'));

    }

    public function createAnnouncement()
    {
        //return view for creating announcement
        return view('admin.announcement.createannouncement');

    }

    public function editAnnouncement(Announcement $announcement)
    {
        //return view for creating announcement
        // dd($announcement);
        return view('admin.announcement.editannouncement', ['announcement'=>$announcement]);

    }


    public function updateAnnouncement(Announcement $announcement, Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:10',
            'content' => 'required|min:10',
        ]);

        $announcement->update($validateData);
        //return view for creating announcement
        // dd($announcement);
        return redirect(route('announcementIndex'))->with('success','Announcement Updated Sucessfully');
    }


    public function store(Request $request)
    {

        $validateUser = Validator::make($request->all(),
            [
                'title' => 'required|min:10',
                'content' => 'required|min:10',

            ]);
        if($validateUser->fails()){
            return Redirect::back()->withErrors(['error' => 'something went wrong']);

        }

        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->save();

        return redirect(route('announcementIndex'))->with('success','Announcement Created Sucessfully');
    }

    public function destroy(Announcement $announcement)
    {

        $announcement->delete();
        return redirect(route('announcementIndex'))->with('error','Announcement Deleted Sucessfully');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Session;
use App\Menu;
use Auth;
use DB;
use App\Ticket;
use App\User;
use Carbon\Carbon;

class TicketController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
 
     public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }
    
    public function displayMenu(){
     return $menus = Menu::where('status', 1)->orderBy('menu_order', 'ASC')->paginate(5);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $menus = $this->displayMenu();
        $tickets = DB::table('tickets')->where('user_id', $user->id)->get(); 
        $tickets_closed = DB::table('tickets')->where('user_id', $user->id)->where('open', 1)->get(); 
        return view('ticket.index', compact('menus', 'tickets', 'tickets_closed'), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $menus = $this->displayMenu(); 
          $frequentlis = DB::table('frequentlies')->orderBy('created_at', 'DESC')->get();
        return view('ticket.create', compact('menus','frequentlis'), array('user' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $user = Auth::user();
        $summary = $request->summary;
        $reason = $request->reason;
        $description = $request->description;

        if ($summary !=null && $summary !="" && $reason !=null && $reason !="") { 

           $ticket = new Ticket;
           $ticket->subject = $summary;
           $ticket->complain = $description;
           $ticket->reason = $reason;
           $ticket->status = 'pending';
           $ticket->user_id = $user->id;
           $ticket->open = 0;
           $ticket->created_at = $this->returnCurrentTime();
           $ticket->save();
           Session::flash('success', 'done successfuly'); 
        }

        return redirect()->route('ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    $menus = $this->displayMenu(); 
        $ticket = Ticket::findOrFail($id);
        return view('ticket.show', compact('menus','ticket'), array('user' => Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $menus = $this->displayMenu(); 
        $ticket = Ticket::findOrFail($id);
        return view('ticket.edit', compact('menus','ticket'), array('user' => Auth::user()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $summary = $request->summary;
        $reason = $request->reason;
        $description = $request->description;

        if ($summary !=null && $summary !="" && $reason !=null && $reason !="") { 

           $ticket = Ticket::findOrFail($id);
           $ticket->subject = $summary;
           $ticket->complain = $description;
           $ticket->reason = $reason;
           $ticket->status = 0;
           $ticket->updated_at = $this->returnCurrentTime();
           $ticket->save();
           Session::flash('success', 'done successfuly'); 
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {         
        if ($id) { 
       DB::table("tickets")->where('id',$id)->delete();
       Session::flash('success','Ticket has been deleted successfully');
        } 
      return redirect()->back()->withMessage('ID not found');
    }

    // open ticket
    // send customer email when ticket is opened
    // set status to 1
        public function openTicket($id)
    {
        //dd($id);
        $ticket = Ticket::findOrFail($id);
        $ticket->open = 1;
        $ticket->open_date = $this->returnCurrentTime();
        $ticket->save();
        return view('admin.tickets.open_ticket', compact('ticket'), array('user' => Auth::user())); 
    }

    public function adminShowTickets()
    {
        $user = Auth::user();
        $menus = $this->displayMenu();
        $tickets = DB::table('tickets')->where('user_id', $user->id)->get(); 
        $pending_tickets = DB::table('tickets')->get(); 
        return view('admin.tickets.index', compact('menus', 'tickets', 'pending_tickets'), array('user' => Auth::user()));
    }

    public function closedTicket(Request $request)
    {
        //dd($request->all());
        $id = $request->ticket_id;

        $ticket = Ticket::findOrFail($id);
        $ticket->open = 1;
        $ticket->status = $request->status;
        $ticket->open_date = $this->returnCurrentTime();
        $ticket->save();
        Session::flash('success', 'successfuly');
        return redirect()->back();
    }

}

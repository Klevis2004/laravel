<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\StatisRequest;
use App\Http\Requests\StoreRequest;
use App\Models\category;
use App\Models\Contact;
use App\Models\LibratPost;
use App\Models\Sales;
use App\Models\StaticSale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class OtherController extends Controller
{
    public function index()
    {
        $posts = LibratPost::all();
        $categories = category::all();
        return view('users.contain.contact', ['posts' => $posts, 'categories' => $categories]);
    }
    public function store(ContactRequest $request)
    {
        
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        $post = Contact::create($validated);

        return redirect()->route('welcome')->with('success', 'Your message was sent succefully!');
    }  
    
    public function users()
    {
        $users = User::where('role', '<', 2)->get();
    
        return view('admin.contain.users', ['users' => $users]);
    }

    public function makeadmin($id)
    {
        $user = User::where('id', $id)->update(['role' => 1]);
    
        return redirect()->back();
    }

    public function removeadmin($id)
    {
        $user = User::where('id', $id)->update(['role' => 0]);
    
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $user = user::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'The user was deleted successfully!');
    }

    public function message(){
        $messages = Contact::all();
        $read = Contact::where('read', 0)->count();
        return view('admin.contain.message', ['messages' => $messages, 'read' => $read]);
    }

    public function home(){
        return view('admin.contain.index');
    }
    public function single($id){
        
        $messages = Contact::where('id', $id)->first();
        $messageId = $messages->user_id;
        $user = User::where('id', $messageId)->first();
        
        return view('admin.contain.single_message', ['messages' => $messages, 'user' => $user]);
    }    
    public function read($id)
    {
        $user = Contact::where('id', $id)->update(['read' => 1]);
    
        return redirect()->route('single', ['id'=> $id] );
    }

    public function sale(){

        $sales = StaticSale::all();
        $users = User::all();

        return view('admin.contain.sale', ['users' => $users, 'sales' => $sales]);
    }
    
    public function rent(){
    
        $sales = Sales::all();
        $users = User::all();

        $currentDate = Carbon::now();
        $current = Sales::whereDate('data_dorezimit', '=', $currentDate->toDateString())->get();
        $count = $current->count();
    
        return view('admin.contain.rent', ['users' => $users, 'sales' => $sales, 'count' => $count]);
    }

    public function salepost(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'sasia' => 'required|numeric|min:1',
        'data_marrjes' => 'required|date',
        'data_dorezimit' => 'required|date|after:data_marrjes',
    ]);

    $post = LibratPost::find($id);

    $validated['sasia'] = $request->input('sasia');
    $validated['data_marrjes'] = $request->input('data_marrjes');
    $validated['data_dorezimit'] = $request->input('data_dorezimit');
    $validated['book_id'] = $request->input('book_id');
    $validated['user_id'] = $request->input('user_id');
    $validated['bill'] = $request->input('sasia') * $post->rent_price;

    $sale = Sales::create($validated);

    $post->sasia -= $request->input('sasia');
    $post->save();

    return redirect()->route('welcome')->with('success', 'Your rent has been successful!');
}

    
    public function static_sale(StatisRequest $request, $id)
    {
        $post = LibratPost::find($id);
        $validated = $request->validated();


        $validated['bill'] = $request->input('bill') * $request->input('sasia');

        $sale = StaticSale::create($validated);

        $post->sasia -= $request->input('sasia');
        $post->save();

        return redirect()->route('welcome')->with('success', 'Your shop has been successfully!');
    }


    public function delete_sale(string $id)
    {
        $user = Sales::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Rent was deleted successfully!');
    }
    public function delete_staticsales(string $id)
    {
        $user = StaticSale::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Sale was deleted successfully!');
    }
    public function getBookInfo($saleId)
    {
        $bookInfo = LibratPost::where('id',  $saleId)->first();

        return response()->json($bookInfo);
    }

    public function getUsersInfo($userId)
    {
        $userInfo = User::where('id',  $userId)->first();

        return response()->json($userInfo);
    }

    public function dorezimi($id)
    {
        $sale = Sales::find($id);
        if (!$sale) {
            return redirect()->back()->with('error', 'Contact not found');
        }
    
        $sasia = $sale->sasia;
        $book = $sale->book_id;
    
        LibratPost::where('id', $book)->increment('sasia', $sasia);
        Sales::where('id', $id)->update(['status' => 1]);
    
        return redirect()->back()->with('success', 'Trnsaksioni u krye me sukses!!');
    }
    public function sale_dorezimi($id)
    {
        // $sale = Sales::find($id);
        // if (!$sale) {
        //     return redirect()->back()->with('error', 'Contact not found');
        // }
    

        StaticSale::where('id', $id)->update(['payment_status' => 1]);
    
        return redirect()->back()->with('success', 'Trnsaksioni u krye me sukses!!');
    }
    public function financa(){
        $libra = LibratPost::sum('sasia');
        $rent = Sales::sum('sasia');
        $financa = Sales::sum('bill');
        $financa2 = StaticSale::sum('bill');
        $total = $financa + $financa2;
        return view('admin.contain.financa', ['libra' => $libra, 'rent' => $rent, 'total' => $total, 'financa' =>$financa, 'financa2' =>$financa2]);
    }
    public function historiku(){
        return view('admin.contain.historiku');
    }
}
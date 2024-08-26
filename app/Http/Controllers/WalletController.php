<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\WalletService;

class WalletController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    // public function index()
    // {
    //     $user = auth()->user(); // Assuming the user is logged in
    //     return view('wallet.index', ['wallet' => $user->wallet]);
    // }

    public function index()
{
    $user = auth()->user();

    // Check if the user has a wallet, if not create one
    if (!$user->wallet) {
        $user->wallet()->create(['balance' => 0]);
    }

    return view('wallet.index', ['wallet' => $user->wallet]);
}

    public function addFunds(Request $request)
    {
        $user = auth()->user();
        $this->walletService->credit($user->wallet, $request->input('amount'), 'Added funds');
        return redirect()->route('wallet.index')->with('success', 'Funds added successfully');
    }

    public function withdrawFunds(Request $request)
    {
        $user = auth()->user();
        try {
            $this->walletService->debit($user->wallet, $request->input('amount'), 'Withdrew funds');
            return redirect()->route('wallet.index')->with('success', 'Funds withdrawn successfully');
        } catch (\Exception $e) {
            return redirect()->route('wallet.index')->with('error', $e->getMessage());
        }
    }

    
}


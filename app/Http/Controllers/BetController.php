<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Lot;
use App\Models\Bet;

use Carbon\Carbon;

class BetController extends Controller
{
    public function placeBet(Request $request, $lotId) {
        $betData = $request->except('_token');
        $lot = Lot::findOrFail($lotId);

        $validator = Validator::make($betData, [
            'bet_price' => 'required|numeric|not_in:0|gt:'.$lot->price,
        ]);

        if($validator->fails()) {
            return redirect(route('lot-page', ['id' => $lotId]))
            ->withErrors($validator)
            ->withInput();
        }

        $bet = new Bet();
        $bet->bet_date = Carbon::now()->timezone('Europe/Moscow');
        $bet->bet_price = request('bet_price');
        $bet->author_id = Auth::user()->id;
        $bet->lot_id = $lotId;
        $bet->save();

        return redirect(route('lot-page', ['id' => $lot->id]));
    }

    public function deleteBet($betId) {
        Bet::where('id', $betId)->where('author_id', Auth::user()->id)->delete();
        return redirect()->back();
    }
}
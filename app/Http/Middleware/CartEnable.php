<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class CartEnable
{
    const CART_SESSION = 'cart_session';

    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $cart = session(self::CART_SESSION);

        if(Auth::guest() && is_null($cart))
        {
            self::generateCart($user);
        }

        return $next($request);
    }

    public static function generateCart(User $user = null)
    {
        $userId = null;
        if(! is_null($user))
        {
            $userId = $user->id;
        }

        $cart = Cart\Cart::create(["code" => Uuid::uuid4()->toString(), "user_id" => $userId]);
        session([self::CART_SESSION => $cart->code]);
        return $cart;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;

class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $products = Product::get();

        return view("products", compact("products"));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $intent = auth()
            ->user()
            ->createSetupIntent();

        return view("subscription", compact("product", "intent"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
        Stripe::setApiKey(env("STRIPE_SECRET"));

        $id = $request->product;
        $product = Product::findOrFail($id);
        $customerName = $request->name;
        $customerAddress = $request->address;
        $user = $request->user();
        try {
            if (!$user->stripe_id) {
                // If the user is not a Stripe customer, create a new customer in Stripe
                $user->createAsStripeCustomer([
                    "name" => $request->name,
                ]);
            }
            $user->addPaymentMethod($request->token);
            $amountToCharge = max(50, $product->price * 100);
            $paymentIntent = PaymentIntent::create([
                "amount" => $amountToCharge, // Amount in cents
                "currency" => "inr",
                "description" => $product->description,
                "payment_method" => $request->token,
                "confirmation_method" => "manual",
                "confirm" => true,
                "customer" => $user->stripe_id,
                "return_url" => route("products"),
                "shipping" => [
                    // Include shipping information
                    "name" => $request->name, // Customer name
                    // I have provided the user's address details directly here. We can retrieve the data from the database if we receive the user's address details during the payment process.
                    "address" => [
                        "line1" => "123 Main St",
                        "city" => "Dallas",
                        "postal_code" => "10001",
                        "state" => "NewYork",
                        "country" => "UnitedStates",
                    ],
                ],
            ]);
            return view("subscription_success");
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with("errors", $e->getMessage());
        }
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscriptionSuccess()
    {

        return view("subscription_success");
    }
}

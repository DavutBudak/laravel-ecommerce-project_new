<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{

       public function __construct()
    {
            $this->returnUrl = "/users/{}/addresses";
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
  public function index(User $user)
{
    $addrs = $user->addrs;

    return view("backend.addresses.index", ["addrs" => $addrs, "user" => $user]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(User $user)
    {
        return view("backend.addresses.insert_form",["user"=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     * @param AddressRequest $request
     * @return RedirectResponse
     */
    public function store(User $user, AddressRequest  $request): RedirectResponse
    {
         $addr = new Address();
$data = $this->prepare($request,$addr->getFillable());
$addr->fill($data);
$addr->save();
$this->editReturnUrl($user->user_id);
    return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param Address $address
     * @return Application|Factory|View
     */
    public function edit(User $user, Address $address)
    {
                return view("backend.addresses.update_form", ["user" =>$user,"addr"=>$address]);

    }

    /**
     * Update the specified resource in storage.
     * @return RedirectResponse
     */
    public function update(AddressRequest  $request, User $user,Address $address): RedirectResponse
    {


$data = $this->prepare($request,$address->getFillable());
$address->fill($data);


$address->save();
$this->editReturnUrl($user->user_id);

    return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return JsonResponse
     */
    public function destroy(User $user,Address $address): JsonResponse
    {

          $address->delete();
        // return Redirect::to("/users");

        return response()->json(["message" => "Done" , "id" => $address->address_id]);
    }

    private function editReturnUrl($id){

        $this->returnUrl="/users/$id/addresses";


    }
}

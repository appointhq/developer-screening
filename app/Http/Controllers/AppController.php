<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\App\AppCollection;
use App\Services\App\AppService;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Contructor
     */
    public function __construct(
        public AppService $appService
    ) {}


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //TODO: Code review
        return new AppCollection(
            $this->appService->list(
                $request->all()
            )
        );
    }

    /**
     * List a user emails
     */
    public function userEmails(Request $request)
    {
        //TODO: Code review
        return response()->json(
            $this->appService->allAppUserEmails()
        );
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO: Implement delete logic and apply constraints if needed
    }
}

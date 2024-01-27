<?php

namespace App\Http\Controllers;

use App\Models\Tsirp;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;

class TsirpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Tsirps/Index', [
            //
            'tsirps' => Tsirp::with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->tsirps()->create($validated);

        return redirect(route('tsirps.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Tsirp $tsirp
     * @return Response
     */
    public function show(Tsirp $tsirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tsirp $tsirp
     * @return Response
     */
    public function edit(Tsirp $tsirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tsirp $tsirp
     * @return Application|Redirector|RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Tsirp $tsirp)
    {
        //
        $this->authorize('update', $tsirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $tsirp->update($validated);

        return redirect(route('tsirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tsirp $tsirp
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Tsirp $tsirp)
    {
        //
        $this->authorize('delete', $tsirp);

        $tsirp->delete();

        return redirect(route('tsirps.index'));
    }
}

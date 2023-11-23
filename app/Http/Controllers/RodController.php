<?php

namespace App\Http\Controllers;

use App\Http\Requests\RodRequest;
use App\Models\Rod;
use App\Services\RodService;

class RodController extends Controller
{
    protected RodService $rodService;

    /**
     * @param RodService $rodService
     */
    public function __construct(RodService $rodService)
    {
        $this->rodService = $rodService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rods = $this->rodService->getAllRod();
        return view('rod.index', [
            'rods' => $rods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rod.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RodRequest $request)
    {
        $this->rodService->createRod($request->validated());
        return redirect()
                    ->route('rod.index')
                    ->with('success', 'Успешно создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $rod = $this->rodService->getRodById($id);
        return view('rod.show', [
            'rod' => $rod,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $rod = $this->rodService->getRodById($id);
        return view('rod.edit', [
            'rod' => $rod,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, RodRequest $request)
    {
        $this->rodService->updateRod($id, $request->validated());
        return redirect()
            ->route('rod.index')
            ->with('success', 'Успешно обнавлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->rodService->deleteRod($id);
        return redirect()
            ->route('rod.index')
            ->with('success', 'Успешно удален.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Inertia\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PizzaControlller extends Controller
{
    //
    public function index(): Response
    {
        $pizzas = Pizza::all();


        return Inertia::render('Pizzas/All', [
            'pizzas' => $pizzas
        ]);
    }

    public function edit(Pizza $pizza): Response
    {
        return Inertia::render('Pizzas/Edit', [
            'pizza' => $pizza,
        ]);
    }

    public function update(Pizza $pizza, Request $request): void
    {
        $pizza->update([
            'status' => $request->status,
        ]);
    }
}

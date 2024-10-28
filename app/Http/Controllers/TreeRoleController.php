<?php

namespace App\Http\Controllers;

use App\Models\TreeRole;
use Illuminate\Http\Request;

class TreeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = TreeRole::withDepth()->with('ancestors')->whereNotNull('parent_id')->get();
        // dd($cats);
        return view('tree_role.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TreeRole::get();
        return view('tree_role.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        $cat = TreeRole::create(['name' => $request->name]);

        if ($request->parent) {
            $node = TreeRole::find($request->parent);
            $node->appendNode($cat);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TreeRole $treeRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TreeRole $treeRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TreeRole $treeRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TreeRole $treeRole)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Crypt;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagsController extends Controller
{
    /**
     * Returning the tag index page.
     *
     * @return Application|Factory|View
     */
    public function index() {
        $tags = Tags::all();
        return view('pages.tags.index', compact('tags'));
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
     * Creating new tag in DB.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) {
        $data = $this->validate($request, [
            'tag_name' => 'required|string|min:2'
        ]);
        $tag = Tags::create($data);
        if ($tag !== null) {
            return redirect()->route('tags.index')->with('success', 'Tag Created successfully');
        }
        return redirect()->back()->with('error', 'Something Went Wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Deleting tag from the DB.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id) {
        $id = $this->IDecrypt($id);
        $tag = Tags::find($id);
        $status = $tag->delete();
        if ($status !== true) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        return redirect()->route('tags.index')->with('success', 'Tag Created successfully');
    }

    /**
     * Decrypting the id of tag.
     *
     * @param $id
     * @return mixed
     */
    public function IDecrypt($id) {
        $id = htmlspecialchars(stripslashes(htmlentities($id)));
        return Crypt::decrypt($id);
    }
}

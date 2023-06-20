<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Services\MenuService;
use App\Models\Menu;

class AdminMenuController extends Controller
{
    private MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = $this->menuService->getAll();
        return view('admin.pages.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = $this->menuService->getAll();
        return view('admin.pages.menu.create', compact('menus'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {

        $data = [
            'name' => ucfirst($request->name),
            'parent_id' => $request->parent_id == 0 ? null : $request->parent_id
        ];
        $this->menuService->create($data);
        return redirect()->route('admin.menus.index')->with('success', 'Thêm menu thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menus = $this->menuService->getAllNotIn($id);
        $editMenu = $this->menuService->getById($id);
        return view('admin.pages.menu.edit', compact(['editMenu', 'menus']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request,  $id)
    {
        $existMenu = $this->menuService->getById($id);
        if(empty($existMenu)){
            return redirect()->route('admin.menus.index')->with('error', 'Menu không tồn tại');
        }
        $data = [
            'name' => ucfirst($request->name) ?? $existMenu->name,
            'parent_id' => $request->parent_id ?? $existMenu->parent_id
        ];
        $this->menuService->update($data, $id);
        return redirect()->route('admin.menus.index')->with('success', 'Cập nhật menu thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->menuService->delete($id);
        return redirect()->route('admin.menus.index')->with('success', 'Xóa menu thành công');
    }
}

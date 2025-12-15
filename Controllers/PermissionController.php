<?php

namespace Vendor\UltimateStarterKit\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vendor\UltimateStarterKit\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of permissions.
     */
    public function index(Request $request)
    {
        $query = Permission::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->has('module') && $request->module) {
            $query->where('module', $request->module);
        }

        $permissions = $query->orderBy('module')
            ->orderBy('feature')
            ->orderBy('action')
            ->paginate(50);

        return view('ultimate::permissions.index', compact('permissions'));
    }
}


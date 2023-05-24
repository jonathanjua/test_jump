<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceOrderStoreRequest;
use App\Http\Requests\ServiceOrderUpdateRequest;
use App\Http\Resources\ServiceOrderCollection;
use App\Http\Resources\ServiceOrderResource;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceOrderController extends Controller
{
    public function index(Request $request): ServiceOrderCollection
    {
        $search = $request->get('search', '');

        $serviceOrders = ServiceOrder::search($search)
            ->with(['user' => function ($query) {
                $query->select('id', 'name', 'email');
            }])
            ->latest()
            ->paginate(5);

        return new ServiceOrderCollection($serviceOrders);
    }

    public function store(ServiceOrderStoreRequest $request): ServiceOrderResource
    {

        $validated = $request->validated();

        $serviceOrder = ServiceOrder::create($validated);

        return new ServiceOrderResource($serviceOrder);
    }

    public function show(Request $request, ServiceOrder $serviceOrder): ServiceOrderResource
    {

        return new ServiceOrderResource($serviceOrder);
    }

    public function update(ServiceOrderUpdateRequest $request, ServiceOrder $serviceOrder): ServiceOrderResource
    {

        $validated = $request->validated();

        $serviceOrder->update($validated);

        return new ServiceOrderResource($serviceOrder);
    }

    public function destroy(Request $request, ServiceOrder $serviceOrder): Response
    {
        $serviceOrder->delete();

        return response()->noContent();
    }
}

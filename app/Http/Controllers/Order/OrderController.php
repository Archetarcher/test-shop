<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmOrderRequest;
use App\Http\Requests\GetOrderProductsRequest;
use App\Services\Order\OrderProductService;
use App\Services\Order\OrderService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class OrderController extends ApiController
{
    public function confirmOrder(OrderService $orderService, OrderProductService $orderProductService , ConfirmOrderRequest $request): JsonResponse{
        try {
            $validated = $request->validated();

            $result = $orderService->create($request->except('products'));
            error_log(json_encode($validated));
            $orderProducts = $orderProductService->create($validated['products'], $result['id']);
            $result['products'] = $orderProducts;

        }catch (Exception $e){
            return $this->sendError($e->getCode(), $e->getMessage(), 500);
        }
        return $this->sendResponse(['body' => $result]);

    }

    public function getOrders(OrderService $orderService): JsonResponse{
        try {

            $result = $orderService->getByUser(Auth::id());

        }catch (Exception $e){
            return $this->sendError($e->getCode(), $e->getMessage(), 500);
        }
        return $this->sendResponse(['body' => $result]);


    }

    public function getOrderProducts( OrderProductService $orderProductService, GetOrderProductsRequest $request): JsonResponse{
        try {

            $validated = $request->validated();
            $result = $orderProductService->get($validated['order_id']);

        }catch (Exception $e){
            return $this->sendError($e->getCode(), $e->getMessage(), 500);
        }
        return $this->sendResponse(['body' => $result]);


    }

}

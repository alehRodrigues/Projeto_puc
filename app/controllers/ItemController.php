<?php

namespace app\controllers;

use app\helpers\Request;

class ItemController extends BaseController
{

    public function index()
    {
        try {

            if (isset($_SESSION['user'])) {

                $item = new \app\models\Item();
                $items = $item->fetchAll();

                $this->view('item', [
                    'title' => 'Seus Items',
                    'items' => $items,
                ]);
            } else {
                header('Location: /signin');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function create()
    {
        $itemPost = Request::all();
        if (isset($itemPost['title']) && isset($itemPost['description']) && isset($itemPost['category']) && isset($itemPost['user_id'])) {

            try {
                //code...
                $item = new \app\models\Item();
                $itemId = $item->create($item->getDataCreate($itemPost));

                header('Location: /items');
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
            }
        }
    }

    public function edit()
    {
        $itemPost = Request::all();
        if (isset($itemPost['itemId']) && isset($itemPost['title']) && isset($itemPost['description']) && isset($itemPost['category']) && isset($itemPost['user_id'])) {

            try {
                //code...
                $item = new \app\models\Item();
                $item->update('itemId', $itemPost['itemId'], $item->getDataCreate($itemPost));

                header('Location: /items');
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
            }
        }
    }

    public function delete($id)
    {
        try {
            //code...
            $item = new \app\models\Item();
            $item->delete('itemId', $id);

            header('Location: /items');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}

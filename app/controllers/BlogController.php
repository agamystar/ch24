<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\classes\Auth;
use app\core\classes\Request;
use app\core\classes\Response;
use app\core\classes\Validation;
use app\models\Post;
use app\service\PostService;

class BlogController extends BaseController
{
    public function __construct()
    {
    }

    public function index():string
    {
        $PostService = new PostService();
        $data = $PostService->get();
        return   $this->renderView("posts.index", ["title" => "List of Posts", "data" => $data]);
    }


    public function create():string
    {
        return   $this->renderView("posts.create", ["title" => "Add New Post"]);
    }

    public function store(Request $request, Response $response): Response
    {
        try {
            $validate = Validation::validate($request, [
                "title" => ["required", "min:10", "max:200"],
                "body" => ["required", "min:10"],
            ]);
            if (!empty($validate)) {
                return $response->back(["msg" => " Full fill the required fields "], $validate);
            }

            $PostService = new PostService();
            $PostService->create([
                "title" => $request->get("title"),
                "body" => $request->get("body"),
                "user_id" => Auth::user()->id
            ]);

            return $response->route("/posts", ["msg" => "success"]);
        } catch (\Exception $ex) {
            return $response->back(["msg" => $ex->getMessage()]);
        }
    }

}
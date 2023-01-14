<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\classes\Auth;
use app\core\classes\Hashing;
use app\core\classes\Request;
use app\core\classes\Validation;
use app\models\User;
use \app\core\classes\Response;
use app\service\UserService;

class AuthController extends BaseController
{

    public function registerView():string
    {
        return $this->renderView("auth.register", ["title" => "Sign up"]);
    }

    public function register(Request $request, Response $response): Response
    {
        try {
            $validate = Validation::validate($request, [
                "name" => ["required", "min:5"],
                "email" => ["required", "email"],
                "password" => ["required", "min:6", "max:20"],
            ]);

            if (!empty($validate)) {
                return $response->back(["msg" => " Full fill the required fields "], $validate);
            }

            $UserService=new UserService();
            $UserService->register([
                "name"=>$request->get("name"),
                "email"=>$request->get("email"),
                "password"=>Hashing::make($request->get("password"))
            ]);

            return $response->route("/auth/login", ["msg" => "Registered successfully!"]);

        } catch (\Exception $ex) {
            return $response->back(["msg" => "Failed try again later!" . $ex->getMessage()]);
        }

    }

    public function loginView():string
    {
        return $this->renderView("auth.login", ["title" => "Login"]);
    }

    public function login(Request $request, Response $response): Response
    {
        try {
            $validate = Validation::validate($request, [
                "email" => ["required", "email"],
                "password" => ["required", "min:6", "max:20"],
            ]);

            if (!empty($validate)) {
                return $response->back(["msg" => " Full fill the required fields "], $validate);
            }

            $UserService=new UserService();
            $is_user=$UserService->login([
                "email"=>$request->get("email"),
                "password"=>$request->get("password")
            ]);

            if (!$is_user) {
                return $response->back(["msg" => " Username or password is not correct !"]);
            }
            return $response->route("/", ["msg" => "Login successfully!"]);
        } catch (\Exception $ex) {
            return $response->back(["msg" => $ex->getMessage()]);
        }
    }

    public function logout(Request $request, Response $response): Response
    {
        Auth::logout();
        return $response->route("/auth/login", ["msg" => ""]);
    }

}

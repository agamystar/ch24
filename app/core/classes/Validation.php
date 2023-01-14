<?php
declare(strict_types=1);

namespace app\core\classes;
class Validation
{
    private static array $errors_list = [];
    private static array $msg_list = [
        "required" => "%s is required",
        "min" => "%s must be more than or equal %s",
        "max" => "%s must be less than or equal %s ",
        "email" => "%s is not email format",
    ];

    public static function addError(string $field, string $rule, string $rule_value)
    {
        self::$errors_list[$field] =  sprintf(self::$msg_list[$rule], ucfirst($field), $rule_value);
    }

    public static function validate(Request $request,array $rules): array
    {
        foreach ($rules as $field => $rules) {
            foreach ($rules as $r) {
                if ($r == "required" && \strlen($request->get($field)) < 1) {
                    self::addError($field, "required", "");
                } elseif (strpos($r, "min:") > -1) {
                    $min = \substr($r, 4);
                    if (\strlen($request->get($field)) < $min) {
                        self::addError($field, "min", $min);
                    }
                } elseif (strpos($r, "max:") > -1) {
                    $max = \substr($r, 4);
                    if (\strlen($request->get($field)) > $max) {
                        self::addError($field, "max", $max);
                    }
                } elseif ($r == "email" && filter_var($request->get($field), FILTER_VALIDATE_EMAIL) == false) {
                    self::addError($field, "email", "");
                } else {

                }
            }
        }
        return self::$errors_list;

    }


}
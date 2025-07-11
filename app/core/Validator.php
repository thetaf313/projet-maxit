<?php

namespace App\Core;

class Validator
{
    private static array $errors = [];

    public static function valide($value, string $field, array $rules): void
    {
        foreach ($rules as $rule) {
            if ($rule === 'required' && empty($value)) {
                self::addError($field, 'Ce champ est obligatoire.');
                return;
            }
            if ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                self::addError($field, 'Email invalide.');
                return;
            }
            if (str_starts_with($rule, 'min:')) {
                $min = (int)explode(':', $rule)[1];
                if (strlen($value) < $min) {
                    self::addError($field, "Minimum $min caractères.");
                }
                return;
            }
            if (str_starts_with($rule, 'max:')) {
                $max = (int)explode(':', $rule)[1];
                if (strlen($value) > $max) {
                    self::addError($field, "Maximum $max caractères.");
                }
                return;
            }
            if ($rule === 'senegal_phone' && !preg_match('/^(77|78|76|70|75)[0-9]{7}$/', $value)) {
                self::addError($field, 'Numéro de téléphone invalide.');
                return;
            }
            // return;
        }
    }

    public static function addError(string $field, string $message): void
    {
        // self::$errors[$field][] = $message;
        self::$errors[$field] = $message;
    }

    public static function isValid(): bool
    {
        return empty(self::$errors);
    }

    public static function getErrors(): array
    {
        return self::$errors;
    }

    public static function reset(): void
    {
        self::$errors = [];
    }
}

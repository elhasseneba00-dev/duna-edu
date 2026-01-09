<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HandlesLocalization
{
    protected function getLang(Request $request): string
    {
        $lang = strtolower($request->query('lang', 'fr'));
        return in_array($lang, ['fr', 'en', 'ar']) ? $lang : 'fr';
    }

    protected function tr(object $model, string $field, string $lang, string $fallback = 'fr')
    {
        $langField = $field . '_' . $lang;
        $fallbackField = $field . '_' . $fallback;

        $value = $model->{$langField} ?? null;
        if ($value === null || $value === '') {
            $value = $model->{$fallbackField} ?? null;
        }

        return $value;
    }

    protected function success($data = null, int $status = 200)
    {
        return response()->json([
            'success' => true,
            'data'    => $data,
        ], $status);
    }

    protected function error(string $message, int $status = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}

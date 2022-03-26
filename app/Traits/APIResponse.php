<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;
use JetBrains\PhpStorm\ArrayShape;

trait APIResponse
{

    /**
     * Send response with success.
     *
     * @param  null|array|object  $result
     * @param  string|null  $message
     * @param  int  $code
     *
     * @return JsonResponse
     */
    protected function sendResponse(null|array|object $result = null, ?string $message = null, int $code = 200): JsonResponse
    {
        return response()->json($this->makeResponse(true, $result, $message), $code);
    }

    /**
     * Send response with error.
     *
     * @param $error
     * @param  int  $code
     * @param  null|array|object  $data
     *
     * @return JsonResponse
     */
    protected function sendError($error = null, int $code = 400, null|array|object $data = null): JsonResponse
    {
        return response()->json($this->makeResponse(false, $data, $error), $code);
    }

    /**
     * Generate data array for response.
     *
     * @param  bool  $success
     * @param  array|null  $data
     *
     * @param  string|null  $message
     *
     * @return array
     */
    #[ArrayShape(['success' => "bool", 'message' => "string", 'data' => "array"])]
    protected function makeResponse(bool $success = true, ?array $data = null, ?string $message = null): array
    {
        $result = [
            'success' => $success,
        ];
        if (null !== $data) {
            $result['data'] = $data;
        }
        if (null !== $message) {
            $result['message'] = $message;
        }

        return $result;
    }

}

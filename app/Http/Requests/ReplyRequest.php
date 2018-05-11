<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST': {
                return [
                    'content' => 'required',
                    // CREATE ROLES
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH': {
                return [
                    // UPDATE ROLES
                ];
            }
            case 'GET':
            case 'DELETE':
            default: {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            'content.required' => '回复内容不能为空',
            // Validation messages
        ];
    }
}

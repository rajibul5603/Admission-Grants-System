<?php

namespace App\Http\Requests;

use App\Models\ExamVersion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExamVersionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('exam_version_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:exam_versions,id',
        ];
    }
}

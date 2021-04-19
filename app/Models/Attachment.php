<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['task_id','link','mime','name'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public static function hasValidFileType($request)
    {
        switch ($request->file('link')->getClientOriginalExtension()) {
            case 'jpeg':
            case 'jpg':
            case 'jpe':
            case 'png':
            case 'gif':
            case 'pdf':
            case 'ppt':
            case 'pptx':
            case 'docx':
            case 'xls':
            case 'xlsx':
                $validFileType = true;
                break;
            default:
                $validFileType = false;
        }

        return $validFileType;
    }
}
